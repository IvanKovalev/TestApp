<?php


namespace IvanKovalev\app\controller;

use IvanKovalev\app\model\MonitoringModel;

class Monitoring
{
    public function monitoring()
    {    //init
        $monitoringModel = new MonitoringModel();

       $result = $monitoringModel->monitoring();
        require_once 'app/view/monitoringPage.php';
    }
}