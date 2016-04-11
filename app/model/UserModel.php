<?php

namespace IvanKovalev\app\model;

use IvanKovalev\app\lib\DataBase;
use IvanKovalev\app\validation\UserValidation;

class UserModel
{

    public function login($guest, $password)
    {   //init
        $db = DataBase::getInstance();
        $userValidation = new UserValidation();

        //validate
        $user = $userValidation->name($guest);
        $password = $userValidation->password($password);

        //user database search
        $result = $db::table('users')->where('name', $guest)->first();

        //compare name and password
        if (($user == $result->name) && ($password == $result->password)) {

            //set user name and id
            setcookie('user', $result->name, time() + (86400 * 30), '/');
            setcookie('userID', $result->id, time() + (86400 * 30), '/');

            $_SESSION['users'][$result->id] = [
                'userId' => $result->id,
                'userName' => $result->name,
                'callCount' => 0,
                'timeCount' => 0
            ];

            return true;
        } else {

            return false;

        }

    }

    public function registration($name, $password)
    {   //init
        $db = DataBase::getInstance();

        $result = $db::table('users')->where('name', $name)->first();

        //compared with the existing names
        if ($result->name == $name) {
            echo 'that name is already taken';
        } else {
            $db::table('users')->insert([
                ['name' => $name, 'password' => $password]
            ]);


        }


    }

    protected function createUserTables($name)
    {
        //init
        $db = DataBase::getInstance();

        $result = $db::table('users')->where('name', $name)->first();

        $db::table('usersRating')->insert([['userId' => $result->id, 'mark' => 'nothing']]);
        $db::table('usersStates')->insert([['userId' => $result->id, 'state' => 'down']]);
        $db::table('userStatus')->insert([['userId' => $result->id, 'callCount' => 0, 'timeCount' => 0]]);

    }


}