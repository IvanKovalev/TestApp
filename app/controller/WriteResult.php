<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 02.04.2016
 * Time: 2:26
 */

namespace IvanKovalev\app\controller;

use IvanKovalev\app\model\WriteResultModel;

class WriteResult
{
    public function writeResult($name,$mark){

        $writeResult = new WriteResultModel();

        $writeResult->writeResults($name,$mark);
    }
}