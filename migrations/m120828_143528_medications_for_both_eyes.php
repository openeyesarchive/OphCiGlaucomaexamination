<?php

require_once 'DbHelper.php';

class m120828_143528_medications_for_both_eyes extends DbHelper {

    public function safeUp() {
        $this->renameColumn($this->getTableName('presc_meds'), 'medication_1', 'medication_1_left');
        $this->renameColumn($this->getTableName('presc_meds'), 'medication_2', 'medication_2_left');
        $this->renameColumn($this->getTableName('presc_meds'), 'medication_3', 'medication_3_left');
        $this->addColumn($this->getTableName('presc_meds'), 'medication_1_right', 'integer(2) default NULL');
        $this->addColumn($this->getTableName('presc_meds'), 'medication_2_right', 'integer(2) default NULL');
        $this->addColumn($this->getTableName('presc_meds'), 'medication_3_right', 'integer(2) default NULL');
    }

    public function safeDown() {
        $this->renameColumn($this->getTableName('presc_meds'), 'medication_1_left', 'medication_1');
        $this->renameColumn($this->getTableName('presc_meds'), 'medication_2_left', 'medication_2');
        $this->renameColumn($this->getTableName('presc_meds'), 'medication_3_left', 'medication_3');
        $this->dropColumn($this->getTableName('presc_meds'), 'medication_1_right');
        $this->dropColumn($this->getTableName('presc_meds'), 'medication_2_right');
        $this->dropColumn($this->getTableName('presc_meds'), 'medication_3_right');
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
