<?php
$appPath = realpath(dirname(__FILE__) . '/../../../');
$yiit=dirname(__FILE__).'/../../../../../yii/framework/yiit.php';
$config = $appPath . '/modules/OphCiGlaucomaexamination/tests/config.php';
require_once($yiit);
require_once(dirname(__FILE__).'/WebTestCase.php');
Yii::createWebApplication($config);
