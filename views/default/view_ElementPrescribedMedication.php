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
if ($element->medication_1_right) {
    ?>
    <h4><?php echo $element->elementType->name ?></h4>
    <div class="eventHighlight" align="left" style ="width: 100%; height: 50px; float:left;">
        <h4>
            <div class="eventHighlight">
                <?php
                $medications = $element->getMedications();
                echo $medications[$element->medication_1_right];
                if ($element->medication_2_right) {
                    echo ", " . $medications[$element->medication_2_right];
                    if ($element->medication_3_right) {
                        echo ", " . $medications[$element->medication_3_right];
                    }
                }
                ?>
            </div>
        </h4>
    </div>

    <?php
}if ($element->medication_1_left) {
    ?>
    <h4><?php echo $element->elementType->name ?></h4>
    <div class="eventHighlight" align="left" style ="width: 100%; height: 50px; float:left;">
        <h4>
            <div class="eventHighlight">
                <?php
                $medications = $element->getMedications();
                echo $medications[$element->medication_1_left];
                if ($element->medication_2_left) {
                    echo ", " . $medications[$element->medication_2_left];
                    if ($element->medication_3_left) {
                        echo ", " . $medications[$element->medication_3_left];
                    }
                }
                ?>
            </div>
        </h4>
    </div>

    <?php
}
?>
