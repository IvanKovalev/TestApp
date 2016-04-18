<?php


namespace IvanKovalev\app\model;

use IvanKovalev\app\lib\DataBase;

class TeacherModel
{

    public function selectUser()
    {
        $db = DataBase::getInstance();

        $readyToCall = array();
        $users = $db::table('usersStates')->where('state', 'up')->get(['userId']);

        foreach ($users as $user) {

            $statusParam = $db::table('userStatus')->where('userId', $user->userId)->first();
            if ($statusParam->callCount == 0 && strtotime($statusParam->timeCount) + 60 < strtotime(date('H:i:s'))) {
                $userName = $db::table('users')->where('id', $user->userId)->get(['id', 'name']);

                array_push($readyToCall, $userName);
            }
        }

        if (count($readyToCall) == 0) {
            echo "NOBODY";
        } else {
            var_dump($readyToCall);
            $randomUser = rand(0, count($readyToCall) - 1);
            $this->updateUserStatus($db, $readyToCall[$randomUser]);
        }

    }

    protected function updateUserStatus($db, $user)
    {
        $user = $user[0];
        $db::update('UPDATE userStatus SET callCount = 3 WHERE userId = ? ', array($user->id));
        $db::update('UPDATE userStatus SET timeCount=concat(NOW()) WHERE userId= ? ', array($user->id));
        $db::update('UPDATE  userStatus SET callCount = callCount -1 WHERE callCount !=0 OR userId = ?', array($user->id));
        $db::update('UPDATE  usersStates SET state = "down" WHERE  userId = ?', array($user->id));
        echo $user->name;
    }


}