<?php

require_once('BaseView.php');

class CucinaView extends BaseView
{
    public function render($cuochi, $menu)
    {
        echo $this->twig->render('cucina/cucina.html.twig', [
            'cuochi' => $cuochi,
            'menu' => $menu,
            'data' => $_GET['data']
        ]);
    }

}
