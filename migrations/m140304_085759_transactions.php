<?php

class m140304_085759_transactions extends CDbMigration
{
	public $tables = array('et_ophciglaucomaexamination_ant_seg','et_ophciglaucomaexamination_as','et_ophciglaucomaexamination_diagnosis','et_ophciglaucomaexamination_disc_files','et_ophciglaucomaexamination_disc_info','et_ophciglaucomaexamination_fam_hist','et_ophciglaucomaexamination_fup','et_ophciglaucomaexamination_gonioscopy','et_ophciglaucomaexamination_iop','et_ophciglaucomaexamination_med_hist','et_ophciglaucomaexamination_medications','et_ophciglaucomaexamination_oc_hist','et_ophciglaucomaexamination_optic_disk','et_ophciglaucomaexamination_post_seg','et_ophciglaucomaexamination_presc_meds','et_ophciglaucomaexamination_risks','et_ophciglaucomaexamination_va');

	public function up()
	{
		foreach ($this->tables as $table) {
			$this->addColumn($table,'hash','varchar(40) not null');
			$this->addColumn($table,'transaction_id','int(10) unsigned null');
			$this->createIndex($table.'_tid',$table,'transaction_id');
			$this->addForeignKey($table.'_tid',$table,'transaction_id','transaction','id');

			$this->addColumn($table.'_version','hash','varchar(40) not null');
			$this->addColumn($table.'_version','transaction_id','int(10) unsigned null');
			$this->addColumn($table.'_version','deleted_transaction_id','int(10) unsigned null');
			$this->createIndex($table.'_vtid',$table.'_version','transaction_id');
			$this->addForeignKey($table.'_vtid',$table.'_version','transaction_id','transaction','id');
			$this->createIndex($table.'_dtid',$table.'_version','deleted_transaction_id');
			$this->addForeignKey($table.'_dtid',$table.'_version','deleted_transaction_id','transaction','id');
		}
	}

	public function down()
	{
		foreach ($this->tables as $table) {
			$this->dropColumn($table,'hash');
			$this->dropForeignKey($table.'_tid',$table);
			$this->dropIndex($table.'_tid',$table);
			$this->dropColumn($table,'transaction_id');

			$this->dropColumn($table.'_version','hash');
			$this->dropForeignKey($table.'_vtid',$table.'_version');
			$this->dropIndex($table.'_vtid',$table.'_version');
			$this->dropColumn($table.'_version','transaction_id');
			$this->dropForeignKey($table.'_dtid',$table.'_version');
			$this->dropIndex($table.'_dtid',$table.'_version');
			$this->dropColumn($table.'_version','deleted_transaction_id');
		}
	}
}
