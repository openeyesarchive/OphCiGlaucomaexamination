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

<div class="<?php echo $element->elementType->class_name ?> ondemand<?php if (@$ondemand) { ?> hidden<?php } ?>">

    <h4 class="elementTypeName">
        <a href="#" id="button1" onClick="toggleDivWithImages('<?php echo $element->elementType->class_name ?>', '<?php echo $element->elementType->class_name ?>_image','<?php echo $this->assetPath?>/img/discloseSmallOpen16.gif', '<?php echo $this->assetPath?>/img/discloseSmallClose16.gif'); return false;" class="<?php echo $element->elementType->class_name ?>_link" title="Click to reveal Fields to confrontation and enter data for it">
            <img id="<?php echo $element->elementType->class_name ?>_image" src="<?php echo $this->assetPath?>/img/discloseSmallOpen16.gif"/> Anterior Segment
        </a>

    </h4>

    <div id="<?php echo $element->elementType->class_name ?>" class="eventDetail">
        
        <table>
            <tr>
                <td width="50%">
                    <?php echo $form->textField($element, 'cct_right', array()); ?>
                </td>
                <td width="50%">
                    <?php echo $form->textField($element, 'cct_left', array()); ?>
                </td>
            </tr>
        </table>
        <div class="splitElement clearfix" style="background-color: inherit; color: inherit">
            <div class="left" style="width:50%;">
                <?php
                $this->widget('application.modules.eyedraw.OEEyeDrawWidgetAnteriorSegmentGlaucoma', array(
                    'identifier' => 'AnteriorSegmentRight',
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
            <div  class="right" style="width:50%;">
                <?php
                $this->widget('application.modules.eyedraw.OEEyeDrawWidgetAnteriorSegmentGlaucoma', array(
                    'identifier' => 'AnteriorSegmentLeft',
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
            </h4>

            <div class="left" style="width:50%;">
                <table>
                    <tr>
                        <td>
                            <div class="eventDetail">

                                <input value="Add to Report" type="button"
                                       title="Extracts description and diagnosis from drawingEdit" 
                                       onclick="addToReport(ed_drawing_edit_AnteriorSegmentRight, 
                                           ElementAnteriorSegment_description_right); return false;" >
                            </div>
                        </td>
                        <td>
                            <div class="eventDetail">
                                <input value="Reset" type="button" title="Clear drawing and start again"
                                       onclick="resetEdit(ed_drawing_edit_AnteriorSegmentRight,
                                           ElementAnteriorSegment_description_right); return false;" />
                            </div>
                        </td>
                        <td>
                            <?php echo $form->textArea($element, 'description_right', array('rows' => 2, 'cols' => 30)) ?>

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
                                       onclick="addToReport(ed_drawing_edit_AnteriorSegmentLeft, 
                                       ElementAnteriorSegment_description_left); return false;" >
                            </div>
                        </td>
                        <td>
                            <div class="eventDetail">
                                <input value="Reset" type="button" title="Clear drawing and start again"
                                       onclick="resetEdit(ed_drawing_edit_AnteriorSegmentLeft,
                                       ElementAnteriorSegment_description_left); return false;" />
                            </div>
                        </td>
                        <td>
                            <div class="left" style="width:50%;">
                                <?php echo $form->textArea($element, 'description_left', array('rows' => 2, 'cols' => 30)) ?>
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
    var node = document.getElementById('div_ElementAnteriorSegment_description_right');
    node.removeChild(node.childNodes[1]);
    var node = document.getElementById('div_ElementAnteriorSegment_description_left');
    node.removeChild(node.childNodes[1]);
</script>