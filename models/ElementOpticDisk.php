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

/**
 * This is the model class for table "element_gonioscopy".
 *
 * The followings are the available columns in table 'element_gonioscopy':
 * @property string $id
 * @property string $event_id
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Event $event
 */
class ElementOpticDisk extends EyeDrawBase {

    public $service;
    
    /**
     * 
     */
    function __construct($scenario = 'insert') {
        parent::__construct($scenario);
        $this->setDoodleInfo(array('DiskHaemorrhage', 'NerveFibreDefect', 'Papilloedema',
            'OpticDiskPit'));
    }
    
    /**
     * Returns the static model of the specified AR class.
     * @return the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'et_ophciglaucomaexamination_optic_disk';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, event_id, size_left, size_right, description_left, description_right, image_string_left, image_string_right', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, event_id, description_left, description_right, image_string_left, image_string_right', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'event_id' => 'Event',
            'description_left' => 'Description',
            'description_right' => 'Description',
            'image_string_left' => 'EyeDraw (left)',
            'image_string_right' => 'EyeDraw (right)',
            'size_left' => 'Size',
            'size_right' => 'Size',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('event_id', $this->event_id, true);
        $criteria->compare('description_left', $this->description_left, true);
        $criteria->compare('description_right', $this->description_right, true);
        $criteria->compare('image_string_left', $this->image_string_left, true);
        $criteria->compare('image_string_right', $this->image_string_right, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

    /**
     * Get an array of the valid select box options for disc
     * @return array
     */
    public function getSelectOptions() {
        $discSizeValues = array();
        for ($i = 0; $i < 4; $i++) {
            for ($k = 0; $k < 10; $k++) {
                $discSizeValues[($i * 10) + $k] = $i . "." . $k;
            }
        }

        $discSizeValues[40] = "4.0";
        return $discSizeValues;
    }

}
