<?php

$basePath = realpath(dirname(__FILE__) . '/../../../');

return array(
    'basePath' => $basePath,
    'import' => array(
        'application.models.*',
        'application.models.elements.*',
        'application.modules.OphCiGlaucomaexamination.models.*',
        'application.modules.OphCiGlaucomaexamination.components.*',
    ),
    'components' => array(
        'fixture' => array(
            'class' => 'system.test.CDbFixtureManager',
            'basePath' => realpath(dirname(__FILE__) . '/../tests/fixtures'),
        // redefine basePath for module tests
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=openeyestest',
            'username' => 'oe',
            'password' => 'pword',
        ),
    ),
);
?>