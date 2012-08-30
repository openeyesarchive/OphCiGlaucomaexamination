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
 * @property integer $diagnosis_1_right
 * @property integer $diagnosis_1_left
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
            array('diagnosis_1_right, diagnosis_2_right, diagnosis_3_right, diagnosis_1_left, diagnosis_2_left, diagnosis_3_left, event_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, event_id, diagnosis_1_right, diagnosis_2_right, diagnosis_3_right, diagnosis_1_left, diagnosis_2_left, diagnosis_3_left', 'safe', 'on' => 'search'),
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
            'diagnosis_1_right' => 'Diagnosis 1',
            'diagnosis_1_left' => 'Diagnosis 1',
            'diagnosis_2_right' => 'Diagnosis 2',
            'diagnosis_2_left' => 'Diagnosis 2',
            'diagnosis_3_right' => 'Diagnosis 3',
            'diagnosis_3_left' => 'Diagnosis 3',
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
        $criteria->compare('diagnosis_1_left', $this->diagnosis_1_left);
        $criteria->compare('diagnosis_1_right', $this->diagnosis_1_right);
        $criteria->compare('diagnosis_2_left', $this->diagnosis_2_left);
        $criteria->compare('diagnosis_2_right', $this->diagnosis_2_right);
        $criteria->compare('diagnosis_3_left', $this->diagnosis_3_left);
        $criteria->compare('diagnosis_3_right', $this->diagnosis_3_right);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
    /**
     * Returns an array of all the diagnoses options.
     *
     * @deprecated no longer used; use {@link getDiagnoses()} instead.
     * 
     * @return an associateive array of int(index) => string(diagnosis).
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
    
    /**
     * Gets the list of glaucoma diagnoses.
     * 
     * Ideally this will all be re-factored in to the database at some point.
     * 
     * @return array of medications, indexed alphabetically as an associative
     * array of int(index) => string(diagnosis) values.
     */
    function getDiagnoses() {
        return array(
            1 => 'G Suspect',
            2 => 'OAG',
            3 => 'NTG',
            4 => 'PXF',
            5 => 'PDS',
            6 => 'PDS-G',
            7 => 'ACG',
            8 => 'CNAG',
            9 => 'OHT',
            10 => 'Normal',
            11 => 'Cataract',
            12 => 'AMD: wet',
            13 => 'AMD: dry'
        );
    }
    
    /**
     * Gets the list of glaucoma medications mapped to medication groups.
     * 
     * Ideally this will all be re-factored in to the database at some point.
     * 
     * @return array of medications and groups, indexed alphabetically as
     * an associative array of string(medication) => string(medicationGroup)
     * values.
     */
    function getDiagnosisGroups() {
        return array(
            'G Suspect' => 'dOAG',
            'OAG' => 'dOAG',
            'NTG' => 'dOAG',
            'PXF' => 'dOAG',
            'PDS' => 'dOAG',
            'PDS-G' => 'dOAG',
            'ACG' => 'dACG',
            'CNAG' => 'dACG',
            'OHT' => 'dOHT',
            'Normal' => 'dNorm',
            'Cataract' => 'dCAT',
            'AMD: wet' => 'dAMD',
            'AMD: dry' => 'dAMD'
        );
    }
    
    /**
     * Gets the list of glaucoma medication groups mapped to an array of groups
     * that the group is not compatible with.
     * 
     * Ideally this will all be re-factored in to the database at some point.
     * 
     * @return array of medication groups, as an associative
     * array of string(medicationGroup) => array(groups) values.
     */
    function getConflictingGroups() {
        return array(
            'dOAG' => array('dOAG', 'dOHT', 'dACG', 'dNorm'),
            'dOHT' => array('dOHT', 'dOAG', 'dACG', 'dNorm'),
            'dCAT' => array('dCAT'),
            'dAMD' => array('dAMD'),
            'dACG' => array('dOAG', 'dOHT', 'dACG', 'dNorm'),
            'dNorm' => array('dNorm', 'dOAG', 'dOHT', 'dACG', 'dCAT', 'dAMD'));
    }

}
