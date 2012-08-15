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
 * This is the model class for table "element_intraocular_pressure".
 *
 * The followings are the available columns in table 'element_intraocular_pressure':
 * @property string $id
 * @property string $event_id
 * @property integer $right_iop
 * @property integer $left_iop
 */
class ElementPrescribedMedication extends BaseEventTypeElement {
    
    const ALPHAGEN = 1;
    const AZOPT = 2;
    const BETOPTIC = 3;
    const COMBIGAN = 4;
    const COSOPT = 5;
    const DIAMOX = 6;
    const DIAMOX_SR = 7;
    const GANFORTE = 8;
    const IOPIDINE = 9;
    const LUMIGAN = 10;
    const PGA_AZAGRA = 11;
    const PILOCARPINE = 12;
    const TEOPTIC = 13;
    const TIMOLOL = 14;
    const TRAVATAN = 15;
    const TRUSOPT = 16;
    const XALATAN = 17;
    const XALCOM = 18;
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
            array('medication_1, medication_2, medication_3, event_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, event_id, medication_1, medication_2, medication_3', 'safe', 'on' => 'search'),
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
            'medication_1' => 'Medication 1',
            'medication_2' => 'Medication 2',
            'medication_3' => 'Medication 3',
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
        $criteria->compare('medication_1', $this->medication_1);
        $criteria->compare('medication_2', $this->medication_2);
        $criteria->compare('medication_3', $this->medication_3);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }
    
    /**
     * 
     * @return type
     */
    public function getMedicationGroups() {
        // index -> array(name, array(medications), array(selectRemovalGroups))
        return array(0 => array('PGA', 
            array(ElementPrescribedMedication::XALATAN => 'Xalatan', 
               ElementPrescribedMedication::LUMIGAN => 'Lumigan', 
               ElementPrescribedMedication::TRAVATAN => 'Travatan'), 
                                       array('PGA', 'cPGA')),
            1 => array('BB', array(
                ElementPrescribedMedication::TIMOLOL => 'Timolol', 
                ElementPrescribedMedication::TEOPTIC => 'Teoptic', 
                ElementPrescribedMedication::BETOPTIC => 'Betopic'), 
                                       array('BB', 'cPGA', 'cCAI', 'cAA')),
            2 => array('CAI', array(
                ElementPrescribedMedication::TRUSOPT => 'Trusopt', 
                ElementPrescribedMedication::AZOPT => 'Azopt'), 
                                       array('CAI', 'cCAI', 'tCAI')),
            3 => array('Pilo', array(
                ElementPrescribedMedication::PILOCARPINE => 'Pilocarpine'), 
                                       array('Pilo')),
            4 => array('AA', array(
                ElementPrescribedMedication::ALPHAGEN => 'Alphagen', 
                ElementPrescribedMedication::IOPIDINE => 'Iopidine'), 
                                       array('AA', 'cAA')),
            5 => array('cPGA', array(
                ElementPrescribedMedication::GANFORTE => 'Ganforte', 
                ElementPrescribedMedication::XALCOM => 'Xalcom'), 
                                       array('PGA', 'cPGA', 'BB')),
            6 => array('cCAI', array(
                ElementPrescribedMedication::COSOPT => 'Cosopt', 
                ElementPrescribedMedication::PGA_AZAGRA => 'PGAAzagra'), 
                                       array('CAI', 'cCAI', 'BB')),
            7 => array('cAA', array(
                ElementPrescribedMedication::COMBIGAN => 'Combigan'), 
                                       array('cAA', 'AA', 'BB')),
            8 => array('tCAI', array(
                ElementPrescribedMedication::DIAMOX => 'Diamox', 
                ElementPrescribedMedication::DIAMOX_SR => 'Diamox SR'), 
                                       array('CAI', 'tCAI')),
            );
    }
    
    public function getMedication($index) {
        $medication = null;
        switch($index) {
            case ElementPrescribedMedication::ALPHAGEN:
                $medication = 'Alphagen';
                break;
            case ElementPrescribedMedication::AZOPT:
                $medication = 'Azopt';
                break;
            case ElementPrescribedMedication::BETOPTIC:
                $medication = 'Betoptic';
                break;
            case ElementPrescribedMedication::COMBIGAN:
                $medication = 'Combigan';
                break;
            case ElementPrescribedMedication::COSOPT:
                $medication = 'Cosopt';
                break;
            case ElementPrescribedMedication::DIAMOX:
                $medication = 'Diamox';
                break;
            case ElementPrescribedMedication::DIAMOX_SR:
                $medication = 'Diamox SR';
                break;
            case ElementPrescribedMedication::GANFORTE:
                $medication = 'Ganforte';
                break;
            case ElementPrescribedMedication::IOPIDINE:
                $medication = 'Iopidine';
                break;
            case ElementPrescribedMedication::LUMIGAN:
                $medication = 'Lumigan';
                break;
            case ElementPrescribedMedication::PGA_AZAGRA:
                $medication = 'PGA Azagra';
                break;
            case ElementPrescribedMedication::PILOCARPINE:
                $medication = 'Pilocarpine';
                break;
            case ElementPrescribedMedication::TEOPTIC:
                $medication = 'Teoptic';
                break;
            case ElementPrescribedMedication::TIMOLOL:
                $medication = 'Timolol';
                break;
            case ElementPrescribedMedication::TRAVATAN:
                $medication = 'Travatan';
                break;
            case ElementPrescribedMedication::TRUSOPT:
                $medication = 'Trusopt';
                break;
            case ElementPrescribedMedication::XALATAN:
                $medication = 'Xalatan';
                break;
            case ElementPrescribedMedication::XALCOM:
                $medication = 'Xalcom';
                break;
        }
        return $medication;
    }

}
