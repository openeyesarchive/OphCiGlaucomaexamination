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

/**
 * The followings are the available columns in table '':
 * @property string $id
 * @property integer $event_id 
 *
 * The followings are the available model relations:
 * @property Event $event
 */
class ElementFollowUp extends BaseEventTypeElement {
	/** Follow up constant value for a follow up within a week. */
	const OPTION_1_52 = 1;
	/** Follow up constant value for a follow up within two weeks. */
	const OPTION_2_52 = 2;
	/** Follow up constant value for a follow up within three weeks. */
	const OPTION_3_52 = 3;
	/** Follow up constant value for a follow up within a calendar month. */
	const OPTION_1_12 = 4;
	/** Follow up constant value for a follow up within two months. */
	const OPTION_2_12 = 8;
	/** Follow up constant value for a follow up within three months. */
	const OPTION_3_12 = 12;
	/** Follow up constant value for a follow up within four months. */
	const OPTION_4_12 = 16;
	/** Follow up constant value for a follow up within 6 months. */
	const OPTION_6_12 = 24;
	/** Follow up constant value for a follow up within nine months. */
	const OPTION_12_12 = 52;

	/** Relates how many visits there have been for a follow up,
	 *	FOR THIS PATIENT. The first time a patient undergoes an
	 *	examination, this value is 1; so the number dictates the number of
	 *	visits, INCLUDING the first.
	 * 
	 * @var int visit a non-negative integer.
	 */
	public $visit = 0;
	
	/**
	 * Set the visit value, used to determine which visit this is (that is,
	 * if this is a follow up or an initial exam).
	 * 
	 * @return boolean true, always.
	 */
	protected function beforeSave() {
		parent::beforeSave();

		$exam_criteria = new CDbCriteria;
		$patient = $this->event->episode->patient;
		$exam_criteria->compare('hos_num_id', $patient->hos_num);
		$examinations = ElementFollowUp::model()->findAll($exam_criteria);
		// if there are no entries in the table, this is the first visit:
		$this->visit = count($examinations) + 1;
		// set the hos num ID:
		$this->hos_num_id = $this->event->episode->patient->hos_num;
		return true;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return ElementOperation the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'et_ophciglaucomaexamination_fup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		return array(
			array('event_id, location', 'safe'),
			array('follow_up', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id', 'on' => "element_type.class_name='" . get_class($this) . "'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'follow_up' => 'Follow Up',
		);
	}

	/**
	 * Get the time periods for a folow up.
	 * 
	 * @return an array of strings dictating, in increasing order, the different
	 * follow up dates for the follow up list.
	 */
	public static function getFollow_up_list() {
		return array(
			self::OPTION_1_52 => '1/52',
			self::OPTION_2_52 => '2/52',
			self::OPTION_3_52 => '3/52',
			self::OPTION_1_12 => '1/12',
			self::OPTION_2_12 => '2/12',
			self::OPTION_3_12 => '3/12',
			self::OPTION_4_12 => '4/12',
			self::OPTION_6_12 => '6/12',
			self::OPTION_12_12 => '12/12',
		);
	}

	/**
	 * Gets the site list for populating the location for the next follow up.
	 * 
	 * @return an array of site locations.
	 */
	public function getLocations() {
		$criteria = new CDbCriteria;
		return array_merge(Site::model()->getList());
	}

	/**
	 * Determines if this is a follow up exam or an initial (first-time) visit.
	 * 
	 * @return boolan true if the patient has had an examination previously;
	 * false otherwise.
	 */
	public function isFollowUp($patient_id) {
		$followUp = false;
		$pas_key = Yii::app()->db->createCommand()
			->select('pas_key')
			->from(Patient::model()->tableName())
			->where('id=:id and deleted=:notdeleted', array(
				':id' => $patient_id,
				':notdeleted' => 0,
			))
			->queryRow();
		$abc = $pas_key['pas_key'];
		if ($pas_key && count($pas_key) == 1) {
			$results = Yii::app()->db->createCommand()
				->select('visit')
				->from($this->tableName())
				->where('hos_num_id=:hos_num_id and deleted=:notdeleted', array(
					':hos_num_id' => $pas_key['pas_key'],
					':notdeleted' => 0,
				))
				->queryRow();
			if ($results) {
				$followUp = true;
			}
		}
		return $followUp;
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

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}
}
