<?php

require_once 'DbHelper.php';

class m120517_185151_initial_migration_for_ophciglaucomaexamination
    extends DBHelper {

    /**
     * Creates eye draw tables.
     */
    private function createEyeDrawTables() {
        $this->createAnteriorSegmentTable();
        $this->createPosteriorSegmentTable();
        $this->createGonioscopyTable();
        $this->createOpticDiskTable();
    }

    /**
     * Creates the EyeDraw anterior segment table.
     */
    private function createAnteriorSegmentTable() {
        $suffix = 'ant_seg';
        $tableName = $this->getTableName($suffix);
        $this->createTable($tableName, array_merge(array(
                    'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
                    'event_id' => 'int(10) unsigned NOT NULL',
                    'description_left' => 'text COLLATE utf8_bin',
                    'description_right' => 'text COLLATE utf8_bin',
                    'image_string_left' => 'text COLLATE utf8_bin',
                    'image_string_right' => 'text COLLATE utf8_bin'), $this->getDefaults($suffix)
                ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin'
        );
    }

    /**
     * Creates the EyeDraw posterior segment table. 
     */
    private function createPosteriorSegmentTable() {
        $suffix = 'post_seg';
        $tableName = $this->getTableName('post_seg');

        $this->createTable($tableName, array_merge(array(
                    'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
                    'event_id' => 'int(10) unsigned NOT NULL',
                    'description_left' => 'text COLLATE utf8_bin',
                    'description_right' => 'text COLLATE utf8_bin',
                    'image_string_left' => 'text COLLATE utf8_bin',
                    'image_string_right' => 'text COLLATE utf8_bin'), $this->getDefaults($suffix)
                ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin'
        );
    }

    /**
     * Creates the EyeDraw gonioscopy table. 
     */
    private function createGonioscopyTable() {
        $suffix = 'gonioscopy';
        $tableName = $this->getTableName($suffix);

        $this->createTable($tableName, array_merge(array(
                    'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
                    'event_id' => 'int(10) unsigned NOT NULL',
                    'gonio_left' => 'int(1) unsigned not null',
                    'gonio_right' => 'int(1) unsigned not null',
                    'van_herick_left' => 'int(1) unsigned not null',
                    'van_herick_right' => 'int(1) unsigned not null',
                    'description_left' => 'text COLLATE utf8_bin',
                    'description_right' => 'text COLLATE utf8_bin',
                    'image_string_left' => 'text COLLATE utf8_bin',
                    'image_string_right' => 'text COLLATE utf8_bin'), $this->getDefaults($suffix)
                ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin'
        );
    }

    /**
     * Create the IOP table.
     */
    private function createIopTable() {
        $suffix = 'iop';
        $tableName = $this->getTableName($suffix);

        $this->createTable($tableName, array_merge(array(
                    'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
                    'event_id' => 'int(10) unsigned NOT NULL',
                    'instrument_right' => 'tinyint(2) DEFAULT NULL',
                    'instrument_left' => 'tinyint(2) DEFAULT NULL',
                    'right_iop' => 'tinyint(4) DEFAULT NULL',
                    'left_iop' => 'tinyint(4) DEFAULT NULL'), $this->getDefaults($suffix)
                ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin'
        );
    }

    /**
     * Create the IOP table.
     */
    private function createMedicationSelectionTables() {
        $suffix = 'presc_meds';
        $tableName = $this->getTableName($suffix);

        $this->createTable($tableName, array_merge(array(
                    'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
                    'event_id' => 'int(10) unsigned NOT NULL',
                    'medication_1' => 'int(2) DEFAULT NULL',
                    'medication_2' => 'int(2) DEFAULT NULL',
                    'medication_3' => 'int(2) DEFAULT NULL'), $this->getDefaults($suffix)
                ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin'
        );
    }

    /**
     * Create the visual acuity table.
     */
    private function createVisualAcuityTable() {
        $suffix = 'va';
        $tableName = $this->getTableName($suffix);
        $this->createTable($tableName, array_merge(array(
                    'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
                    'event_id' => 'int(10) unsigned NOT NULL',
                    'rva_ua' => 'int(10) DEFAULT \'0\'',
                    'lva_ua' => 'int(10) DEFAULT \'0\'',
                    'rva_cr' => 'int(10) DEFAULT \'0\'',
                    'lva_cr' => 'int(10) DEFAULT \'0\'',
                    'rva_method' => 'tinyint(4) DEFAULT \'0\'',
                    'lva_method' => 'tinyint(4) DEFAULT \'0\'',
                    'aid' => 'tinyint(1) DEFAULT \'0\'',
                    'format' => 'tinyint(1) DEFAULT \'0\'',
                    'distance' => 'int(11) DEFAULT \'0\'',
                    'type' => 'tinyint(1) DEFAULT \'0\'',
                    'unit' => 'tinyint(1) DEFAULT \'0\'',
                    'right_aid' => 'tinyint(1) unsigned DEFAULT NULL',
                    'left_aid' => 'tinyint(1) unsigned DEFAULT NULL',
                        ), $this->getDefaults($suffix)
                ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin'
        );
    }

    /**
     * Creates the EyeDraw optic disk table.
     */
    private function createOpticDiskTable() {
        $suffix = 'optic_disk';
        $tableName = $this->getTableName($suffix);

        $this->createTable($tableName, array_merge(
        array('id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
        'event_id' => 'int(10) unsigned NOT NULL',
        'description_left' => 'text COLLATE utf8_bin',
        'description_right' => 'text COLLATE utf8_bin',
        'image_string_left' => 'text COLLATE utf8_bin',
        'image_string_right' => 'text COLLATE utf8_bin',
        'size_left' => 'int(10) unsigned NOT NULL',
        'size_right' => 'int(10) unsigned NOT NULL'),
        $this->getDefaults($suffix)
        ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
    }

    /**
     * Creates the tables necessary for stereo disk image data, specifically
     * Kowa Stereoscopy cameras. However, these tables do not require that
     * such equipment is used.
     * 
     * Two tables are created:
     * 
     * - one to maintain information about each individual file as it is
     *   imported;
     * - one to maintain information about the patient, eye, diagnosis etc.
     *   related directly to the image.
     * 
     */
    private function createStereoDiskTables() {
        $suffix = 'disc_files';
        $this->createTable($this->getTableName($suffix), array_merge(array(
                    'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
                    'photo_id' => 'int(10) unsigned NOT NULL',
                    'pid' => 'varchar(20) NOT NULL',
                    'original_filename' => 'varchar(100) NOT NULL',), $this->getDefaults($suffix, false)), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

        $suffix = 'disc_info';
        $this->createTable($this->getTableName($suffix), array_merge(array(
                    'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
                    'photo_id' => 'int(10) unsigned NOT NULL',
                    'pid' => 'varchar(20)',
                    'name' => 'varchar(50)',
                    'exam_date' => 'date',
                    'exam_time' => 'time',
                    'dob' => 'varchar(20)',
                    'gender' => 'char',
                    'diagnosis1' => 'text',
                    'diagnosis2' => 'text',
                    'diagnosis3' => 'text',
                    'diagnosis4' => 'text',
                    'examiner' => 'text',
                    'eye' => 'char',
                    'comments' => 'text',), $this->getDefaults($suffix, false)), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
        /*
          create table oesb_stereo_file_data(id int not null auto_increment, primary key(id), photo_id int, pid varchar(20), original_filename varchar(100));" --password=$DB_USER_PASSWORD
          report_success $? "Created stereo text file data table 'oesb_stereo_file_data'
         */
        /*
          mysql -u oe -e "use openeyes; create table oesb_stereo_file_data(id int not null auto_increment, primary key(id), photo_id int, pid varchar(20), original_filename varchar(100));" --password=$DB_USER_PASSWORD
          report_success $? "Created stereo text file data table 'oesb_stereo_file_data'"

          mysql -u oe -e "use openeyes; create table oesb_stereo_exam_data(id int not null auto_increment, primary key(id), photo_id int, pid varchar(20), name varchar(50), exam_date date, exam_time time, unknown int, gender char, diagnosis1 text, diagnosis2 text, diagnosis3 text, diagnosis4 text, examiner text, eye char, comments text);" --password=$DB_USER_PASSWORD
          report_success $? "Created stereo image file data table 'oesb_stereo_exam_data'"
         */
    }

    /**
     * 
     */
    private function createVfaTables() {
        // TODO!
        /*
         * 

          mysql -u oe -e "use openeyes; create table oesb_vfa_file_data(id int not null auto_increment, primary key(id), pid varchar(20), birth_date date, gender char, given_name varchar(20), middle_name varchar(20), family_name varchar(20));" --password=$DB_USER_PASSWORD
          report_success $? "Created VFA XML file data table 'oesb_vfa_file_data'"
         */
    }

    /**
     * Delete all table data and then each table. 
     */
    private function deleteAllTables() {
        $this->deleteTableAndData($this->getTableName('disc_info'));
        $this->deleteTableAndData($this->getTableName('disc_files'));

        $this->deleteTableAndData($this->getTableName('fam_hist'));
        $this->deleteTableAndData($this->getTableName('med_hist'));
        $this->deleteTableAndData($this->getTableName('oc_hist'));
        $this->deleteTableAndData($this->getTableName('iop'));
        $this->deleteTableAndData($this->getTableName('risks'));
        $this->deleteTableAndData($this->getTableName('medications'));
        // visual acuity:
        $this->deleteTableAndData($this->getTableName('va'));
        // anterior segment:
        $this->deleteTableAndData($this->getTableName('as'));
        // delete 'follow up' table
        $this->deleteTableAndData($this->getTableName('fup'));
        // detete eye draw tables:
        $this->deleteTableAndData($this->getTableName('ant_seg'));
        $this->deleteTableAndData($this->getTableName('post_seg'));
        $this->deleteTableAndData($this->getTableName('gonioscopy'));
        $this->deleteTableAndData($this->getTableName('optic_disk'));
        $this->deleteTableAndData($this->getTableName('diagnosis'));
        $this->deleteTableAndData($this->getTableName('presc_meds'));
    }

    /**
     *
     * @param type $event_type 
     */
    private function deleteAllElements($event_type) {
        $this->deleteElement($event_type, 'Intraocular Pressure');
        $this->deleteElement($event_type, 'Ocular History');
        $this->deleteElement($event_type, 'Family History');
        $this->deleteElement($event_type, 'Past Medical History');
        $this->deleteElement($event_type, 'Risks');
        $this->deleteElement($event_type, 'Medications');
        $this->deleteElement($event_type, 'Visual Acuity');
        $this->deleteElement($event_type, 'Anterior Segment');
        $this->deleteElement($event_type, 'Posterior Segment');
        $this->deleteElement($event_type, 'Gonioscopy');
        $this->deleteElement($event_type, 'Optic Disk');
        $this->deleteElement($event_type, 'Follow Up Exam');
        $this->deleteElement($event_type, 'Glaucoma Diagnosis');
        $this->deleteElement($event_type, 'Prescribed Medication');
    }

    /*
     * ===========================================================================
     * ===========================================================================
     * ===========================================================================
     * ===========================================================================
     * ===========================================================================
     * ===========================================================================
     * ===========================================================================
     * ===========================================================================
     * ===========================================================================
     * ===========================================================================
     * ===========================================================================
     * ===========================================================================
     * ===========================================================================
     * ===========================================================================
     * ===========================================================================
     * ===========================================================================
     */

    private function createElements($event_type) {
        $order = 1;
        $this->insert('element_type', array(
            'name' => 'Ocular History',
            'class_name' => 'ElementOcularHistory',
            'event_type_id' => $event_type['id'],
            'display_order' => ++$order,
            'default' => 1,
        ));

        $this->insert('element_type', array(
            'name' => 'Past Medical History',
            'class_name' => 'ElementPastMedicalHistory',
            'event_type_id' => $event_type['id'],
            'display_order' => ++$order,
            'default' => 1,
        ));
        $this->insert('element_type', array(
            'name' => 'Family History',
            'class_name' => 'ElementFamilyHistory',
            'event_type_id' => $event_type['id'],
            'display_order' => ++$order,
            'default' => 1,
        ));
        $this->insert('element_type', array(
            'name' => 'Medications',
            'class_name' => 'ElementMedications',
            'event_type_id' => $event_type['id'],
            'display_order' => ++$order,
            'default' => 1,
        ));
        $this->insert('element_type', array(
            'name' => 'Risks',
            'class_name' => 'ElementRisks',
            'event_type_id' => $event_type['id'],
            'display_order' => ++$order,
            'default' => 1,
        ));
        $this->insert('element_type', array(
            'name' => 'Visual Acuity',
            'class_name' => 'ElementVisualAcuity',
            'event_type_id' => $event_type['id'],
            'display_order' => ++$order,
            'default' => 1,
        ));
        $this->insert('element_type', array(
            'name' => 'Anterior Segment',
            'class_name' => 'ElementAnteriorSegment',
            'event_type_id' => $event_type['id'],
            'display_order' => ++$order,
            'default' => 1,
        ));
        $this->insert('element_type', array(
            'name' => 'Gonioscopy',
            'class_name' => 'ElementGonioscopy',
            'event_type_id' => $event_type['id'],
            'display_order' => ++$order,
            'default' => 1,
        ));
        $this->insert('element_type', array(
            'name' => 'Intraocular Pressure',
            'class_name' => 'ElementIntraocularPressure',
            'event_type_id' => $event_type['id'],
            'display_order' => ++$order,
            'default' => 1,
        ));
        $this->insert('element_type', array(
            'name' => 'Optic Disk',
            'class_name' => 'ElementOpticDisk',
            'event_type_id' => $event_type['id'],
            'display_order' => ++$order,
            'default' => 1,
        ));
        $this->insert('element_type', array(
            'name' => 'Posterior Segment',
            'class_name' => 'ElementPosteriorSegment',
            'event_type_id' => $event_type['id'],
            'display_order' => ++$order,
            'default' => 1,
        ));
        $this->insert('element_type', array(
            'name' => 'Glaucoma Diagnosis',
            'class_name' => 'ElementGlaucomaDiagnosis',
            'event_type_id' => $event_type['id'],
            'display_order' => ++$order,
            'default' => 1,
        ));
        $this->insert('element_type', array(
            'name' => 'Prescribed Medication',
            'class_name' => 'ElementPrescribedMedication',
            'event_type_id' => $event_type['id'],
            'display_order' => ++$order,
            'default' => 1,
        ));
        $this->insert('element_type', array(
            'name' => 'Follow Up Exam',
            'class_name' => 'ElementFollowUp',
            'event_type_id' => $event_type['id'],
            'display_order' => ++$order,
            'default' => 1,
        ));
    }

    /**
     * These are tables that were not imported from MEHs migration and
     * represent our own work.
     * 
     * @param type $event_type 
     */
    private function createTables($event_type) {
        /* Create stereo & VFA related tables: */
        $this->createStereoDiskTables();
        $this->createVfaTables();
        /* Create eye draw tabkles: */
        $this->createEyeDrawTables();

        $this->createIopTable();
        $this->createMedicationSelectionTables();


        // Create a table to store the ElementDetails element
        $this->createTable($this->getTableName('diagnosis'), array_merge(array(
                    'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
                    'event_id' => 'int(10) unsigned NOT NULL',
                    'diagnosis_left' => 'int(10)',
                    'diagnosis_right' => 'int(10)',
                        ), $this->getDefaults('diagnosis')), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

        // Create a table to store the ElementDetails element
        $this->createTable($this->getTableName('oc_hist'), array_merge(array(
                    'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
                    'event_id' => 'int(10) unsigned NOT NULL',
                    'comments' => 'varchar(255)',
                        ), $this->getDefaults('oc_hist')), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

        // Create a table to store the ElementDetails element
        $this->createTable($this->getTableName('med_hist'), array_merge(array(
                    'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
                    'event_id' => 'int(10) unsigned NOT NULL',
                    'comments' => 'varchar(255)',
                        ), $this->getDefaults('med_hist')), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

        // Create a table to store the ElementDetails element
        $this->createTable($this->getTableName('fam_hist'), array_merge(array(
                    'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
                    'event_id' => 'int(10) unsigned NOT NULL',
                    'comments' => 'varchar(255)',
                        ), $this->getDefaults('fam_hist')), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

        // Create a table to store the ElementDetails element
        $this->createTable($this->getTableName('risks'), array_merge(array(
                    'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
                    'event_id' => 'int(10) unsigned NOT NULL',
                    'myopia' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
                    'migraine' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
                    'cva' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
                    'blood_loss' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
                    'raynauds' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
                    'foh' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
                    'hyperopia' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
                    'cardiac_surgery' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
                    'angina' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
                    'asthma' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
                    'sob' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
                    'hypotension' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
                        ), $this->getDefaults('risks')), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

        $this->createTable($this->getTableName('medications'), array_merge(array(
                    'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
                    'event_id' => 'int(10) unsigned NOT NULL',
                    'comments' => 'varchar(255)',
                        ), $this->getDefaults('medications')), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

        $this->createVisualAcuityTable();

        $this->createTable($this->getTableName('as'), array_merge(array(
                    'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
                    'event_id' => 'int(10) unsigned NOT NULL',
                    'left' => 'varchar(255)',
                    'right' => 'varchar(255)',
                        ), $this->getDefaults('as')), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

        // Create a table to store the ElementDetails element
        $this->createTable($this->getTableName('fup'), array_merge(array(
                    'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
                    'hos_num_id' => 'int(10) unsigned NOT NULL',
                    'event_id' => 'int(10) unsigned NOT NULL',
                    'follow_up' => 'int(10) unsigned NOT NULL',
                    'visit' => 'int(10) unsigned DEFAULT 0',
                    'location' => 'varchar(255)',
                        ), $this->getDefaults('fup')), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
    }

    /**
     * Create all tables. Insert necessary data. 
     */
    public function safeUp() {
        $group = $this->dbConnection->createCommand()
                ->select('id')
                ->from('event_group')
                ->where('name=:name', array(':name' => 'Clinical events'))
                ->queryRow();
        $this->insert('event_type', array(
            'name' => 'Glaucoma examination',
            'event_group_id' => $group['id'],
            'class_name' => 'OphCiGlaucomaexamination'
        ));
        // Get the newly created event type
        $event_type = $this->dbConnection->createCommand()
                ->select('id')
                ->from('event_type')
                ->where('name=:name', array(':name' => 'Glaucoma examination'))
                ->queryRow();

        $this->createElements($event_type);

        $this->createTables($event_type);
    }

    /**
     * Deletes all data and drops all tables. 
     */
    public function safeDown() {
        // Find the event type
        $event_type = $this->dbConnection->createCommand()
                ->select('id')
                ->from('event_type')
                ->where('name=:name', array(':name' => 'Glaucoma examination'))
                ->queryRow();

        $this->deleteAllTables();

        $this->deleteAllElements($event_type);
        $this->delete('event', 'event_type_id=' . $event_type['id']);
        $this->delete('event_type', 'id=' . $event_type['id']);
    }

}
