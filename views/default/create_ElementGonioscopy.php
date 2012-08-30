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
<script type="text/javascript">
    
    // Level
    var isBasic = true;
    
    // Variables assigned to each drawing on this page
    var drawingEdit;
    var drawingDisplay;
        
    // Variables for angleGrade doodles of each quadrant
    var doodleAngleGradeSup;
    var doodleAngleGradeNas;
    var doodleAngleGradeInf;
    var doodleAngleGradeTem;
		                                    
    // Runs on page load
    function init()
    {
        // Initial level setting
        changeLevel('Basic');
    }
        
    function foo(bar) {
        alert(bar);
    }
    function canvasInit(_canvas)
    {
        // Get reference to the drawingEdit canvas
        //var canvasEdit = document.getElementById("canvasEdit")
            
        // Create a drawing
        //        drawingEdit = new ED.Drawing(_canvas, ED.eye.Right, 'RPS', true, 0, 0);
        //            
        //        // Preload images
        //        drawingEdit.preLoadImagesFrom('../../graphics/');
        //            
        //        // Set focus to canvasEdit element
        //        _canvas.focus();
            
        // Wait for drawingEdit object to be ready before adding objects or drawingEdits
        //        drawingEdit.onLoaded = function()
        //        {
        //            drawingEdit.addDoodle('Gonioscopy');
        //                
        //            // AngleGrade doodles
        //            doodleAngleGradeSup = drawingEdit.addDoodle('AngleGrade');
        //            doodleAngleGradeNas = drawingEdit.addDoodle('AngleGrade');
        //            doodleAngleGradeNas.rotation = 90 * Math.PI/180;
        //            doodleAngleGradeInf = drawingEdit.addDoodle('AngleGrade');
        //            doodleAngleGradeInf.rotation = 180 * Math.PI/180;
        //            doodleAngleGradeTem = drawingEdit.addDoodle('AngleGrade');
        //            doodleAngleGradeTem.rotation = 270 * Math.PI/180;
        //                
        //            drawingEdit.deselectDoodles();
        //            drawingEdit.drawAllDoodles();
        //        }
            
        // Function to detect changes in parameters (eg from mouse dragging)
        //        drawingEdit.parameterListener = function()
        //        {
        //            if (drawingEdit.selectedDoodle != null && drawingEdit.selectedDoodle.className == 'AngleGrade')
        //            {
        //                if (typeof(doodleAngleGradeSup) != 'undefined' && doodleAngleGradeSup.isSelected)
        //                {
        //                    var angleGradeSup = document.getElementById('angleGradeSup');
        //                    var angleVisSup = document.getElementById('angleVisSup');
        //                    var grade = doodleAngleGradeSup.getParameter('grade');
        //                    angleGradeSup.value = grade;
        //                    if (grade == 'III' || grade == 'IV') angleVisSup.value = "No";
        //                    else angleVisSup.value = "Yes";
        //                }
        //                if (typeof(doodleAngleGradeNas) != 'undefined' && doodleAngleGradeNas.isSelected)
        //                {
        //                    var angleGradeNas = document.getElementById('angleGradeNas');
        //                    var angleVisNas = document.getElementById('angleVisNas');
        //                    var grade = doodleAngleGradeNas.getParameter('grade');
        //                    angleGradeNas.value = grade;
        //                    if (grade == 'III' || grade == 'IV') angleVisNas.value = "No";
        //                    else angleVisNas.value = "Yes";
        //                }
        //                if (typeof(doodleAngleGradeInf) != 'undefined' && doodleAngleGradeInf.isSelected)
        //                {
        //                    var angleGradeInf = document.getElementById('angleGradeInf');
        //                    var angleVisInf = document.getElementById('angleVisInf');
        //                    var grade = doodleAngleGradeInf.getParameter('grade');
        //                    angleGradeInf.value = grade;
        //                    if (grade == 'III' || grade == 'IV') angleVisInf.value = "No";
        //                    else angleVisInf.value = "Yes";
        //                }
        //                if (typeof(doodleAngleGradeTem) != 'undefined' && doodleAngleGradeTem.isSelected)
        //                {
        //                    var angleGradeTem = document.getElementById('angleGradeTem');
        //                    var angleVisTem = document.getElementById('angleVisTem');
        //                    var grade = doodleAngleGradeTem.getParameter('grade');
        //                    angleGradeTem.value = grade;
        //                    if (grade == 'III' || grade == 'IV') angleVisTem.value = "No";
        //                    else angleVisTem.value = "Yes";
        //                }
        //            }
        //        }
    }
        
    function setGrade(_doodleVarName, _value)
    {
        var doodle;
            
        switch (_doodleVarName)
        {
            case "doodleAngleGradeSup":
                doodle = doodleAngleGradeSup;
                break;
            case "doodleAngleGradeNas":
                doodle = doodleAngleGradeNas;
                break;
            case "doodleAngleGradeInf":
                doodle = doodleAngleGradeInf;
                break;
            case "doodleAngleGradeTem":
                doodle = doodleAngleGradeTem;
                break;
            default:
                doodle = null;
                break;
        }
            
        // Set new value for doodle
        //        if (_value == "Yes") drawingEdit.setParameterForDoodle(doodle, 'grade', "O");
        //        else if (_value == "No") drawingEdit.setParameterForDoodle(doodle, 'grade', "III");
        //        else drawingEdit.setParameterForDoodle(doodle, 'grade', _value); 
    }
               
    function popupSelect(_value, _id, _div)
    {
        var select = document.getElementById(_id);
        select.value = _value;
        hidePop(_div);
    }
        
    function showPop(id)
    {
        document.getElementById(id).style.visibility = "visible";
        document.getElementById(id).style.display = "inline";
    }
		
    function hidePop(id)
    {
        document.getElementById(id).style.visibility = "hidden";
        document.getElementById(id).style.display = "none";
    }
		
    function changeLevel(_value)
    {
        // Set flag indicating level
        if (_value == 'Basic') isBasic = true;
        else isBasic = false;
			
        // Basic level
        if (isBasic)
        {
            // Quadrant controls
            //            document.getElementById("quadrantLable").innerHTML = "Pigmented meshwork seen:";
            //            document.getElementById("AngleRecessionGonioscopyRight").style.display = "inline";
            document.getElementById("AntSynechGonioscopyRight").style.display = "none";
            document.getElementById("AngleRecessionGonioscopyRight").style.display = "none";
            document.getElementById("AntSynechGonioscopyLeft").style.display = "none";
            document.getElementById("AngleRecessionGonioscopyLeft").style.display = "none";
            document.getElementById("gonioscopy_advanced").style.display = "none";
            //            document.getElementById("angleGradeNas").style.display = "none";
            //            document.getElementById("angleVisNas").style.display = "inline";
            //            document.getElementById("angleGradeInf").style.display = "none";
            //            document.getElementById("angleVisInf").style.display = "inline";
            //            document.getElementById("angleGradeTem").style.display = "none";
            //            document.getElementById("angleVisTem").style.display = "inline";
				
            // Other controls
            //            document.getElementById("expertControls").style.display = "none";
				
            // Doodle buttons
            //            document.getElementById("asButton").style.display = "none";
            //            document.getElementById("arButton").style.display = "none";
				
            // Select canvas size (NB chaining canvas size seems to mess up pointInPath method?)
            //            document.getElementById("canvasBasicDiv").style.display = "inline";
            //            document.getElementById("canvasExpertDiv").style.display = "none";
            //            document.getElementById("controlsDiv").style.width = "280px";					
            //            canvasInit(document.getElementById("canvasBasic"));	
        }
        // Expert level
        else
        {
            // Quadrant controls";
            document.getElementById("AntSynechGonioscopyRight").style.display = "inline";
            document.getElementById("AngleRecessionGonioscopyRight").style.display = "inline";
            document.getElementById("AntSynechGonioscopyLeft").style.display = "inline";
            document.getElementById("AngleRecessionGonioscopyLeft").style.display = "inline";
            document.getElementById("gonioscopy_advanced").style.display = "inline";
            //            document.getElementById("quadrantLable").innerHTML = "Scheie grade:";
            document.getElementById("angleGradeSup").style.display = "inline";
            document.getElementById("angleVisSup").style.display = "none";
            document.getElementById("angleGradeNas").style.display = "inline";
            document.getElementById("angleVisNas").style.display = "none";
            document.getElementById("angleGradeInf").style.display = "inline";
            document.getElementById("angleVisInf").style.display = "none";
            document.getElementById("angleGradeTem").style.display = "inline";
            document.getElementById("angleVisTem").style.display = "none";
				
            // Other controls
            document.getElementById("expertControls").style.display = "inline";
            document.getElementById("vanHerickPNG").style.display = "inline";
				
            // Doodle buttons
            document.getElementById("asButton").style.display = "inline";
            document.getElementById("arButton").style.display = "inline";
								
            // Canvas size	
            document.getElementById("canvasBasicDiv").style.display = "none";
            document.getElementById("canvasExpertDiv").style.display = "inline";
            document.getElementById("controlsDiv").style.width = "220px";					
            canvasInit(document.getElementById("canvasExpert"));				
        }
    }

    
</script>

<?php
$gonioOptions = $element->getGonioscopyOptions();
$vanHerickOptions = $element->getVanHerickOptions();
?>


<?php
$displayNone = "style=\"display:none\"";
if (ElementFollowUp::model()->isFollowUp($this->patient->id) == true) {
    $displayNone = "";
}
?>

<body onload="init();" /> 

<div class="<?php echo $element->elementType->class_name ?> ondemand<?php if (@$ondemand) { ?> hidden<?php } ?>">

    <h4 class="elementTypeName">
        <a href="#" id="button1" onClick="toggleDivWithImages('<?php echo $element->elementType->class_name ?>', '<?php echo $element->elementType->class_name ?>_image','<?php echo $this->imgPath?>discloseSmallOpen16.gif', '<?php echo $this->imgPath?>discloseSmallClose16.gif'); return false;" class="<?php echo $element->elementType->class_name ?>_link" title="Click to reveal Fields to confrontation and enter data for it">
            <img id="<?php echo $element->elementType->class_name ?>_image" src="<?php echo $this->imgPath?>discloseSmallOpen16.gif"/> Gonioscopy
        </a>

    </h4>
    <div id="<?php echo $element->elementType->class_name ?>" class="eventDetail">
        <div class="splitElement clearfix">

            <!-- Settings section -->
            <div class="left" align="left">

                <table cellspacing="0"  >
                    <tbody>
                        <tr>
                            <td style="width: auto; margin-bottom:5px;">Level:</td>
                            <td align="left" >
                                <select style="width: auto; margin-bottom:5px;" onchange="changeLevel(this.value);">
                                    <option>Basic</option>
                                    <option>Expert</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="gonioscopy_right" class="left" style="width:50%;">
                <?php
                $this->widget('application.modules.eyedraw.OEEyeDrawWidgetGonioscopy', array(
                    'identifier' => 'GonioscopyRight',
                    'side' => 'R',
                    'mode' => 'edit',
                    'size' => 200,
                    'model' => $element,
                    'attribute' => 'image_string_right',
                    'offset_x' => 10,
                    'offset_y' => 10,
                ));
                ?> 
            </div>
            <!--      if follow up, display is not none:-->
            <div id="gonioscopy_left" class="right" style="width:50%;">
                <?php
                $this->widget('application.modules.eyedraw.OEEyeDrawWidgetGonioscopy', array(
                    'identifier' => 'GonioscopyLeft',
                    'side' => 'L',
                    'mode' => 'edit',
                    'size' => 200,
                    'model' => $element,
                    'attribute' => 'image_string_left',
                    'offset_x' => 10,
                    'offset_y' => 10,
                ));
                ?>
            </div>

            <div class="right" style="width:50%">

                <?php
                echo $form->dropDownList($element, 'gonio_left', $gonioOptions, array());
                ?>
                <?php echo $form->error($element, 'gonio_left'); ?>
            </div>

            <div class="left" style="width:50%">

                <?php
                echo $form->dropDownList($element, 'gonio_right', $gonioOptions, array());
                ?>
                <?php echo $form->error($element, 'gonio_right'); ?>
            </div>

            <div id="gonioscopy_advanced">
                <div class="right" style="width:50%">

                    <?php
                    echo $form->dropDownList($element, 'van_herick_left', $vanHerickOptions, array());
                    ?>
                    <?php echo $form->error($element, 'van_herick_left'); ?>
                </div>

                <div class="left" style="width:50%">

                    <?php
                    echo $form->dropDownList($element, 'van_herick_right', $vanHerickOptions, array());
                    ?>
                    <?php echo $form->error($element, 'van_herick_right'); ?>

                </div>

                <div class="right" style="width:50%">
                    <div class="eventDetail"> 
                        <a href="javascript:void(0);" title="Br J Ophthalmol 2000;84:186–192" onClick="showPop('vanHerickPNGLeft');">Foster images</a>
                    </div>
                    <div style="display:none; z-index:100; position:absolute" id='vanHerickPNGLeft' class="popup" title="Click an area of image to select result">
                        <img usemap="#pickmapL" width=450 src="<?php echo $this->imgPath ?>gonioscopy.png">
                        <map name="pickmapL">
                            <area style="cursor:pointer" shape="rect" coords="0,0,225,225" onclick="popupSelect(5, 'ElementGonioscopy_van_herick_left', 'vanHerickPNGLeft');" />
                            <area style="cursor:pointer" shape="rect" coords="0,225,225,450" onclick="popupSelect(15, 'ElementGonioscopy_van_herick_left', 'vanHerickPNGLeft');" />
                            <area style="cursor:pointer" shape="rect" coords="0,450,225,675" onclick="popupSelect(25, 'ElementGonioscopy_van_herick_left', 'vanHerickPNGLeft');" />
                            <area style="cursor:pointer" shape="rect" coords="225,0,450,225" onclick="popupSelect(30, 'ElementGonioscopy_van_herick_left', 'vanHerickPNGLeft');" />
                            <area style="cursor:pointer" shape="rect" coords="225,225,450,450" onclick="popupSelect(75, 'ElementGonioscopy_van_herick_left', 'vanHerickPNGLeft');" />
                            <area style="cursor:pointer" shape="rect" coords="225,450,450,675" onclick="popupSelect(100, 'ElementGonioscopy_van_herick_left', 'vanHerickPNGLeft');" />						                    	</map>
                    </div>	
                </div>						
                <div class="left" style="width:50%">

                    <div class="eventDetail"> 
                        <a href="javascript:void(0);" title="Br J Ophthalmol 2000;84:186–192" onClick="showPop('vanHerickPNGRight');">Foster images</a>
                    </div>
                    <span style="display:none; z-index:100; position:absolute" id='vanHerickPNGRight' class="popup" title="Click an area of image to select result">
                        <img usemap="#pickmapR" width=450 src="<?php echo $this->imgPath ?>gonioscopy.png">
                        <map name="pickmapR">
                            <area style="cursor:pointer" shape="rect" coords="0,0,225,225" onclick="popupSelect(5, 'ElementGonioscopy_van_herick_right', 'vanHerickPNGRight');" />
                            <area style="cursor:pointer" shape="rect" coords="0,225,225,450" onclick="popupSelect(15, 'ElementGonioscopy_van_herick_right', 'vanHerickPNGRight');" />
                            <area style="cursor:pointer" shape="rect" coords="0,450,225,675" onclick="popupSelect(25, 'ElementGonioscopy_van_herick_right', 'vanHerickPNGRight');" />
                            <area style="cursor:pointer" shape="rect" coords="225,0,450,225" onclick="popupSelect(30, 'ElementGonioscopy_van_herick_right', 'vanHerickPNGRight');" />
                            <area style="cursor:pointer" shape="rect" coords="225,225,450,450" onclick="popupSelect(75, 'ElementGonioscopy_van_herick_right', 'vanHerickPNGRight');" />
                            <area style="cursor:pointer" shape="rect" coords="225,450,450,675" onclick="popupSelect(100, 'ElementGonioscopy_van_herick_right', 'vanHerickPNGRight');" />						                    	</map>
                    </span>
                    <!--                    <a href="javascript:void(0);" title="Br J Ophthalmol 2000;84:186–192" onClick="showPop('vanHerickPNG');">Foster images</a>-->
                </div>

            </div>
            <div class="left" style="width:50%;">
                <table>
                    <tr>
                        <td>
                            <div class="eventDetail">
                                <input value="Add to Report" type="button"
                                       title="Extracts description and diagnosis from drawingEdit" 
                                       onclick="addToReport(ed_drawing_edit_GonioscopyRight, 
                                           ElementGonioscopy_description_right); return false;" >
                            </div>
                        </td>
                        <td>
                            <div class="eventDetail">
                                <input value="Reset" type="button" title="Clear drawing and start again"
                                       onclick="resetEdit(ed_drawing_edit_GonioscopyRight,
                                           ElementGonioscopy_description_right); return false;" />
                            </div>
                        </td>
                        <td>
                            <div class="left" style="width:50%;">
                                <?php echo $form->textArea($element, 'description_right', array('rows' => 2, 'cols' => 30)) ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="right" style="width:50%;">
                <table>
                    <tr>
                        <td>
                            <div class="eventDetail">
                                <input value="Add to Report" type="button"
                                       title="Extracts description and diagnosis from drawingEdit" 
                                       onclick="addToReport(ed_drawing_edit_GonioscopyLeft, 
                                           ElementGonioscopy_description_left); return false;" >
                            </div>
                        </td>
                        <td>
                            <div class="eventDetail">
                                <input value="Reset" type="button" title="Clear drawing and start again"
                                       onclick="resetEdit(ed_drawing_edit_GonioscopyLeft,
                                           ElementGonioscopy_description_left); return false;" />
                            </div>
                        </td>
                        <td>
                            <div class="left" style="width:50%;">
                                <?php echo $form->textArea($element, 'description_left', array('rows' => 2, 'cols' => 30));
                                ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    /*
     * TODO figure out how to remove the 'Unit:' label vua tge dropDownList...
     */
    var node = document.getElementById('div_ElementGonioscopy_description_right');
    node.removeChild(node.childNodes[1]);
    var node = document.getElementById('div_ElementGonioscopy_description_left');
    node.removeChild(node.childNodes[1]);
</script>
