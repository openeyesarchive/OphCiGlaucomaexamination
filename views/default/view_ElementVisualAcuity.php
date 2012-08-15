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
$rva_ua = $element->getVisualAcuityText($element->unit, 'rva_ua');
$lva_ua = $element->getVisualAcuityText($element->unit, 'lva_ua');
$rva_cr = $element->getVisualAcuityText($element->unit, 'rva_cr');
$lva_cr = $element->getVisualAcuityText($element->unit, 'lva_cr');
$right_aid = $element->getAidText('right_aid');
$left_aid = $element->getAidText('left_aid');
$right_method = $element->getMethodText('rva_method');
$left_method = $element->getMethodText('lva_method');
$text_left = null;
$text_right = null;
if ($rva_ua != null && $rva_ua != "Not recorded") {
    $text_right = $rva_ua . " with " . $right_aid . ", " . $rva_cr .
            " with " . $right_method;
}
if ($lva_ua != null && $lva_ua != "Not recorded") {
    $text_left = $lva_ua . " with " . $left_aid . ", " . $lva_cr .
            " with " . $left_method;
}
?>
<?php
if ($text_left || $text_right) {
    ?>
    <br />
    <h4 class="elementTypeName"><?php echo $element->elementType->name ?></h4>

    <div class="eventHighlight">
        <!-- Right eye -->
        <div class="eventHighlight" style ="width:50%; float:left;">
            <p><h4><?php echo $text_right ?></h4></p>
        </div>

        <!-- Left eye -->
        <div class="eventHighlight" style ="text-align:right; width:50%; float:left;">
            <p><h4><?php echo $text_left ?></h4></p>
        </div>	
    </div>
    <?php
}
?>