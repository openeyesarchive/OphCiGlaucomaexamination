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
 * Models the relationship between medications, groups, and groups that are not
 * compatible with each other.
 * 
 * Although it suits a lot of elements to store data in the class itself,
 * there is potential in moving all of this data to the database such that
 * a generic set of medication rules can be built up and reused by other
 * areas of clinicial use.
 * 
 * @property string $id
 * @property string $event_id
 */
class ElementPrescribedMedication extends BaseEventTypeElement {

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
        return 'et_ophciglaucomaexamination_presc_meds';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('medication_1_left, medication_2_left, medication_3_left, medication_1_right, medication_2_right, medication_3_right, event_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, event_id, medication_1_left, medication_2_left, medication_3_left, medication_1_right, medication_2_right, medication_3_right', 'safe', 'on' => 'search'),
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
            'medication_1_left' => 'Medication 1',
            'medication_2_left' => 'Medication 2',
            'medication_3_left' => 'Medication 3',
            'medication_1_right' => 'Medication 1',
            'medication_2_right' => 'Medication 2',
            'medication_3_right' => 'Medication 3',
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
        $criteria->compare('medication_1_left', $this->medication_1_left);
        $criteria->compare('medication_2_left', $this->medication_2_left);
        $criteria->compare('medication_3_left', $this->medication_3_left);
        $criteria->compare('medication_1_right', $this->medication_1_right);
        $criteria->compare('medication_2_right', $this->medication_2_right);
        $criteria->compare('medication_3_right', $this->medication_3_right);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
    /**
     * Gets the list of glaucoma medications.
     * 
     * Note that this is a refactor of a previous incarnation, in a move
     * to move all values to the database.
     * 
     * @return array of medications, indexed alphabetically as an associative
     * array of int(index) => string(medication) values.
     */
    function getMedications() {
        return array(
            1 => 'Xalatan',
            2 => 'Lumigan',
            3 => 'Travatan',
            4 => 'Teoptic',
            5 => 'Timolol',
            6 => 'Betopic',
            7 => 'Trusopt',
            8 => 'Azopt',
            9 => 'Pilocarpine',
            10 => 'Alphagen',
            11 => 'Iopidine',
            12 => 'Ganforte',
            13 => 'Xalcom',
            14 => 'Cosopt',
            15 => 'PGA Azagra',
            16 => 'Combigan',
            17 => 'Diamox',
            18 => 'Diamox SR',
        );
    }
    
    /**
     * Gets the list of glaucoma medications mapped to medication groups.
     * 
     * Note that this is a refactor of a previous incarnation, in a move
     * to move all values to the database.
     * 
     * @return array of medications and groups, indexed alphabetically as
     * an associative array of string(medication) => string(medicationGroup)
     * values.
     */
    function getMedicationGroups() {
        return array(
            'Alphagen' => 'AA',
            'Azopt' => 'CAI',
            'Betopic' => 'BB',
            'Combigan' => 'cAA',
            'Cosopt' => 'cCAI',
            'Diamox' => 'tCAI',
            'Diamox SR' => 'tCAI',
            'Ganforte' => 'cPGA',
            'Iopidine' => 'AA',
            'Lumigan' => 'PGA',
            'PGA Azagra' => 'cCAI',
            'Pilocarpine' => 'Pilo',
            'Teoptic' => 'BB',
            'Timolol' => 'BB',
            'Travatan' => 'PGA',
            'Trusopt' => 'CAI',
            'Xalatan' => 'PGA',
            'Xalcom' => 'cPGA',
        );
    }
    
    /**
     * Gets the list of glaucoma medication groups mapped to an array of groups
     * that the group is not compatible with.
     * 
     * Note that this is a refactor of a previous incarnation, in a move
     * to move all values to the database.
     * 
     * @return array of medication groups, as an associative
     * array of string(medicationGroup) => array(groups) values.
     */
    function getConflictingGroups() {
        return array(
            'PGA' => array('PGA', 'cPGA'),
            'BB' => array('BB', 'cPGA', 'cCAI', 'cAA'),
            'CAI' => array('CAI', 'cCAI', 'tCAI'),
            'Pilo' => array('Pilo'),
            'AA' => array('AA', 'cAA'),
            'cPGA' => array('cPGA', 'PGA', 'BB'),
            'cCAI' => array('cCAI', '', 'CAI', 'BB'),
            'cAA' => array('cAA', 'AA', 'BB'),
            'tCAI' => array('tCAI', 'CAI'));
    }

}
