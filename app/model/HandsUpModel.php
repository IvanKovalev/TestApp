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



             $user = $db::table('users')->where('name', $user)->first();

        if($state == 'up' || $state == 'down' ){
                $db::table('usersStates')
                    ->where('userId', $user->id)
                    ->update(['state' => $state]) or die('ERROR');
                echo 'OK';
            }else {
                echo 'param "state" can be only : "up" or "down" ';
            }

    }
}