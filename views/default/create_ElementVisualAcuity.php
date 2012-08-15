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
<h4 class="elementTypeName"><?php echo $element->elementType->name ?></h4>

<?php
$visualAcuityUnits = $element->getUnitOptions();
$visualAcuityOptions = $element->getVisualAcuityOptions(ElementVisualAcuity::SNELLEN_METRE);
$aidOptions = $element->getAidOptions(ElementVisualAcuity::SNELLEN_METRE);
$methodOptions = $element->getMethodOptions(ElementVisualAcuity::SNELLEN_METRE);
?>

<?php echo $form->errorSummary($element); ?>


<?php echo $form->dropDownList($element, 'unit', $visualAcuityUnits, array('onChange' => 'changeOptions(this.value);')); ?>
<?php echo $form->error($element, 'unit'); ?>


<div  class="eventDetail" style="float:left;">
    <table width="100%" cellpadding="0"><tr>
            <td>
                <?php
                echo $form->dropDownList($element, 'rva_ua', $visualAcuityOptions, array(
                    'onChange' =>
                    'setCorrected(this.selectedIndex, \'ElementVisualAcuity_rva_cr\');' ))
                ?>
                <?php echo $form->error($element, 'rva_ua'); ?>

            </td>
            <td>
                <?php echo $form->dropDownList($element, 'right_aid', $aidOptions) ?>
                <?php echo $form->error($element, 'right_aid'); ?>

            </td>
            <td>
                <?php echo $form->dropDownList($element, 'lva_ua', $visualAcuityOptions, array('onChange' => 'setCorrected(this.selectedIndex, \'ElementVisualAcuity_lva_cr\');'))
                ?>
                <?php echo $form->error($element, 'lva_ua'); ?>

            </td>
            <td>
                <?php echo $form->dropDownList($element, 'left_aid', $aidOptions) ?>
                <?php echo $form->error($element, 'left_aid'); ?>

            </td>
        </tr></table>
</div>

<div style="clear:both"></div>

<div class="eventDetail"   style="float:left;">

    <table width="100%" cellpadding="0"><tr>
            <td>
                <?php
                echo $form->dropDownList($element, 'rva_cr', $visualAcuityOptions, array(
                    'onChange' => 'setValue(this.selectedIndex, \'ElementVisualAcuity_rva_cr\')'))
                ?>
                <?php echo $form->error($element, 'rva_cr'); ?>
            </td>
            <td>

                <?php echo $form->dropDownList($element, 'rva_method', $methodOptions) ?>
                <?php echo $form->error($element, 'rva_method'); ?>
            </td>
            <td>

                <?php echo $form->dropDownList($element, 'lva_cr', $visualAcuityOptions, array('onChange' => 'setValue(this.selectedIndex, \'ElementVisualAcuity_lva_cr\')'))
                ?>
                <?php echo $form->error($element, 'lva_cr'); ?>
            </td>
            <td>

                <?php echo $form->dropDownList($element, 'lva_method', $methodOptions) ?>
                <?php echo $form->error($element, 'lva_method'); ?>
            </td>
        </tr></table>
</div>

<div style="clear:both"></div>

<br />
<script type="text/javascript">
    /*
     * TODO figure out how to remove the 'Unit:' label vua tge dropDownList...
     */
    var node = document.getElementById('div_ElementVisualAcuity_unit');
    
    node.removeChild(node.childNodes[1]);
</script>