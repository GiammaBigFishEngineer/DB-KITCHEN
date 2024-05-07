<?php

require_once('BaseView.php');

class SaloneView extends BaseView
{
    public function render($conti, $ordini, $data, $menu)
    {
        echo $this->twig->render('salone/salone.html.twig', [
            'conti' => $conti,
            'ordini' => $ordini,
            'data' => $data,
            'menu' => $menu
        ]);
    }

}
