<?php

require_once('BaseView.php');

class StatsView extends BaseView
{
    public function render($stats, $data_i, $data_f)
    {
        echo $this->twig->render('stats.html.twig', [
            'stats' => $stats,
            'data_i' => $data_i,
            'data_f' => $data_f
        ]);
    }

}
