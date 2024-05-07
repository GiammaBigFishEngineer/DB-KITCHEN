<?php

require_once dirname(__DIR__) . "/views/StatsView.php";
require_once dirname(__DIR__) . "/models/StatsModel.php";

class StatsController
{

    public static function showStats()
    {
        $data_i = isset($_GET['date_i']) ? $_GET['date_i'] : '0000-01-01';
        $data_f = isset($_GET['date_f']) ? $_GET['date_f'] : '0000-01-01';
        $stats = new StatsModel($data_i, $data_f);
        //rendering template
        $view = new StatsView();
        $view->render($stats, $data_i, $data_f);
    }
    
}
