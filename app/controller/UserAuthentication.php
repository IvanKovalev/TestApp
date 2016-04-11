<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 05.04.2016
 * Time: 0:04
 */

namespace IvanKovalev\app\controller;

use IvanKovalev\app\model\UserModel;

class UserAuthentication
{
    public function welcome()
    {
        require_once 'app/view/autorisationPage.php';
    }

    public function login()
    {

        $userModel = new UserModel();

        if ($_POST['user'] && $_POST['pwd']) {

            if ($userModel->login($_POST['user'], $_POST['pwd'])) {
                header('location:/');
                require_once 'app/view/autorisationPage.php';


            } else {
                require_once 'app/view/autorisationPage.php';
                echo 'wrong username or password';

            }


        } else {
            require_once 'app/view/autorisationPage.php';
        }

    }

    public function logout()
    {   unset($_SESSION['users'][$_COOKIE['userID']]);
        setcookie('user', null, -1, '/');
        setcookie('userID', null, -1, '/');

        header('location:/');
    }

    public function registration()
    {
        $userModel = new UserModel();

        if ($_POST['user'] && $_POST['pwd'] && $_POST['pwdConfirm']) {
            if($_POST['pwd'] == $_POST['pwdConfirm']){
                $userModel->registration($_POST['user'], $_POST['pwd']);
                require_once 'app/view/autorisationPage.php';
            }else{
                echo 'password and pwdConfirm do not match';
                require_once 'app/view/registrationPage.php';
            }

        } else {
            require_once 'app/view/registrationPage.php';
        }


    }


}