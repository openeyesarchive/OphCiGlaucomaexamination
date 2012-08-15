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
<div>
    <?php
    $diagnosis_left = "Not recorded";
    $diagnosis_right = "Not recorded";
    if ($element->diagnosis_right || $element->diagnosis_left) {
        ?>
        <h4><?php echo $element->elementType->name ?></h4>
        <?php
        $options = $element->getDiagnosisOptions();
        if ($element->diagnosis_right) {
            $diagnosis_right = $element->diagnosis_right;

            $diagnosis_right = $options[$element->diagnosis_right];
        }
        if ($element->diagnosis_left) {
            $diagnosis_left = $element->diagnosis_left;
            $diagnosis_left = $options[$element->diagnosis_left];
        }
        ?>

        <div align="left" style ="width: 50%; float:left;">
            <p style="text-align: center; margin-right: 20px;"><?php echo $diagnosis_right ?></p>
        </div>
        <div align="right" style ="width: 50%; float:left;">
            <p style="text-align: center; margin-right: 20px;"><?php echo $diagnosis_left ?></p>
        </div>
        <div style="clear:both"></div>
        <?php
    }
    ?></div>