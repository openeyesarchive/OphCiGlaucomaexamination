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
 * @copyright Copyright (c) 2012, University of Cardiff
 * @copyright Copyright (c) 2011 - 2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
class ElementMedicationsTest extends CDbTestCase {

    public $element;
    public $fixtures = array(
        'elements' => 'ElementMedications',
    );

    const EVENT_ID = 3;
    const COMMENTS = 'This is a test.';


//	public $user;
//	public $firm;
//	public $patient;
//	public $element;
//
//	public $fixtures = array(
//		'users' => 'User',
//		'firms' => 'Firm',
//		'patients' => 'Patient',
//		'episodes' => 'Episode',
//		'eventTypes' => 'EventType',
//		'events' => 'Event',
//		'elements' => 'ElementIntraocularPressure'
//	);

    public function setUp() {
        parent::setUp();
//		$this->user = $this->users('user1');
//		$this->firm = $this->firms('firm1');
//		$this->patient = $this->patients('patient1');
        $this->element = new ElementMedications();
//		$this->element->setBaseOptions($this->firm->id, $this->patient->id, $this->user->id);
    }

    /**
     * 
     * @return type
     */
    public function dataProvider_Search() {
        return array(
            array(array('comments' => ElementMedicationsTest::COMMENTS),
                1, array('elementMedications1')),
        );
    }
    /**
     * 
     */
    public function testBasicCreate() {
        $element = $this->element;

        $element->setAttributes(array(
            'event_id' => ElementMedicationsTest::EVENT_ID,
            'comments' => ElementMedicationsTest::COMMENTS,
        ));

        $this->assertTrue($element->save(true));
    }

    /**
     * 
     */
    public function testAttributeLabels() {
        $expected = array(
            'comments' => 'Medications',
        );
        
        $this->assertEquals($expected, $this->element->attributeLabels());
    }

    /**
     * Test that we can load a model and construct it.
     * 
     */
    public function testModel() {

        Yii::import('application.modules.OphCiGlaucomaexamination.models.ElementMedications');

        $this->assertEquals('ElementMedications', get_class(ElementMedications::model()));
    }

    /**
     * 
     */
    public function testFindByPk() {
        $element = ElementMedications::model()->findByPk(1);
        $this->assertEquals(ElementMedicationsTest::COMMENTS, $element->comments);
        $this->assertEquals(ElementMedicationsTest::EVENT_ID, $element->event_id);
    }

    /**
     * 
     */
    public function testUpdate() {
        $element = $this->elements('elementMedications1');
        $newComments = "";
        $newComments .= ElementMedicationsTest::COMMENTS +1;
        $element->comments = $newComments;
        $element->event_id = ElementMedicationsTest::EVENT_ID + 1;

        $this->assertTrue($element->save(true));
        $this->assertEquals($newComments, $element->comments);
        $this->assertEquals(ElementMedicationsTest::EVENT_ID + 1, $element->event_id);
    }

}