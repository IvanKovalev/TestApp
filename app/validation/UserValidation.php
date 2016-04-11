<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 08.04.2016
 * Time: 0:12
 */

namespace IvanKovalev\app\validation;


class UserValidation
{
    public function name($name)
    {   //here mast bee other rules
        $name = $this->test_input($name);
        return $name;
    }

    public function password($password)
    {   //here mast bee other rules
        $password = $this->test_input($password);
        return $password;
    }

    protected function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


}