<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 02.04.2016
 * Time: 2:05
 */

namespace IvanKovalev\app\controller;

use IvanKovalev\app\model\TeacherModel;


class SelectStudent
{
    public function selectStudent()
    {
        $TeacherModel = new TeacherModel();
        $TeacherModel->selectUser();
    }

}