<?php
$module_name = 'sa_SudoAudit';
$viewdefs[$module_name] = 
array (
  'base' => 
  array (
    'view' => 
    array (
      'list' => 
      array (
        'panels' => 
        array (
          0 => 
          array (
            'label' => 'LBL_PANEL_1',
            'fields' => 
            array (
              0 => 
              array (
                'name' => 'field_name',
                'label' => 'LBL_FIELD_NAME',
                'enabled' => true,
                'default' => true,
              ),
              1 => 
              array (
                'name' => 'parent_name',
                'label' => 'sudo_parent_name',
                'enabled' => true,
                'id' => 'PARENT_ID',
                'link' => true,
                'sortable' => false,
                'default' => true,
              ),
              2 => 
              array (
                'name' => 'created_by_sudo',
                'label' => 'LBL_CREATED_BY_SUDO',
                'enabled' => true,
                'id' => 'USER_ID_C',
                'link' => true,
                'sortable' => false,
                'default' => true,
              ),
              3 => 
              array (
                'name' => 'before_value_string',
                'label' => 'LBL_BEFORE_VALUE_STRING',
                'enabled' => true,
                'default' => true,
              ),
              4 => 
              array (
                'name' => 'after_value_string',
                'label' => 'LBL_AFTER_VALUE_STRING',
                'enabled' => true,
                'default' => true,
              ),
              5 => 
              array (
                'name' => 'created_by_name',
                'label' => 'LBL_CREATED',
                'enabled' => true,
                'readonly' => true,
                'id' => 'CREATED_BY',
                'link' => true,
                'default' => true,
              ),
              6 => 
              array (
                'name' => 'date_entered',
                'label' => 'LBL_DATE_ENTERED',
                'enabled' => true,
                'readonly' => true,
                'default' => true,
              ),
              7 => 
              array (
                'name' => 'team_name',
                'label' => 'LBL_TEAM',
                'default' => false,
                'enabled' => true,
              ),
            ),
          ),
        ),
        'orderBy' => 
        array (
          'field' => 'date_modified',
          'direction' => 'desc',
        ),
      ),
    ),
  ),
);
