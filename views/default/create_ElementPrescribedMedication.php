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
$medicationGroups = $element->getMedicationGroups();
// list of medications for the first list:
$medications = array();
// map of group name to medications in that group:
$group2medications = array();
// map of to medications to group name:
$medications2group = array();
// map group name with array of groups NOT added with the specified group
// (should another selection occur):
$groupRemoval = array();
// populate data:
foreach ($medicationGroups as $group) {
    $medications = array_merge($group[1], $medications);
    foreach ($group[1] as $medication) {
        array_push($medications2group, array($medication => $group[0]));
    }
    array_push($group2medications, array($group[0] => $group[1]));
    array_push($groupRemoval, array($group[0] => $group[2]));
}
sort($medications);
$medications1 = $medications;
//$instrumentOptions = $element->getInstrumentOptions();
?>

<script type="text/javascript">
    // step 1 - what's the current medication and it's group?
    var medications = new Array();
    // medications for the second list:
    var medications2 = new Array();
<?php
$i = 1;
foreach ($medications2group as $medGroup) {
    foreach ($medGroup as $med => $group) {
        echo "medications['" . $med
        . "'] = '" . $group . "';\n";
        echo "medications['" . $med
        . "'].value = " . $i++ . ";\n";
    }
}
?>
    // step 2 - what's the current group and what groups does it conflict with?
    // step 1 - what's the current medication and it's group?
    var groupRemoval = new Array();
<?php
foreach ($groupRemoval as $medGroup) {
    $i = 0;
    foreach ($medGroup as $med => $groups) {
        echo "groupRemoval['" . $med . "'] = new Array();\n";
        foreach ($groups as $group) {
            echo "groupRemoval['" . $med . "'][" . $i . "] = '" . $group . "';\n";
            $i++;
        }
    }
}
?>
    
    function getIndex(data) {
        var val = 1;
        if (data == 'Alphagen') {
            
        } else if (data == 'Azopt') {
            val = 2;
        } else if (data == 'Betopic') {
            val = 3;
        } else if (data == 'Combigan') {
            val = 4;
        } else if (data == 'Cosopt') {
            val = 5;
        } else if (data == 'Diamox') {
            val = 6;
        } else if (data == 'Diamox SR') {
            val = 7;
        } else if (data == 'Ganforte') {
            val = 8;
        } else if (data == 'Iopidine') {
            val = 9;
        } else if (data == 'Lumigan') {
            val = 10;
        } else if (data == 'PGAAzagra') {
            val = 11;
        } else if (data == 'Pilocarpine') {
            val = 12;
        } else if (data == 'Teoptic') {
            val = 13;
        } else if (data == 'Timolol') {
            val = 14;
        } else if (data == 'Travatan') {
            val = 15;
        } else if (data == 'Trusopt') {
            val = 16;
        } else if (data == 'Xalatan') {
            val = 17;
        } else if (data == 'Xalcom') {
            val = 18;
        }
        //        alert(data + " , " + val);
        return val;
    }
    
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
                option.value = "" + getIndex(options[i].text) + "";
            }
        }
    }
    
</script>

<h4 class="elementTypeName"><?php echo $element->elementType->name ?></h4>
<center>
    <div style="text-align:center;  float:center;" class="<?php echo $element->elementType->class_name ?>">

        <div class="eventDetail" style="text-align:center;  float:center;">

            <table align="center" cellpadding="0" cellspacing="0" height="40">
                <tbody >
                    <tr >
                        <td>
                            <?php
                            echo $form->dropDownList($element, 'medication_1', $medications1, array('empty' =>
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
                </tbody>
            </table>

        </div>
    </div>
</center>

<script type="text/javascript">
    document.getElementById("div_ElementIntraocularPressure_instrument_right").style.display="none";
    document.getElementById("div_ElementIntraocularPressure_instrument_left").style.display="none";
</script>
