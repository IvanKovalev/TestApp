<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 02.04.2016
 * Time: 0:54
 */

namespace IvanKovalev\app\controller;


use IvanKovalev\app\model\HandsUpModel;

class HandsUp
{
    public function handsUp($user,$state)
    {    //init
        $hands = new HandsUpModel();

        $hands->stateChange($user,$state);

    }
}