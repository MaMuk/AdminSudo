<?php
require_once('modules/Users/views/view.detail.php');

class CustomUsersViewDetail extends UsersViewDetail {
    function preDisplay() {
        parent::preDisplay();

        $buttons = $this->ss->get_template_vars('EDITBUTTONS');
		
        if ($GLOBALS['current_user']->is_admin) {
            $buttons[] = "<input title='".translate('LBL_LOGIN_AS','Users')." " . $this->bean->first_name . "' class='button' LANGUAGE=javascript onclick='loginAs(\"".$this->bean->user_name."\");' type='button' name='login_as' value='".translate('LBL_LOGIN_AS','Users')." " . $this->bean->first_name . "'>";
        }


        $this->ss->assign('EDITBUTTONS',$buttons);
    }
}