<?php

require_once 'DbHelper.php';

class m120828_131124_central_conrneal_thickness extends DbHelper {

    public function up() {
        $this->addColumn($this->getTableName('ant_seg'), 'cct_left', 'int(10) default 400');
        $this->addColumn($this->getTableName('ant_seg'), 'cct_right', 'int (10) default 400');
    }

    public function down() {
        $this->dropColumn($this->getTableName('ant_seg'), 'cct_left');
        $this->dropColumn($this->getTableName('ant_seg'), 'cct_right');
        return true;
    }

}
