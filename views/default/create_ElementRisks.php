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
<div>
    <?php
    $values = array('angina', 'asthma', 'blood_loss', 'cardiac_surgery', 'cva',
        'foh', 'hyperopia', 'hypotension', 'myopia', 'migraine', 'raynauds',
        'sob');
    foreach ($values as $value) {
        ?>
        <div style="width:25%; float:left;">
            <?php
            echo $form->checkBox($element, $value, array('value' => '0', 'uncheckValue' => '1'));
            ?>
        </div>
        <?php
    }
    ?>
</div>
<div style="clear:both"></div>
