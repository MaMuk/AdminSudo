<?php

class CustomModuleApi extends ModuleApi
{
    public function updateRecord($api, $args)
    {
        $bean = $this->loadBean($api, $args, 'save');
        $bean->dataChanges = $bean->db->getDataChanges($bean);

        $data = parent::updateRecord($api, $args);

        $this->sudoAudit($api, $args, $bean);
        return $data;
    }

    public function sudoAudit($api, $args, $bean)
    {
        if (!$bean->is_AuditEnabled() || empty($_SESSION['sudo_user_id'])) {
            return;
        }

        $auditFields = $bean->getAuditEnabledFieldDefinitions();

        $auditDataChanges = array_intersect_key($bean->dataChanges, $auditFields);

        if (!empty($auditDataChanges)) {
            $audit_table_name = $bean->get_audit_table_name();

            $time = strtotime(TimeDate::getInstance()->nowDb());
            $time = $time - 20;

            $time = date('Y-m-d H:i:s',$time);

            $sql = "SELECT * FROM " . $audit_table_name . " WHERE date_created >= '" . $time . "'";

            $query = $GLOBALS['db']->query($sql);

            $myInsert = "INSERT INTO sa_sudoaudit (
                        id,
                        date_entered ,
                        team_id ,
                        team_set_id ,
                        created_by ,
                        field_name ,
                        data_type ,
                        before_value_string ,
                        after_value_string ,
                        before_value_text ,
                        after_value_text ,
                        user_id_c ,
                        parent_type ,
                        parent_id
                        ) VALUES ";

            while ($row = $GLOBALS['db']->fetchByAssoc($query)) {
                $myInsert .= "(";
                $myInsert .= $GLOBALS['db']->quoted(create_guid()) . ",";
                $myInsert .= $GLOBALS['db']->quoted($row['date_created']) . ",";
                $myInsert .= $GLOBALS['db']->quoted(1) . ",";
                $myInsert .= $GLOBALS['db']->quoted(1) . ",";
                $myInsert .= $GLOBALS['db']->quoted($row['created_by']) . ",";
                $myInsert .= $GLOBALS['db']->quoted(translate($bean->field_defs[$row['field_name']]['vname'],$bean->module_name)) . ",";
                $myInsert .= $GLOBALS['db']->quoted($row['data_type']) . ",";
                $myInsert .= $GLOBALS['db']->quoted($row['before_value_string']) . ",";
                $myInsert .= $GLOBALS['db']->quoted($row['after_value_string']) . ",";
                $myInsert .= $GLOBALS['db']->quoted($row['before_value_text']) . ",";
                $myInsert .= $GLOBALS['db']->quoted($row['after_value_text']) . ",";
                $myInsert .= $GLOBALS['db']->quoted($_SESSION['sudo_user_id']) . ",";
                $myInsert .= $GLOBALS['db']->quoted($bean->module_name) . ",";
                $myInsert .= $GLOBALS['db']->quoted($bean->id);
                $myInsert .= "),";
            }

            $myInsert = substr_replace($myInsert, ';', -1);

            $GLOBALS['db']->query($myInsert);
        }
    }
}