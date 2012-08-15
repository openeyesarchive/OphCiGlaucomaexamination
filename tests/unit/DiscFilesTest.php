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
class DiscFilesTest extends CDbTestCase {

    public $element;
    public $fixtures = array(
        'elements' => 'DiscFiles',
    );

    const PHOTO_ID = 1;
    const PID = 'X123456';
    const ORIGINAL_FILENAME = 'IDX123456-1.jpg';


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
        $this->element = new DiscFiles();
//		$this->element->setBaseOptions($this->firm->id, $this->patient->id, $this->user->id);
    }

    /**
     * 
     * @return type
     */
    public function dataProvider_Search() {
        return array(
            array(array('pid' => DiscFilesTest::PID),
                1, array('elementDiscFiles1')),
        );
    }
    /**
     * 
     */
    public function testBasicCreate() {
        $element = $this->element;

        $element->setAttributes(array(
            'photo_id' => DiscFilesTest::PHOTO_ID,
            'pid' => DiscFilesTest::PID,
            'original_filename' => DiscFilesTest::ORIGINAL_FILENAME,
        ));

        $this->assertTrue($element->save(true));
    }

    /**
     * 
     */
    public function testAttributeLabels() {
//        $expected = array(
//            'comments' => 'Medications',
//        );
//        
//        $this->assertEquals($expected, $this->element->attributeLabels());
    }

    /**
     * Test that we can load a model and construct it.
     * 
     */
    public function testModel() {

        Yii::import('application.modules.OphCiGlaucomaexamination.models.DiscFiles');

        $this->assertEquals('DiscFiles', get_class(DiscFiles::model()));
    }

    /**
     * 
     */
    public function testFindByPk() {
        $element = DiscFiles::model()->findByPk(1);
        $this->assertEquals(DiscFilesTest::PID, $element->pid);
        $this->assertEquals(DiscFilesTest::PHOTO_ID, $element->photo_id);
        $this->assertEquals(DiscFilesTest::ORIGINAL_FILENAME, $element->original_filename);
    }

    /**
     * 
     */
    public function testUpdate() {
        $element = $this->elements('discFiles1');
        $newPID = "";
        $newPID .= DiscFilesTest::PID . '1';
        $element->pid = $newPID;
        $element->photo_id = DiscFilesTest::PHOTO_ID + 1;
        $element->original_filename = 'Xyz' . DiscFilesTest::PHOTO_ID;

        $this->assertTrue($element->save(true));
        $this->assertEquals($newPID, $element->pid);
        $this->assertEquals(DiscFilesTest::PHOTO_ID + 1, $element->photo_id);
        $this->assertEquals('Xyz' . DiscFilesTest::PHOTO_ID, $element->original_filename);
    }

}