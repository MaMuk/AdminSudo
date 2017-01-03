<?php
/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/06_Customer_Center/10_Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */

// THIS CONTENT IS GENERATED BY MBPackage.php
$manifest = array (
  'built_in_version' => '7.7.0.0',
  'acceptable_sugar_versions' => 
  array (
    0 => '',
  ),
  'acceptable_sugar_flavors' => 
  array (
    0 => 'ENT',
    1 => 'ULT',
  ),
  'readme' => '',
  'key' => 'sa',
  'author' => '',
  'description' => '',
  'icon' => '',
  'is_uninstallable' => false,
  'name' => 'Exportable list view',
  'published_date' => '2016-11-08 11:45:27',
  'type' => 'module',
  'version' => time(),
  'remove_tables' => 'prompt',
);


$installdefs = array (
  'id' => 'ExportableList',
  'copy' => 
  array (
	  0 =>
		array (
		  'from' => '<basepath>/custom/Extension/application/Ext/Language/en_us.exportable_list.php',
		  'to' => 'custom/Extension/application/Ext/Language/en_us.exportable_list.php',
		),
	  1 =>
		array (
		  'from' => '<basepath>/custom/clients/base/views/exportable-list-view/exportable-list-view.js',
		  'to' => 'custom/clients/base/views/exportable-list-view/exportable-list-view.js',
		),
	  2 =>
		array (
		  'from' => '<basepath>/custom/clients/base/views/exportable-list-view/noaccess.hbs',
		  'to' => 'custom/clients/base/views/exportable-list-view/noaccess.hbs',
		),
	  3 =>
		array (
		  'from' => '<basepath>/custom/clients/base/views/exportable-list-view/exportable-list-view.php',
		  'to' => 'custom/clients/base/views/exportable-list-view/exportable-list-view.php',
		),
	  4 =>
		array (
		  'from' => '<basepath>/custom/clients/base/views/exportable-list-view/row.hbs',
		  'to' => 'custom/clients/base/views/exportable-list-view/row.hbs',
		),
	  5 =>
		array (
		  'from' => '<basepath>/custom/clients/base/views/exportable-list-view/exportable-list-view.hbs',
		  'to' => 'custom/clients/base/views/exportable-list-view/exportable-list-view.hbs',
		),

  ),
);