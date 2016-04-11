<?php


namespace IvanKovalev\app\model;

use IvanKovalev\app\lib\DataBase;

class MonitoringModel
{
    public function monitoring()
    {
        $db = DataBase::getInstance();
        $usersReady = $db::select('SELECT  usersStates.state as state , users.name as name FROM  usersStates LEFT JOIN users ON(users.id = usersStates.userId) WHERE usersStates.state = ?',array("up"));
        $usersMark = $db::select('SELECT  usersRating.mark as mark , users.name as name FROM  usersRating LEFT JOIN users ON(users.id = usersRating.userId)');

        return compact('usersMark','usersReady');
    }
}