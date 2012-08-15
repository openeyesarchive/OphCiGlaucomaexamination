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
 * The followings are the available columns in table '':
 * @property string $id
 * @property integer $event_id
 *
 * The followings are the available model relations:
 * @property Event $event
 */
class ElementRisks extends BaseEventTypeElement {

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
    return 'et_ophciglaucomaexamination_risks';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
        array('event_id, myopia, migraine, cva, blood_loss, raynauds,
          foh, hyperopia, cardiac_surgery, angina, asthma, sob, hypotension',
            'safe'),
//        array('iopLeft, iopRight, ncat, gat', 'required'),
// The following rule is used by search().
// Please remove those attributes that should not be searched.
//        array('id, event_id, anaesthetist_id, comments', 'safe', 'on' => 'search'),
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
        'anaesthetist' => array(self::BELONGS_TO, 'User', 'anaesthetist_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {

    return array(
        'myopia' => 'Myopia',
        'migraine' => 'Migraine',
        'cva' => 'CVA',
        'blood_loss' => 'Blood Loss',
        'raynauds' => 'Raynaud\'s',
        'foh' => 'FOH',
        'hyperopia' => 'Hyperopia',
        'cardiac_surgery' => 'Cardiac Surgery',
        'angina' => 'Angina',
        'asthma' => 'Asthma',
        'sob' => 'SOB',
        'hypotension' => 'Hypotension',
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

    return new CActiveDataProvider(get_class($this), array(
                'criteria' => $criteria,
            ));
  }

}
