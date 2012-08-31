<?php

require_once 'DbHelper.php';

class m120829_084906_diagnoses_for_both_eyes extends DbHelper {

    public function safeUp() {
        $this->renameColumn($this->getTableName('diagnosis'), 'diagnosis_left', 'diagnosis_1_left');
        $this->renameColumn($this->getTableName('diagnosis'), 'diagnosis_right', 'diagnosis_1_right');
        $this->addColumn($this->getTableName('diagnosis'), 'diagnosis_2_left', 'integer(10) default NULL');
        $this->addColumn($this->getTableName('diagnosis'), 'diagnosis_3_left', 'integer(10) default NULL');
        $this->addColumn($this->getTableName('diagnosis'), 'diagnosis_2_right', 'integer(10) default NULL');
        $this->addColumn($this->getTableName('diagnosis'), 'diagnosis_3_right', 'integer(10) default NULL');
    }

    public function safeDown() {
        $this->renameColumn($this->getTableName('diagnosis'), 'diagnosis_1_left', 'diagnosis_left');
        $this->renameColumn($this->getTableName('diagnosis'), 'diagnosis_1_right', 'diagnosis_right');
        $this->dropColumn($this->getTableName('diagnosis'), 'diagnosis_2_left');
        $this->dropColumn($this->getTableName('diagnosis'), 'diagnosis_3_left');
        $this->dropColumn($this->getTableName('diagnosis'), 'diagnosis_2_right');
        $this->dropColumn($this->getTableName('diagnosis'), 'diagnosis_3_right');
        return true;
    }

    /*
      // Use safeUp/safeDown to do migration with transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}