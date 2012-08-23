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
// list of medications for the first list:
$medications = $element->getMedications();
// map of to medications to group name:
$medications2group = $element->getMedicationGroups();
// map group name with array of groups NOT added with the specified group
// (should another selection occur):
$groupRemoval = $element->getConflictingGroups();
?>

<script type="text/javascript">
    // step 1 - what's the current medication and it's group?
    var medications = new Array();
    // medications for the second list:
    var medications2 = new Array();
<?php
$i = 1;
foreach ($medications2group as $med => $medGroup) {
//    foreach ($medGroup as $med => $group) {
    echo "medications['" . $med
    . "'] = '" . $medGroup . "';\n";
    echo "medications['" . $med
    . "'].value = " . $i++ . ";\n";
//    }
}
?>
    // step 2 - what's the current group and what groups does it conflict with?
    // step 1 - what's the current medication and it's group?
    var groupRemoval = new Array();
<?php
foreach ($groupRemoval as $medGroup => $conflictingGroups) {
    $i = 0;
    echo "groupRemoval['" . $medGroup . "'] = new Array();\n";
    foreach ($conflictingGroups as $group) {
        echo "groupRemoval['" . $medGroup . "'][" . $i . "] = '" . $group . "';\n";
        $i++;
    }
}
?>
    
    /**
     * Populate the second list according to the values held in the first
     * list.
     *
     * medList1 the first list of medications to examine; this will not
     * be changed, and will be used to influence the values in the
     * second list.
     * 
     * medList2 the second list that will be influenced by the contents
     * of the first list.
     */
    function populateList(medList1, medList2) {
        var list1 = document.getElementById(medList1);
        var list2 = document.getElementById(medList2);
        var index = list1.selectedIndex;
        // get the name of the currently selected medication:
        var medName = list1.options[index].text;
        var options = list1.options;
        list2.options.length = 0;
        option = list2.options[list2.options.length] = new Option("- Please Select -",""); 
        var x;
        for (var i = 1; i < options.length; i++) {
            var isToRemove = false;
            for (var k = 0; k < groupRemoval[medications[medName]].length; k++) {
                if (medications[options[i].text] == groupRemoval[medications[medName]][k]) {
                    isToRemove = true;
                    break;
                }
            }
            if (!isToRemove) {
                medications2[medications2.length] = options[i].text;
                option = list2.options[list2.options.length] = new Option(options[i].text,""); 
                option.value = options[i].value;
                x = option.value;
            }
        }
    }
    
</script>

<h4 class="elementTypeName"><?php echo $element->elementType->name ?></h4>
<div class="eventDetail" style="text-align:center;">

    <table cellpadding="0" cellspacing="0" height="40">
        <tr >
            <td align="left">
                <?php
                echo $form->dropDownList($element, 'medication_1', $medications, array('empty' =>
                    '- Please select -', 'onChange' => 'populateList(\'ElementPrescribedMedication_medication_1\', \'ElementPrescribedMedication_medication_2\');'));
                ?>
            </td>
            <td>
                <?php
                echo $form->dropDownList($element, 'medication_2', array(), array('empty' =>
                    '- Please select -', 'onChange' => 'populateList(\'ElementPrescribedMedication_medication_2\', \'ElementPrescribedMedication_medication_3\');'));
                ?>
            </td>
            <td>
                <?php
                echo $form->dropDownList($element, 'medication_3', array(), array('empty' =>
                    '- Please select -'));
                ?>
            </td>
        </tr>
    </table>

</div>

<script type="text/javascript">
    document.getElementById("div_ElementIntraocularPressure_instrument_right").style.display="none";
    document.getElementById("div_ElementIntraocularPressure_instrument_left").style.display="none";
</script>

<div style="clear:both"></div>
