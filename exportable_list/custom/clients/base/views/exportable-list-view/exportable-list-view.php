<?php
$viewdefs['base']['view']['exportable-list-view'] = array(
    'dashlets' => array(
        array(
            'label' => 'LBL_EXPORTABLE_LIST_DASHLET',
            'description' => 'LBL_EXPORTABLE_LIST_DASHLET_DESC',
            'config' => array(
            ),
            'preview' => array(
                'module' => 'Accounts',
                'label' => 'LBL_MODULE_NAME',
                'display_columns' => array(
                    'name',
                    'phone_office',
                    'billing_address_country',
                ),
            ),
        ),
    ),
    'custom_toolbar' => array(
        'buttons' => array(
            array(
                'name'=>'export_button',
                'type'=>'button',
                'label'=>'LBL_EXPORT_BUTTON',
                'primary' => true,
                'events' => array(
                    'click' => 'list:export_action:fire',
                ),
                'acl_action' => 'view',
            ),

            array(
                "type" => "dashletaction",
                "css_class" => "dashlet-toggle btn btn-invisible minify",
                "icon" => "fa-chevron-up",
                "action" => "toggleMinify",
                "tooltip" => "LBL_DASHLET_TOGGLE",
            ),
            array(
                "dropdown_buttons" => array(
                    array(
                        "type" => "dashletaction",
                        "action" => "editClicked",
                        "label" => "LBL_DASHLET_CONFIG_EDIT_LABEL",
                    ),
                    array(
                        "type" => "dashletaction",
                        "action" => "refreshClicked",
                        "label" => "LBL_DASHLET_REFRESH_LABEL",
                    ),
                    array(
                        "type" => "dashletaction",
                        "action" => "removeClicked",
                        "label" => "LBL_DASHLET_REMOVE_LABEL",
                    ),
                )
            )
        ),
    ),
    'panels' => array(
        array(
            'name' => 'dashlet_settings',
            'columns' => 2,
            'labelsOnTop' => true,
            'placeholders' => true,
            'fields' => array(
                array(
                    'name' => 'module',
                    'label' => 'LBL_MODULE',
                    'type' => 'enum',
                    'span' => 12,
                    'sort_alpha' => true,
                ),
                array(
                    'name' => 'display_columns',
                    'label' => 'LBL_COLUMNS',
                    'type' => 'enum',
                    'isMultiSelect' => true,
                    'ordered' => true,
                    'span' => 12,
                    'hasBlank' => true,
                    'options' => array('' => ''),
                ),
                array(
                    'name' => 'limit',
                    'label' => 'LBL_DASHLET_CONFIGURE_DISPLAY_ROWS',
                    'type' => 'enum',
                    'options' => 'dashlet_limit_options',
                ),
                array(
                    'name' => 'auto_refresh',
                    'label' => 'Auto Refresh',
                    'type' => 'enum',
                    'options' => 'sugar7_dashlet_auto_refresh_options',
                ),
                array(
                    'name' => 'intelligent',
                    'label' => 'LBL_DASHLET_CONFIGURE_INTELLIGENT',
                    'type' => 'bool',
                ),
                array(
                    'name' => 'linked_fields',
                    'label' => 'LBL_DASHLET_CONFIGURE_LINKED',
                    'type' => 'enum',
                    'required' => true
                ),
            ),
        ),
    ),
);