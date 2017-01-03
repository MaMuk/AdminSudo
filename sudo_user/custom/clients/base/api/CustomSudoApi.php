<?php

class CustomSudoApi extends SugarApi
{
    public function registerApiRest()
    {
        return array(
            'getState' => array(
                'reqType' => 'GET',
                'path' => array('getState'),
                'pathVars' => array(''),
                'method' => 'getState',
                'shortHelp' => '',
                'longHelp' => '',
            ),
            'mySudo' => array(
                'reqType' => 'GET',
                'path' => array('logInAs','?'),
                'pathVars' => array('','user_name'),
                'method' => 'logInAs',
                'shortHelp' => '',
                'longHelp' => '',
            ),
            'backToAdmin' => array(
                'reqType' => 'GET',
                'path' => array('backToAdmin'),
                'pathVars' => array(''),
                'method' => 'backToAdmin',
                'shortHelp' => '',
                'longHelp' => '',
            ),
        );
    }

    public function getState($api, $args) {
        global $current_user;
        $response = array();
        $response['in_sudo'] = false;

        if (!empty($_SESSION['sudo_user_id'])) {
            $user = BeanFactory::getBean('Users', $_SESSION['sudo_user_id']);

            $response['in_sudo'] = true;
            $response['current_user'] = $current_user->full_name;
            $response['sudo_user'] = $user->full_name;
        }

        return $response;
    }

    public function logInAs($api, $args) {
        session_start();
        if (!empty($args['user_name'])) {
            $query = new SugarQuery();
            $query->from(BeanFactory::getBean('Users'));
            $query->where()->equals('user_name', $args['user_name']);
            $query->select(array('id'));
            $query->limit(1);

            $result = $query->execute();

            if (!empty($result[0])) {
                $user = BeanFactory::getBean('Users', $result[0]['id']);

                if(empty($_SESSION['sudo_user_id'])) {
                    $_SESSION['sudo_user_id'] = $GLOBALS['current_user']->id;
                }

                $GLOBALS['current_user'] = $user;
                $_SESSION['authenticated_user_id'] = $user->id;
            }
        }
    }

    public function backToAdmin($api, $args) {
        session_start();
        $user = BeanFactory::getBean('Users');
        $user->retrieve($_SESSION['sudo_user_id']);
        if($user->is_admin)
        {
            $_SESSION['sudo_user_id'] = null;
            $_SESSION['authenticated_user_id'] = $user->id;

            $GLOBALS['current_user'] = $user;
        }
    }
}