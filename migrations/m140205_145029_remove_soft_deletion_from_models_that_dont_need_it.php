<?php

class m140205_145029_remove_soft_deletion_from_models_that_dont_need_it extends CDbMigration
{
	public $tables = array(
		'et_ophciglaucomaexamination_ant_seg',
		'et_ophciglaucomaexamination_as',
		'et_ophciglaucomaexamination_diagnosis',
		'et_ophciglaucomaexamination_disc_files',
		'et_ophciglaucomaexamination_disc_info',
		'et_ophciglaucomaexamination_fam_hist',
		'et_ophciglaucomaexamination_fup',
		'et_ophciglaucomaexamination_gonioscopy',
		'et_ophciglaucomaexamination_iop',
		'et_ophciglaucomaexamination_med_hist',
		'et_ophciglaucomaexamination_medications',
		'et_ophciglaucomaexamination_oc_hist',
		'et_ophciglaucomaexamination_optic_disk',
		'et_ophciglaucomaexamination_post_seg',
		'et_ophciglaucomaexamination_presc_meds',
		'et_ophciglaucomaexamination_risks',
		'et_ophciglaucomaexamination_va',
	);

	public function up()
	{
		foreach ($this->tables as $table) {
			$this->dropColumn($table,'deleted');
			$this->dropColumn($table.'_version','deleted');

			$this->dropForeignKey("{$table}_aid_fk",$table."_version");
		}
	}

	public function down()
	{
		foreach ($this->tables as $table) {
			$this->addColumn($table,'deleted','tinyint(1) unsigned not null');
			$this->addColumn($table."_version",'deleted','tinyint(1) unsigned not null');

			$this->addForeignKey("{$table}_aid_fk",$table."_version","id",$table,"id");
		}
	}
}
