<?php

require_once('BaseView.php');

class DispensaView extends BaseView
{
    public function render($dispensa)
    {
        echo $this->twig->render('cucina/dispensa.html.twig', [
            'dispensa' => $dispensa
        ]);
    }

}
