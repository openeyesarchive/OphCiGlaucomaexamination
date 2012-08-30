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
if ($element->isImageStringSet('right') || $element->isImageStringSet('left')) {
    ?>
    <br />
    <h4><?php echo $element->elementType->name ?></h4>
    <div class="eventDetail">
        <table width="100%">
            <tr align="center">
                <td align="left">
                    <?php
                    if ($element->description_right) {
                        echo $element->description_right;
                    }
                    if ($element->size_right) {

                        if (strlen($element->description_right) > 0) {
                            echo ", ";
                        }
                        echo CHtml::encode($element->getAttributeLabel('size_left')) . ": "
                        . ($element->size_right / 10);
                    }
                    ?>
                </td>
                <td width="25%" align="right">
                    <?php
                    if ($element->isImageStringSet('right')) {
                        $this->widget('application.modules.eyedraw.OEEyeDrawWidgetOpticDisk', array(
                            'identifier' => 'OpticDiskRight',
                            'side' => 'R',
                            'mode' => 'view',
                            'size' => 150,
                            'model' => $element,
                            'attribute' => 'image_string_right',
                        ));
                    }
                    ?>
                </td>
                <td width="25%"  align="left">
                    <?php
                    if ($element->isImageStringSet('left')) {
                        $this->widget('application.modules.eyedraw.OEEyeDrawWidgetOpticDisk', array(
                            'identifier' => 'OpticDiskLeft',
                            'side' => 'L',
                            'mode' => 'view',
                            'size' => 150,
                            'model' => $element,
                            'attribute' => 'image_string_left',
                        ));
                    }
                    ?>
                </td>
                <td width="25%" align="left">
                    <?php
                    if ($element->description_left) {
                        echo $element->description_left;
                    }
                    if ($element->size_left) {

                        if (strlen($element->description_right) > 0) {
                            echo ", ";
                        }
                        echo CHtml::encode($element->getAttributeLabel('size_left')) . ": "
                        . ($element->size_left / 10);
                    }
                    ?>
                </td>
            </tr>
        </table>

    </div>
    <?php
}?>