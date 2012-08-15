<?php
/**
 * OpenEyes
 *
 * (C) University of Cardiff, 2012
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) University of Cardiff, 2012
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>
<?php

/**
 * Class to help with the summary view which caters for IOP graphs and
 * stereo image disc files.
 * 
 * Future releases will also include HVF images.
 */
class SummaryView {
    /** Image gallery location. */
    const IMAGE_GALLERY = "/images/gallery/";
    /** Image file name extension. */
    const STEREO_IMAGE_EXT = ".jpg";
    /** How dates are formatted on the graph. */
    const DATE_FORMAT = 'M-y';
    /** Width of the date in pixels before displaying the next date. */
    const X_AXIS_DATE_WIDTH = 35;
    /** IOP multiplier for displaying the IOP on the y-axis. */
    const Y_AXIS_IOP_MULTIPLIER = 6.6;

    /** Lits of IOPs values from examinations for the left eye. */
    private $iops_left = array();

    /** Lits of IOPs values from examinations for the right eye. */
    private $iops_right = array();

    /** EyeDraw string for the right eye, built from the right IOP values. */
    private $iopsEyeRight = "";

    /** EyeDraw string for the right eye, built from the left IOP values. */
    private $iopsEyeLeft = "";

    /** String for the EyeDraw graph for the examinations dates. */
    private $eyegraphDates = "";

    /**
     * Constructot; initialise this class and get all IOP values.
     * 
     * @param type $event the event object that is currently linked to the
     * view that fired this constructor.
     */
    function __construct($event) {
        $this->init($event);
    }

    /**
     * Gets the EyeDraw graph IOP string for the right eye.
     * 
     * @return string data of the IOPs for the right eye in EyeDraw graph
     * format.
     */
    function getIOPsEyeRight() {
        return $this->iopsEyeRight;
    }

    /**
     * Gets the EyeDraw graph IOP string for the left eye.
     * 
     * @return string data of the IOPs for the left eye in EyeDraw graph
     * format.
     */
    function getIOPsEyeLeft() {
        return $this->iopsEyeLeft;
    }

    /**
     * Get the graph dates for the EyeDraw graph package.
     * 
     * @return string data for the dates on which examinations occurred.
     */
    function getEyeGraphDates() {
        return $this->eyegraphDates;
    }

    /**
     * Gets all events associated with the episode ID for this event.
     * 
     * @param event $event an event object from the patient's current episode
     * view.
     * 
     * @return array the events, if there were any; the empty list otherwise.
     */
    function getEvents($event) {
        $event_criteria = new CDbCriteria;
        $episode_id = $event->episode->id;
        $event_criteria->compare('episode_id', $episode_id);
        return Event::model()->findAll($event_criteria);
    }

    /**
     * Get all IOPs associated with the specified event.
     * 
     * @param int $event_id the event ID to search for associated IOPs.
     * 
     * @return array a list of associated IOPs for the given event ID; the empty
     * list otherwise.
     */
    function getIOPs($event_id) {
        $iop_criteria = new CDbCriteria;
        $iop_criteria->compare('event_id', $event_id);
        return ElementIntraocularPressure::model()->findAll($iop_criteria);
    }

    /**
     * Get IOPs for the left eye, if there are any.
     * 
     * @return an array of IOPs for the left eye, if there are any; otherwise,
     * the empty list is returned.
     */
    function getIOPsLeft() {
        return $this->iops_left;
    }

    /**
     * Get IOPs for the right eye, if there are any.
     * 
     * @return an array of IOPs for the right eye, if there are any; otherwise,
     * the empty list is returned.
     */
    function getIOPsRight() {
        return $this->iops_right;
    }

    /**
     * Get the list of files associated with the specified patient.
     * 
     * @param type $patient the patient under scrutiny.
     * 
     * @return the list of files, if there are any; otherwise, the empty list
     * is returned.
     */
    function getDiscFileList($patient) {

        $exam_criteria = new CDbCriteria;
        $exam_criteria->compare('pid', $patient->hos_num);
        return DiscFiles::model()->findAll($exam_criteria);
    }

    /**
     * Get the text for displaying the thumbnail links for the specified
     * patient's hospital number and file name. Note that the data includes
     * links to the pre-defined gallery of images, except that the hospital
     * number is encoded via MD5 hash (as is the filename).
     * 
     * @param int $hos_num the hospital number of the 
     * @param string $original_filename
     * @return string data for the HTML HREF links; both hospital number and
     * file name are encoded.
     */
    function getDiscFileLinkText($hos_num, $original_filename) {
        return
                // first part - actual file image location
                "<a href=\"" . self::IMAGE_GALLERY
                . md5($hos_num)
                . "/" . md5($original_filename) . self::STEREO_IMAGE_EXT
                . "\">"
                // 2nd part - thumbnail image location:
                . "<img src=\"" . self::IMAGE_GALLERY
                . md5($hos_num) . "/thumbs/"
                . md5($original_filename) . self::STEREO_IMAGE_EXT . "\""
                . "/></a>";
    }

    /**
     * Initialise this instance and build up all required information
     * about the IOPs and disc files.
     * 
     * @param event $event the event that was linked to the view of the page
     * that the summary's view was launched; care should be taken to ensure
     * that the event is both valid and contains IOPs (it is up to callers
     * to examine returned data and how to display it).
     */
    function init($event) {
        // Display a bar chart of IOPs - first, for the left eye:
        $events = $this->getEvents($event);
        $this->eyegraphDates = "eyeGraph.axisXArray = [";
        $this->iopsEyeLeft = "";
        $this->iopsEyeRight = "";

        if (count($events) > 1) {
            $this->eyegraphDates = "eyeGraph.axisXArray = [";
            $this->iopsEyeLeft = "";
            $this->iopsEyeRight = "";
            $xaxis = 0;
            foreach ($events as $each_event) {
                $event_id = $each_event->id;
                $iops = $this->getIOPs($event_id);
                foreach ($iops as $iop) {
                    if ($iop->left_iop) {
                        array_push($this->iops_left, $iop->left_iop);
                        $date = date_create($iop->created_date);
                        $this->eyegraphDates .= "[" . $xaxis . ", '"
                                . $date->format(self::DATE_FORMAT) . "'], ";
                        $this->iopsEyeLeft .= "[" . $xaxis . ", "
                                . ($iop->left_iop * self::Y_AXIS_IOP_MULTIPLIER)
                                . ", \"\", \"" . $iop->left_iop . "  \"], ";
                    }
                    if ($iop->right_iop) {
                        array_push($this->iops_right, $iop->right_iop);
                        $date = date_create($iop->created_date);
                        $newDate = "[" . $xaxis . ", '"
                                . $date->format(self::DATE_FORMAT) . "'], ";
                        if (strpos($this->eyegraphDates, $newDate) === false) {
                            $this->eyegraphDates .= $newDate;
                        }
                        $this->iopsEyeRight .= "[" . $xaxis . ", "
                                . ($iop->right_iop * self::Y_AXIS_IOP_MULTIPLIER)
                                . ", \"\", \"" . $iop->right_iop . "  \"], ";
                    }
                    if ($iop->left_iop || $iop->right_iop) {
                        $xaxis += self::X_AXIS_DATE_WIDTH;
                    }
                }
            }
            $this->eyegraphDates .= "];";
        }
    }

}

?>
