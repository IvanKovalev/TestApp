<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 11.04.2016
 * Time: 3:04
 */

namespace IvanKovalev\app\model;

use IvanKovalev\app\lib\DataBase;

class WriteResultModel
{
    public function  writeResults($name, $mark)
    {

        $db = DataBase::getInstance();
        $user = $db::table('users')->where('name', $name)->first();

            if ($mark == 'good' || $mark == 'bad' ||  $mark == 'nothing') {
                $db::table('usersRating')
                    ->where('userId', $user->id)
                    ->update(['mark' => $mark]) or die('ERROR');
            }else{
                echo 'param "mark" can be only : "good" , "bad" or "nothing" ';
            }

        }


}