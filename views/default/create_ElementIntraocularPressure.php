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
$selectOptions = $element->getSelectOptions();
$instrumentOptions = $element->getInstrumentOptions();
?>

<script type="text/javascript">
    // Change instrument select's default values
    function changeDefault(_index)
    {
        document.getElementById("ElementIntraocularPressure_instrument_right").selectedIndex = _index;
        document.getElementById("ElementIntraocularPressure_instrument_left").selectedIndex = _index;
    }

    // Change left eye select value
    function changeLeftSelect(_index)
    {
        if (document.getElementById("chk_lnk").checked)
        {
            document.getElementById("ElementIntraocularPressure_instrument_left").selectedIndex = _index;
        }
    }

    // Show or hide the notes boxes
    function showInstruments(_value)
    {
        if (_value)
        {
            document.getElementById("ElementIntraocularPressure_instrument_right").style.display = "inline";
            document.getElementById("ElementIntraocularPressure_instrument_left").style.display = "inline";
        }
        else
        {
            document.getElementById("ElementIntraocularPressure_instrument_right").style.display = "none";
            document.getElementById("ElementIntraocularPressure_instrument_left").style.display = "none";
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
                    <td style="border-top: 2px solid #444; ">
                        <?php
                        echo $form->dropDownList($element, 'right_iop', $selectOptions, array('empty' =>
                            '- Please select -'));
                        ?>
                    </td>
                    <td style="border-top: 2px solid #444; border-left: 1px solid #444;">
                        <?php
                        echo $form->dropDownList($element, 'left_iop', $selectOptions, array('empty' =>
                            '- Please select -'));
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
</center>


<?php
echo $form->dropDownList($element, 'instrument_right', $instrumentOptions, 
        array(
            'onchange' => 'changeLeftSelect(this.selectedIndex);'
        ));
?>
<?php
echo $form->dropDownList($element, 'instrument_left', $instrumentOptions, null);
?>

<script type="text/javascript">
    document.getElementById("div_ElementIntraocularPressure_instrument_right").style.display="none";
    document.getElementById("div_ElementIntraocularPressure_instrument_left").style.display="none";
</script>