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
// list of diagnoses for the first list:
$diagnoses = $element->getDiagnoses();
// map of to diagnoses to group name:
$diagnoses2group = $element->getDiagnosisGroups();
// map group name with array of groups NOT added with the specified group
// (should another selection occur):
$diagnosisGroupRemoval = $element->getConflictingGroups();
?>

<script type="text/javascript">
    // step 1 - what's the current medication and it's group?
    var diagnoses = new Array();
    // diagnoses for the second list:
    var diagnoses2 = new Array();
<?php
$i = 1;
foreach ($diagnoses2group as $med => $medGroup) {
//    foreach ($medGroup as $med => $group) {
    echo "diagnoses['" . $med
    . "'] = '" . $medGroup . "';\n";
    echo "diagnoses['" . $med
    . "'].value = " . $i++ . ";\n";
//    }
}
?>
    // step 2 - what's the current group and what groups does it conflict with?
    // step 1 - what's the current medication and it's group?
    var diagnosisGroupRemoval = new Array();
<?php
foreach ($diagnosisGroupRemoval as $medGroup => $conflictingGroups) {
    $i = 0;
    echo "diagnosisGroupRemoval['" . $medGroup . "'] = new Array();\n";
    foreach ($conflictingGroups as $group) {
        echo "diagnosisGroupRemoval['" . $medGroup . "'][" . $i . "] = '" . $group . "';\n";
        $i++;
    }
}
?>
</script>

<div style="clear: both"></div> 
<h4 class="elementTypeName" style="clear:both;"><?php echo $element->elementType->name ?></h4>

<div class="eventDetail"> 

    <div class="eventDetail" style="width: 80%">
 
        <div  style="float:left;">    
            <?php
            echo $form->dropDownList($element, 'diagnosis_1_right', $diagnoses, array('empty' =>
                '- Please select -', 'onChange' => 'populateList(\'ElementGlaucomaDiagnosis_diagnosis_1_right\', \'ElementGlaucomaDiagnosis_diagnosis_2_right\', \'ElementGlaucomaDiagnosis_diagnosis_3_right\', diagnosisGroupRemoval, diagnoses, diagnoses2);'));
            ?>
        </div>

        <div  style="float:right;">    
            <?php
            echo $form->dropDownList($element, 'diagnosis_1_left', $diagnoses, array('empty' =>
                '- Please select -', 'onChange' => 'populateList(\'ElementGlaucomaDiagnosis_diagnosis_1_left\', \'ElementGlaucomaDiagnosis_diagnosis_2_left\', \'ElementGlaucomaDiagnosis_diagnosis_3_left\', diagnosisGroupRemoval, diagnoses, diagnoses2);'));
            ?>
        </div>

        <div class="eventDetail" style=" clear: both; float:left;">    
            <?php
            echo $form->dropDownList($element, 'diagnosis_2_right', array(), array('empty' =>
                '- Please select -', 'onChange' => 'populateList(\'ElementGlaucomaDiagnosis_diagnosis_2_right\', \'ElementGlaucomaDiagnosis_diagnosis_3_right\', null, diagnosisGroupRemoval, diagnoses, diagnoses2);'));
            ?>
        </div>

        <div class="eventDetail" style="float:right;"> 
            <?php
            echo $form->dropDownList($element, 'diagnosis_2_left', array(), array('empty' =>
                '- Please select -', 'onChange' => 'populateList(\'ElementGlaucomaDiagnosis_diagnosis_2_left\', \'ElementGlaucomaDiagnosis_diagnosis_3_left\', null, diagnosisGroupRemoval, diagnoses, diagnoses2);'));
            ?>  
        </div>
        <div style="clear:both"></div>

        <div class="eventDetail" style="float:left;"> 

            <?php
            echo $form->dropDownList($element, 'diagnosis_3_right', array(), array('empty' =>
                '- Please select -'));
            ?>
        </div>
        <div class="eventDetail" style="float:right;"> 

            <?php
            echo $form->dropDownList($element, 'diagnosis_3_left', array(), array('empty' =>
                '- Please select -'));
            ?>
        </div>
    </div>
    <div style="clear:both"></div>
</div>


<script type="text/javascript">
    // make the 2nd and 3rd selects hidden until they're used:
    document.getElementById("div_ElementGlaucomaDiagnosis_diagnosis_2_right").style.display = "none";
    document.getElementById("div_ElementGlaucomaDiagnosis_diagnosis_3_right").style.display = "none";
    document.getElementById("div_ElementGlaucomaDiagnosis_diagnosis_2_left").style.display = "none";
    document.getElementById("div_ElementGlaucomaDiagnosis_diagnosis_3_left").style.display = "none";
</script>

<div style="clear:both"></div>
