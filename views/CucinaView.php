<?php

require_once('BaseView.php');

class CucinaView extends BaseView
{
    public function render($cuochi, $menu, $data)
    {
        echo $this->twig->render('cucina/cucina.html.twig', [
            'cuochi' => $cuochi,
            'menu' => $menu,
            'data' => $data
        ]);
    }

}
