<?php

class m131206_150636_soft_deletion extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophciglaucomaexamination_ant_seg','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_ant_seg_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_as','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_as_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_diagnosis','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_diagnosis_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_disc_files','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_disc_files_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_disc_info','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_disc_info_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_fam_hist','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_fam_hist_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_fup','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_fup_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_gonioscopy','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_gonioscopy_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_iop','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_iop_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_med_hist','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_med_hist_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_medications','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_medications_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_oc_hist','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_oc_hist_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_optic_disk','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_optic_disk_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_post_seg','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_post_seg_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_presc_meds','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_presc_meds_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_risks','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_risks_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_va','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciglaucomaexamination_va_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophciglaucomaexamination_ant_seg','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_ant_seg_version','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_as','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_as_version','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_diagnosis','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_diagnosis_version','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_disc_files','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_disc_files_version','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_disc_info','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_disc_info_version','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_fam_hist','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_fam_hist_version','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_fup','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_fup_version','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_gonioscopy','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_gonioscopy_version','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_iop','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_iop_version','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_med_hist','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_med_hist_version','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_medications','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_medications_version','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_oc_hist','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_oc_hist_version','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_optic_disk','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_optic_disk_version','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_post_seg','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_post_seg_version','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_presc_meds','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_presc_meds_version','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_risks','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_risks_version','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_va','deleted');
		$this->dropColumn('et_ophciglaucomaexamination_va_version','deleted');
	}
}
