<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 08.04.2016
 * Time: 2:55
 */

namespace IvanKovalev\app\model;

use IvanKovalev\app\lib\DataBase;


class HandsUpModel
{
    public function stateChange($user,$state){

        //init

        $db = DataBase::getInstance();


        if( $user == $_COOKIE['user']){
            if($state == 'up' || $state == 'down' ){
                $db::table('usersStates')
                    ->where('userId', $_COOKIE['userID'])
                    ->update(['state' => $state]) or die('ERROR');
                echo 'OK';
            }else{
            echo 'param "state" can be only : "up" or "down" ';
        }

        }else{
            echo 'To use the service please log in';
            require_once 'app/view/autorisationPage.php';
        }
    }
}