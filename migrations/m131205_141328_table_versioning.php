<?php

class m131205_141328_table_versioning extends CDbMigration
{
	public function up()
	{
		$this->execute("
CREATE TABLE `et_ophciglaucomaexamination_ant_seg_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `description_left` text COLLATE utf8_bin,
  `description_right` text COLLATE utf8_bin,
  `image_string_left` text COLLATE utf8_bin,
  `image_string_right` text COLLATE utf8_bin,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `cct_left` int(10) DEFAULT '400',
  `cct_right` int(10) DEFAULT '400',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophciglaucomaexamination_ant_seg_event_id_fk` (`event_id`),
  KEY `acv_et_ophciglaucomaexamination_ant_seg_created_user_id_fk` (`created_user_id`),
  KEY `acv_et_ophciglaucomaexamination_ant_seg_last_modified_user_id_fk` (`last_modified_user_id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_ant_seg_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_ant_seg_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_ant_seg_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophciglaucomaexamination_ant_seg_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciglaucomaexamination_ant_seg_version');

		$this->createIndex('et_ophciglaucomaexamination_ant_seg_aid_fk','et_ophciglaucomaexamination_ant_seg_version','id');
		$this->addForeignKey('et_ophciglaucomaexamination_ant_seg_aid_fk','et_ophciglaucomaexamination_ant_seg_version','id','et_ophciglaucomaexamination_ant_seg','id');

		$this->addColumn('et_ophciglaucomaexamination_ant_seg_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciglaucomaexamination_ant_seg_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciglaucomaexamination_ant_seg_version','version_id');
		$this->alterColumn('et_ophciglaucomaexamination_ant_seg_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophciglaucomaexamination_as_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `left` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `right` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophciglaucomaexamination_as_event_id_fk` (`event_id`),
  KEY `acv_et_ophciglaucomaexamination_as_created_user_id_fk` (`created_user_id`),
  KEY `acv_et_ophciglaucomaexamination_as_last_modified_user_id_fk` (`last_modified_user_id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_as_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_as_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_as_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophciglaucomaexamination_as_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciglaucomaexamination_as_version');

		$this->createIndex('et_ophciglaucomaexamination_as_aid_fk','et_ophciglaucomaexamination_as_version','id');
		$this->addForeignKey('et_ophciglaucomaexamination_as_aid_fk','et_ophciglaucomaexamination_as_version','id','et_ophciglaucomaexamination_as','id');

		$this->addColumn('et_ophciglaucomaexamination_as_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciglaucomaexamination_as_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciglaucomaexamination_as_version','version_id');
		$this->alterColumn('et_ophciglaucomaexamination_as_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophciglaucomaexamination_diagnosis_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `diagnosis_1_left` int(10) DEFAULT NULL,
  `diagnosis_1_right` int(10) DEFAULT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `diagnosis_2_left` int(10) DEFAULT NULL,
  `diagnosis_3_left` int(10) DEFAULT NULL,
  `diagnosis_2_right` int(10) DEFAULT NULL,
  `diagnosis_3_right` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acv_et_ophciglaucomaexamination_diagnosis_event_id_fk` (`event_id`),
  KEY `acv_et_ophciglaucomaexamination_diagnosis_created_user_id_fk` (`created_user_id`),
  KEY `acv_phciglaucomaexamination_diagnosis_last_modified_user_id_fk` (`last_modified_user_id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_diagnosis_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_diagnosis_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_phciglaucomaexamination_diagnosis_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophciglaucomaexamination_diagnosis_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciglaucomaexamination_diagnosis_version');

		$this->createIndex('et_ophciglaucomaexamination_diagnosis_aid_fk','et_ophciglaucomaexamination_diagnosis_version','id');
		$this->addForeignKey('et_ophciglaucomaexamination_diagnosis_aid_fk','et_ophciglaucomaexamination_diagnosis_version','id','et_ophciglaucomaexamination_diagnosis','id');

		$this->addColumn('et_ophciglaucomaexamination_diagnosis_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciglaucomaexamination_diagnosis_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciglaucomaexamination_diagnosis_version','version_id');
		$this->alterColumn('et_ophciglaucomaexamination_diagnosis_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophciglaucomaexamination_disc_files_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo_id` int(10) unsigned NOT NULL,
  `pid` varchar(20) COLLATE utf8_bin NOT NULL,
  `original_filename` varchar(100) COLLATE utf8_bin NOT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_phciglaucomaexamination_disc_files_last_modified_user_id_fk` (`last_modified_user_id`),
  KEY `acv_et_ophciglaucomaexamination_disc_files_created_user_id_fk` (`created_user_id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_disc_files_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_phciglaucomaexamination_disc_files_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophciglaucomaexamination_disc_files_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciglaucomaexamination_disc_files_version');

		$this->createIndex('et_ophciglaucomaexamination_disc_files_aid_fk','et_ophciglaucomaexamination_disc_files_version','id');
		$this->addForeignKey('et_ophciglaucomaexamination_disc_files_aid_fk','et_ophciglaucomaexamination_disc_files_version','id','et_ophciglaucomaexamination_disc_files','id');

		$this->addColumn('et_ophciglaucomaexamination_disc_files_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciglaucomaexamination_disc_files_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciglaucomaexamination_disc_files_version','version_id');
		$this->alterColumn('et_ophciglaucomaexamination_disc_files_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophciglaucomaexamination_disc_info_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo_id` int(10) unsigned NOT NULL,
  `pid` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `exam_time` time DEFAULT NULL,
  `dob` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `gender` char(1) COLLATE utf8_bin DEFAULT NULL,
  `diagnosis1` text COLLATE utf8_bin,
  `diagnosis2` text COLLATE utf8_bin,
  `diagnosis3` text COLLATE utf8_bin,
  `diagnosis4` text COLLATE utf8_bin,
  `examiner` text COLLATE utf8_bin,
  `eye` char(1) COLLATE utf8_bin DEFAULT NULL,
  `comments` text COLLATE utf8_bin,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_phciglaucomaexamination_disc_info_last_modified_user_id_fk` (`last_modified_user_id`),
  KEY `acv_et_ophciglaucomaexamination_disc_info_created_user_id_fk` (`created_user_id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_disc_info_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_phciglaucomaexamination_disc_info_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophciglaucomaexamination_disc_info_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciglaucomaexamination_disc_info_version');

		$this->createIndex('et_ophciglaucomaexamination_disc_info_aid_fk','et_ophciglaucomaexamination_disc_info_version','id');
		$this->addForeignKey('et_ophciglaucomaexamination_disc_info_aid_fk','et_ophciglaucomaexamination_disc_info_version','id','et_ophciglaucomaexamination_disc_info','id');

		$this->addColumn('et_ophciglaucomaexamination_disc_info_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciglaucomaexamination_disc_info_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciglaucomaexamination_disc_info_version','version_id');
		$this->alterColumn('et_ophciglaucomaexamination_disc_info_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophciglaucomaexamination_fam_hist_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `comments` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophciglaucomaexamination_fam_hist_event_id_fk` (`event_id`),
  KEY `acv_et_ophciglaucomaexamination_fam_hist_created_user_id_fk` (`created_user_id`),
  KEY `acv_phciglaucomaexamination_fam_hist_last_modified_user_id_fk` (`last_modified_user_id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_fam_hist_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_fam_hist_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_phciglaucomaexamination_fam_hist_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophciglaucomaexamination_fam_hist_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciglaucomaexamination_fam_hist_version');

		$this->createIndex('et_ophciglaucomaexamination_fam_hist_aid_fk','et_ophciglaucomaexamination_fam_hist_version','id');
		$this->addForeignKey('et_ophciglaucomaexamination_fam_hist_aid_fk','et_ophciglaucomaexamination_fam_hist_version','id','et_ophciglaucomaexamination_fam_hist','id');

		$this->addColumn('et_ophciglaucomaexamination_fam_hist_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciglaucomaexamination_fam_hist_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciglaucomaexamination_fam_hist_version','version_id');
		$this->alterColumn('et_ophciglaucomaexamination_fam_hist_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophciglaucomaexamination_fup_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hos_num_id` int(10) unsigned NOT NULL,
  `event_id` int(10) unsigned NOT NULL,
  `follow_up` int(10) unsigned NOT NULL,
  `visit` int(10) unsigned DEFAULT '0',
  `location` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophciglaucomaexamination_fup_event_id_fk` (`event_id`),
  KEY `acv_et_ophciglaucomaexamination_fup_created_user_id_fk` (`created_user_id`),
  KEY `acv_et_ophciglaucomaexamination_fup_last_modified_user_id_fk` (`last_modified_user_id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_fup_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_fup_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_fup_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophciglaucomaexamination_fup_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciglaucomaexamination_fup_version');

		$this->createIndex('et_ophciglaucomaexamination_fup_aid_fk','et_ophciglaucomaexamination_fup_version','id');
		$this->addForeignKey('et_ophciglaucomaexamination_fup_aid_fk','et_ophciglaucomaexamination_fup_version','id','et_ophciglaucomaexamination_fup','id');

		$this->addColumn('et_ophciglaucomaexamination_fup_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciglaucomaexamination_fup_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciglaucomaexamination_fup_version','version_id');
		$this->alterColumn('et_ophciglaucomaexamination_fup_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophciglaucomaexamination_gonioscopy_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `gonio_left` int(1) unsigned NOT NULL,
  `gonio_right` int(1) unsigned NOT NULL,
  `van_herick_left` int(1) unsigned NOT NULL,
  `van_herick_right` int(1) unsigned NOT NULL,
  `description_left` text COLLATE utf8_bin,
  `description_right` text COLLATE utf8_bin,
  `image_string_left` text COLLATE utf8_bin,
  `image_string_right` text COLLATE utf8_bin,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophciglaucomaexamination_gonioscopy_event_id_fk` (`event_id`),
  KEY `acv_et_ophciglaucomaexamination_gonioscopy_created_user_id_fk` (`created_user_id`),
  KEY `acv_phciglaucomaexamination_gonioscopy_last_modified_user_id_fk` (`last_modified_user_id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_gonioscopy_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_gonioscopy_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_phciglaucomaexamination_gonioscopy_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophciglaucomaexamination_gonioscopy_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciglaucomaexamination_gonioscopy_version');

		$this->createIndex('et_ophciglaucomaexamination_gonioscopy_aid_fk','et_ophciglaucomaexamination_gonioscopy_version','id');
		$this->addForeignKey('et_ophciglaucomaexamination_gonioscopy_aid_fk','et_ophciglaucomaexamination_gonioscopy_version','id','et_ophciglaucomaexamination_gonioscopy','id');

		$this->addColumn('et_ophciglaucomaexamination_gonioscopy_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciglaucomaexamination_gonioscopy_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciglaucomaexamination_gonioscopy_version','version_id');
		$this->alterColumn('et_ophciglaucomaexamination_gonioscopy_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophciglaucomaexamination_iop_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `instrument_right` tinyint(2) DEFAULT NULL,
  `instrument_left` tinyint(2) DEFAULT NULL,
  `right_iop` tinyint(4) DEFAULT NULL,
  `left_iop` tinyint(4) DEFAULT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophciglaucomaexamination_iop_event_id_fk` (`event_id`),
  KEY `acv_et_ophciglaucomaexamination_iop_created_user_id_fk` (`created_user_id`),
  KEY `acv_et_ophciglaucomaexamination_iop_last_modified_user_id_fk` (`last_modified_user_id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_iop_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_iop_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_iop_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophciglaucomaexamination_iop_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciglaucomaexamination_iop_version');

		$this->createIndex('et_ophciglaucomaexamination_iop_aid_fk','et_ophciglaucomaexamination_iop_version','id');
		$this->addForeignKey('et_ophciglaucomaexamination_iop_aid_fk','et_ophciglaucomaexamination_iop_version','id','et_ophciglaucomaexamination_iop','id');

		$this->addColumn('et_ophciglaucomaexamination_iop_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciglaucomaexamination_iop_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciglaucomaexamination_iop_version','version_id');
		$this->alterColumn('et_ophciglaucomaexamination_iop_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophciglaucomaexamination_med_hist_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `comments` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophciglaucomaexamination_med_hist_event_id_fk` (`event_id`),
  KEY `acv_et_ophciglaucomaexamination_med_hist_created_user_id_fk` (`created_user_id`),
  KEY `acv_phciglaucomaexamination_med_hist_last_modified_user_id_fk` (`last_modified_user_id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_med_hist_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_med_hist_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_phciglaucomaexamination_med_hist_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophciglaucomaexamination_med_hist_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciglaucomaexamination_med_hist_version');

		$this->createIndex('et_ophciglaucomaexamination_med_hist_aid_fk','et_ophciglaucomaexamination_med_hist_version','id');
		$this->addForeignKey('et_ophciglaucomaexamination_med_hist_aid_fk','et_ophciglaucomaexamination_med_hist_version','id','et_ophciglaucomaexamination_med_hist','id');

		$this->addColumn('et_ophciglaucomaexamination_med_hist_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciglaucomaexamination_med_hist_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciglaucomaexamination_med_hist_version','version_id');
		$this->alterColumn('et_ophciglaucomaexamination_med_hist_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophciglaucomaexamination_medications_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `comments` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophciglaucomaexamination_medications_event_id_fk` (`event_id`),
  KEY `acv_et_ophciglaucomaexamination_medications_created_user_id_fk` (`created_user_id`),
  KEY `acv_phciglaucomaexamination_medications_last_modified_user_id_fk` (`last_modified_user_id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_medications_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_medications_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_phciglaucomaexamination_medications_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophciglaucomaexamination_medications_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciglaucomaexamination_medications_version');

		$this->createIndex('et_ophciglaucomaexamination_medications_aid_fk','et_ophciglaucomaexamination_medications_version','id');
		$this->addForeignKey('et_ophciglaucomaexamination_medications_aid_fk','et_ophciglaucomaexamination_medications_version','id','et_ophciglaucomaexamination_medications','id');

		$this->addColumn('et_ophciglaucomaexamination_medications_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciglaucomaexamination_medications_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciglaucomaexamination_medications_version','version_id');
		$this->alterColumn('et_ophciglaucomaexamination_medications_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophciglaucomaexamination_oc_hist_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `comments` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophciglaucomaexamination_oc_hist_event_id_fk` (`event_id`),
  KEY `acv_et_ophciglaucomaexamination_oc_hist_created_user_id_fk` (`created_user_id`),
  KEY `acv_et_ophciglaucomaexamination_oc_hist_last_modified_user_id_fk` (`last_modified_user_id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_oc_hist_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_oc_hist_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_oc_hist_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophciglaucomaexamination_oc_hist_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciglaucomaexamination_oc_hist_version');

		$this->createIndex('et_ophciglaucomaexamination_oc_hist_aid_fk','et_ophciglaucomaexamination_oc_hist_version','id');
		$this->addForeignKey('et_ophciglaucomaexamination_oc_hist_aid_fk','et_ophciglaucomaexamination_oc_hist_version','id','et_ophciglaucomaexamination_oc_hist','id');

		$this->addColumn('et_ophciglaucomaexamination_oc_hist_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciglaucomaexamination_oc_hist_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciglaucomaexamination_oc_hist_version','version_id');
		$this->alterColumn('et_ophciglaucomaexamination_oc_hist_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophciglaucomaexamination_optic_disk_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `description_left` text COLLATE utf8_bin,
  `description_right` text COLLATE utf8_bin,
  `image_string_left` text COLLATE utf8_bin,
  `image_string_right` text COLLATE utf8_bin,
  `size_left` int(10) unsigned NOT NULL,
  `size_right` int(10) unsigned NOT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophciglaucomaexamination_optic_disk_event_id_fk` (`event_id`),
  KEY `acv_et_ophciglaucomaexamination_optic_disk_created_user_id_fk` (`created_user_id`),
  KEY `acv_phciglaucomaexamination_optic_disk_last_modified_user_id_fk` (`last_modified_user_id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_optic_disk_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_optic_disk_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_phciglaucomaexamination_optic_disk_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophciglaucomaexamination_optic_disk_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciglaucomaexamination_optic_disk_version');

		$this->createIndex('et_ophciglaucomaexamination_optic_disk_aid_fk','et_ophciglaucomaexamination_optic_disk_version','id');
		$this->addForeignKey('et_ophciglaucomaexamination_optic_disk_aid_fk','et_ophciglaucomaexamination_optic_disk_version','id','et_ophciglaucomaexamination_optic_disk','id');

		$this->addColumn('et_ophciglaucomaexamination_optic_disk_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciglaucomaexamination_optic_disk_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciglaucomaexamination_optic_disk_version','version_id');
		$this->alterColumn('et_ophciglaucomaexamination_optic_disk_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophciglaucomaexamination_post_seg_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `description_left` text COLLATE utf8_bin,
  `description_right` text COLLATE utf8_bin,
  `image_string_left` text COLLATE utf8_bin,
  `image_string_right` text COLLATE utf8_bin,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophciglaucomaexamination_post_seg_event_id_fk` (`event_id`),
  KEY `acv_et_ophciglaucomaexamination_post_seg_created_user_id_fk` (`created_user_id`),
  KEY `acv_phciglaucomaexamination_post_seg_last_modified_user_id_fk` (`last_modified_user_id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_post_seg_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_post_seg_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_phciglaucomaexamination_post_seg_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophciglaucomaexamination_post_seg_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciglaucomaexamination_post_seg_version');

		$this->createIndex('et_ophciglaucomaexamination_post_seg_aid_fk','et_ophciglaucomaexamination_post_seg_version','id');
		$this->addForeignKey('et_ophciglaucomaexamination_post_seg_aid_fk','et_ophciglaucomaexamination_post_seg_version','id','et_ophciglaucomaexamination_post_seg','id');

		$this->addColumn('et_ophciglaucomaexamination_post_seg_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciglaucomaexamination_post_seg_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciglaucomaexamination_post_seg_version','version_id');
		$this->alterColumn('et_ophciglaucomaexamination_post_seg_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophciglaucomaexamination_presc_meds_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `medication_1_left` int(2) DEFAULT NULL,
  `medication_2_left` int(2) DEFAULT NULL,
  `medication_3_left` int(2) DEFAULT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `medication_1_right` int(2) DEFAULT NULL,
  `medication_2_right` int(2) DEFAULT NULL,
  `medication_3_right` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acv_et_ophciglaucomaexamination_presc_meds_event_id_fk` (`event_id`),
  KEY `acv_et_ophciglaucomaexamination_presc_meds_created_user_id_fk` (`created_user_id`),
  KEY `acv_phciglaucomaexamination_presc_meds_last_modified_user_id_fk` (`last_modified_user_id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_presc_meds_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_presc_meds_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_phciglaucomaexamination_presc_meds_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophciglaucomaexamination_presc_meds_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciglaucomaexamination_presc_meds_version');

		$this->createIndex('et_ophciglaucomaexamination_presc_meds_aid_fk','et_ophciglaucomaexamination_presc_meds_version','id');
		$this->addForeignKey('et_ophciglaucomaexamination_presc_meds_aid_fk','et_ophciglaucomaexamination_presc_meds_version','id','et_ophciglaucomaexamination_presc_meds','id');

		$this->addColumn('et_ophciglaucomaexamination_presc_meds_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciglaucomaexamination_presc_meds_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciglaucomaexamination_presc_meds_version','version_id');
		$this->alterColumn('et_ophciglaucomaexamination_presc_meds_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophciglaucomaexamination_risks_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `myopia` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `migraine` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `cva` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `blood_loss` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `raynauds` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `foh` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hyperopia` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `cardiac_surgery` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `angina` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `asthma` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sob` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hypotension` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophciglaucomaexamination_risks_event_id_fk` (`event_id`),
  KEY `acv_et_ophciglaucomaexamination_risks_created_user_id_fk` (`created_user_id`),
  KEY `acv_et_ophciglaucomaexamination_risks_last_modified_user_id_fk` (`last_modified_user_id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_risks_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_risks_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_risks_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophciglaucomaexamination_risks_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciglaucomaexamination_risks_version');

		$this->createIndex('et_ophciglaucomaexamination_risks_aid_fk','et_ophciglaucomaexamination_risks_version','id');
		$this->addForeignKey('et_ophciglaucomaexamination_risks_aid_fk','et_ophciglaucomaexamination_risks_version','id','et_ophciglaucomaexamination_risks','id');

		$this->addColumn('et_ophciglaucomaexamination_risks_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciglaucomaexamination_risks_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciglaucomaexamination_risks_version','version_id');
		$this->alterColumn('et_ophciglaucomaexamination_risks_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophciglaucomaexamination_va_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `rva_ua` int(10) DEFAULT '0',
  `lva_ua` int(10) DEFAULT '0',
  `rva_cr` int(10) DEFAULT '0',
  `lva_cr` int(10) DEFAULT '0',
  `rva_method` tinyint(4) DEFAULT '0',
  `lva_method` tinyint(4) DEFAULT '0',
  `aid` tinyint(1) DEFAULT '0',
  `format` tinyint(1) DEFAULT '0',
  `distance` int(11) DEFAULT '0',
  `type` tinyint(1) DEFAULT '0',
  `unit` tinyint(1) DEFAULT '0',
  `right_aid` tinyint(1) unsigned DEFAULT NULL,
  `left_aid` tinyint(1) unsigned DEFAULT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophciglaucomaexamination_va_event_id_fk` (`event_id`),
  KEY `acv_et_ophciglaucomaexamination_va_created_user_id_fk` (`created_user_id`),
  KEY `acv_et_ophciglaucomaexamination_va_last_modified_user_id_fk` (`last_modified_user_id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_va_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_va_created_user_id_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophciglaucomaexamination_va_last_modified_user_id_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophciglaucomaexamination_va_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciglaucomaexamination_va_version');

		$this->createIndex('et_ophciglaucomaexamination_va_aid_fk','et_ophciglaucomaexamination_va_version','id');
		$this->addForeignKey('et_ophciglaucomaexamination_va_aid_fk','et_ophciglaucomaexamination_va_version','id','et_ophciglaucomaexamination_va','id');

		$this->addColumn('et_ophciglaucomaexamination_va_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciglaucomaexamination_va_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciglaucomaexamination_va_version','version_id');
		$this->alterColumn('et_ophciglaucomaexamination_va_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');
	}

	public function down()
	{
		$this->dropTable('et_ophciglaucomaexamination_ant_seg_version');
		$this->dropTable('et_ophciglaucomaexamination_as_version');
		$this->dropTable('et_ophciglaucomaexamination_diagnosis_version');
		$this->dropTable('et_ophciglaucomaexamination_disc_files_version');
		$this->dropTable('et_ophciglaucomaexamination_disc_info_version');
		$this->dropTable('et_ophciglaucomaexamination_fam_hist_version');
		$this->dropTable('et_ophciglaucomaexamination_fup_version');
		$this->dropTable('et_ophciglaucomaexamination_gonioscopy_version');
		$this->dropTable('et_ophciglaucomaexamination_iop_version');
		$this->dropTable('et_ophciglaucomaexamination_med_hist_version');
		$this->dropTable('et_ophciglaucomaexamination_medications_version');
		$this->dropTable('et_ophciglaucomaexamination_oc_hist_version');
		$this->dropTable('et_ophciglaucomaexamination_optic_disk_version');
		$this->dropTable('et_ophciglaucomaexamination_post_seg_version');
		$this->dropTable('et_ophciglaucomaexamination_presc_meds_version');
		$this->dropTable('et_ophciglaucomaexamination_risks_version');
		$this->dropTable('et_ophciglaucomaexamination_va_version');
	}
}
