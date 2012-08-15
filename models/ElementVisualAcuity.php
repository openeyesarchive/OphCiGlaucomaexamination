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
 * This is the model class for table "et_ophciglaucomaexamination_va".
 *
 * The followings are the available columns in table
 * 'et_ophciglaucomaexamination_va':
 * @property string $id
 * @property string $event_id
 * @property integer $rva_ua
 * @property integer $lva_ua
 * @property integer $rva_cr
 * @property integer $lva_cr
 * @property integer $rva_method
 * @property integer $lva_method
 * @property integer $right_aid
 * @property integer $left_aid
 * @property integer $distance
 * @property integer $type
 *
 * The followings are the available model relations:
 * @property Event $event
 */
class ElementVisualAcuity extends BaseEventTypeElement {

    const SNELLEN_METRE = 0;
    const SNELLEN_FOOT = 1;
    const ETDRS = 2;
    const LOGMAR = 3;
    const DECIMAL = 4;
    
    const AID_UNAIDED = 0;
    const AID_GLASSES = 1;
    const AID_CONTACT_LENS = 2;
    
    const AID_PINHOLE = 0;
    const AID_REFRACTION = 1;

    public $visualAcuityStrings = array(
        0 => 'Not recorded',
        1 => 'NPL',
        2 => 'PL',
        3 => 'HM',
        4 => 'CF'
    );

    /**
     * Returns the static model of the specified AR class.
     * @return ElementVisualAcuity the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'et_ophciglaucomaexamination_va';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('rva_ua, lva_ua, rva_cr, lva_cr, rva_method, lva_method, right_aid, left_aid, distance, type, unit', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, event_id, rva_ua, lva_ua, rva_cr, lva_cr, rva_method, lva_method, right_aid, left_aid, distance, type, unit', 'safe', 'on' => 'search'),
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
            'rva_ua' => 'Right Initial',
            'lva_ua' => 'Left Initial',
            'rva_method' => 'Right Method',
            'lva_method' => 'Left Method',
            'rva_cr' => 'Right Corrected',
            'lva_cr' => 'Left Corrected',
            'right_aid' => 'Right Aid',
            'left_aid' => 'Left Aid',
            'distance' => 'Distance',
            'type' => 'Type',
            'unit' => 'Unit',
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
        $criteria->compare('rva_ua', $this->rva_ua);
        $criteria->compare('lva_ua', $this->lva_ua);
        $criteria->compare('rva_cr', $this->rva_cr);
        $criteria->compare('lva_cr', $this->lva_cr);
        $criteria->compare('rva_method', $this->rva_method);
        $criteria->compare('lva_method', $this->lva_method);
        $criteria->compare('right_aid', $this->right_aid);
        $criteria->compare('left_aid', $this->left_aid);
        $criteria->compare('distance', $this->distance);
        $criteria->compare('type', $this->type);
        $criteria->compare('unit', $this->unit);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

    /**
     * Sets the type to the default, 1 ('Distance').
     *
     * @return boolean
     */
    public function save($runValidation = true, $attributes = null, $allow_overriding = false) {
        // TODO remove this when js is working
        $this->type = 1;
        return parent::save($runValidation, $attributes, $allow_overriding);
    }

    /**
     * Returns the visual acuity recorded in the DB converted to the format provided, e.g. Snellen
     *
     * @return string
     */
    public function getVisualAcuityText($system, $field) {
        if (!in_array($field, array(
                    'rva_ua', 'lva_ua', 'rva_cr', 'lva_cr')
        )) {
            throw new Exception('Invalid measurementType in getVisualAcuity.');
        }
        if ($this->$field < 5) {
            return $this->visualAcuityStrings[$this->$field];
        }

        switch ($system) {
            case self::SNELLEN_METRE:
                return $this->toSnellenMetre($this->$field);
                break;
            case self::SNELLEN_FOOT:
                return $this->toSnellenFoot($this->$field);
                break;
            case self::ETDRS:
                return $this->toETDRS($this->$field);
                break;
            case self::LOGMAR:
                return $this->toLogMar($this->$field);
                break;
            case self::DECIMAL:
                return $this->toDecimal($this->$field);
                break;
            default:
                throw new Exception('system not defined yet in getVisualAcuity.');
                break;
        }
    }

    /**
     * Returns the text string for the Aid field
     *
     * @param string $field
     * @return string
     */
    public function getAidText($field) {
        if (!in_array($field, array(
                    'right_aid', 'left_aid')
        )) {
            throw new Exception('Invalid aid field name in getAidText.');
        }

        $aidOptions = $this->getAidOptions();

        return $aidOptions[$this->$field];
    }

    /**
     * Returns the text string for the Aid field
     *
     * @param string $field
     * @return string
     */
    public function getUnitText($field) {
        $unitOptions = $this->getUnitOptions();

        return $unitOptions[$this->$field];
    }

    /**
     * Returns the text string for the Aid field
     *
     * @param string $field
     * @return string
     */
    public function getMethodText($field) {
        $unitOptions = $this->getMethodOptions();

        return $unitOptions[$this->$field];
    }

    /**
     * Returns an array of visual acuity options to display in a select box, by system
     *
     * @param int $system
     * @return array
     */
    public function getVisualAcuityOptions($system) {
        $options = array(0 => $this->visualAcuityStrings[0]);

        switch ($system) {
            case self::SNELLEN_METRE:
                foreach (array(95, 89, 80, 74, 59, 50, 24) as $acuity) {
                    $options[$acuity] = $this->toSnellenMetre($acuity);
                }
                break;
            case self::SNELLEN_FOOT:
                foreach (array(200, 250, 300, 350, 400, 500, 600, 700, 800, 1000, 2000) as $acuity) {
                    $options[$acuity] = $this->toSnellenFoot($acuity);
                }
                break;
            case self::ETDRS:
                $options = array();
                break;
            default:
                throw new Exception('system not defined yet.');
                break;
        }

        for ($i = 4; $i >= 1; $i--) {
            $options[$i] = $this->visualAcuityStrings[$i];
        }

        return $options;
    }

    /**
     * Returns an array of all the Aid options
     *
     * @return array
     */
    public function getAidOptions() {
        return array(
            self::AID_UNAIDED => 'Unaided',
            self::AID_GLASSES => 'Glasses',
            self::AID_CONTACT_LENS => 'Contact Lens',
        );
    }

    /**
     * Returns an array of all the unit options
     *
     * @return array
     */
    public function getUnitOptions() {

        return array(
            self::SNELLEN_METRE => 'Snellen Metre',
            self::SNELLEN_FOOT => 'Snellen Foot',
            self::ETDRS => 'ETDRS',
            self::LOGMAR => 'logMar',
            self::DECIMAL => 'Decimal',
        );
    }

    /**
     * Returns an array of all the Method options
     *
     * @return array
     */
    public function getMethodOptions() {
        return array(
            self::AID_PINHOLE => 'Pinhole',
            self::AID_REFRACTION => 'Refraction',
        );
    }

    /**
     * Returns an array of Distance options - either in feet for SNELLEN_FOOT or
     * metres for everything else.
     *
     * @param int system
     * @return array
     */
    public function getDistanceOptions($system) {
        if ($system == self::SNELLEN_FOOT) {
            return array(
                103 => $this->toSnellenFoot(103, true),
                89 => $this->toSnellenFoot(89, true)
            );
        } else {
            return array(
                103 => $this->toSnellenMetre(103, true),
                89 => $this->toSnellenMetre(89, true)
            );
        }
    }

    /**
     * Returns the text string for the Aid field
     *
     * @param string $field
     * @return string
     */
    public function getDistanceText($system) {
        if ($system == self::SNELLEN_FOOT) {
            return $this->toSnellenFoot($this->distance, true);
        } else {
            return $this->toSnellenMetre($this->distance, true);
        }
    }

    /**
     * Converts a db field (e.g. rva_ph) to Snellen metres
     *
     * @param int $value
     * @param boolean $distanceOnly
     * @return string
     */
    public function toSnellenMetre($value, $distanceOnly = false) {
        $metres = round(6 / $this->toDecimal($value));

        if ($distanceOnly) {
            return $metres;
        }

        if ($metres == 120) {
            return '3/60';
        } else {
            return '6/' . $metres;
        }
    }

    /**
     * Converts a db field (e.g. rva_ph) to Snellen feet
     *
     * @param int $value
     * @param boolean $distanceOnly
     * @return string
     */
    public function toSnellenFoot($value, $distanceOnly = false) {
        $feet = $value;

        if ($distanceOnly) {
            return $feet;
        }

        return '20/' . $feet;
    }

    /**
     * Converts a db field (e.g. rva_ph) to EDTRS
     *
     * @param int $value
     * @return string
     */
    public function toETDRS($value) {
//        return -log10($this->toDecimal($value / 10));
        return $value / 10;
    }

    /**
     * Converts a db field (e.g. rva_ph) to LOGMAR
     *
     * @param int $value
     * @return string
     */
    public function toLogMar($value) {
        return $value / 100;
    }

    public function toDecimal($_value) {
        // ***BUG*** function seems to fail in php for windows, but only the first time!
//        $x = exp((1.7 - 0.02 * ($_value - 4)) * log(10));
//        return (1 / exp((1.7 - 0.02 * ($_value - 4)) * log(10)));
        return $_value / 100;
    }

}
