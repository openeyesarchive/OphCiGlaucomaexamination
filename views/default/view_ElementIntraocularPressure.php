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
$instrument_right = "Goldmann";
$instrument_left = "Goldmann";
if ($element->right_iop || $element->left_iop) {
    ?>
    <h4><?php echo $element->elementType->name ?></h4>
    <?php
    $options = $element->getInstrumentOptions();
    $iop_right = "N/A";
    if ($element->right_iop) {
        $iop_right = $element->right_iop;

        $instrument_right = $options[$element->instrument_right];
    }
    $iop_left = "N/A";
    if ($element->left_iop) {
        $iop_left = $element->left_iop;
        $instrument_left = $options[$element->instrument_left];
    }
    ?>

    <div align="center" style ="width: 100%; float:left;">
        <p style="text-align: center; margin-right: 20px;"><?php echo $instrument_right ?></p>
    </div>
    <!-- Both eyes -->
    <div align="center" style ="width: 100%; height: 114px; float:left;">
        <table cellspacing="0" width="25%" height="40" style="border-top: 2px solid #444;">
            <tbody>
                <tr>
                    <td width="25%" style="text-align: right; border-right: 1px solid #444;">
                        <p style="text-align: right; margin-right: 20px;"><?php echo $iop_right ?></p>
                    </td>
                    <td align="left" width="25%" style="border-left: 1px solid #444;">
                        <p style="margin-left: 16px;"><?php echo $iop_left ?></p>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

    <?php
}
?>