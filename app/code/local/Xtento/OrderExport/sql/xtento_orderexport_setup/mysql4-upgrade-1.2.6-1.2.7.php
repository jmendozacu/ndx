<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$installer->run("
ALTER TABLE `" . $this->getTable('xtento_orderexport_profile') . "` ADD `export_filter_older_x_minutes` INT(10) NULL AFTER `export_filter_datefrom`;
");

$installer->endSetup();