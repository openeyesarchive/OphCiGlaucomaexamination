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
 * This is the model class for table "diagnosis".
 *
 * The followings are the available columns in table 'element_intraocular_pressure':
 * @property string $id
 * @property string $event_id
 * @property integer $diagnosis_right
 * @property integer $diagnosis_left
 */
class ElementGlaucomaDiagnosis extends BaseEventTypeElement {
    const Normal = 1;
    const OHT = 2;
    const NTG = 3;
    const OAG = 4;
    const NAG = 5;
    const ACG = 6;
    /**
     * Returns the static model of the specified AR class.
     * @return ElementIntraocularPressure the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'et_ophciglaucomaexamination_diagnosis';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('diagnosis_right, diagnosis_left, event_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, event_id, diagnosis_right, diagnosis_left', 'safe', 'on' => 'search'),
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
            'diagnosis_right' => 'Diagnosis',
            'diagnosis_left' => 'Diagnosis',
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
        $criteria->compare('diagnosis_left', $this->diagnosis_left);
        $criteria->compare('diagnosis_right', $this->diagnosis_right);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
    /**
     * Returns an array of all the instrument options
     *
     * @return array
     */
    public static function getDiagnosisOptions() {

        return array(
            self::Normal => 'Normal',
            self::OHT=> 'OHT',
            self::NTG => 'NTG',
            self::OAG => 'OAG',
            self::NAG => 'NAG',
            self::ACG => 'ACG',
        );
    }

}
