<?php

require_once dirname(__DIR__) . "/models/ContoModel.php";
require_once dirname(__DIR__) . "/models/OrdineModel.php";
require_once dirname(__DIR__) . "/models/CameriereModel.php";
require_once dirname(__DIR__) . "/models/MenuModel.php";
require_once dirname(__DIR__) . "/views/SaloneView.php";

class SaloneController
{

    public static function showSalone()
    {
        $conti = ContoModel::all();
        $ordini = OrdineModel::all();
        $menu = MenuModel::all();

        $data = isset($_GET['data']) ? $_GET['data'] : false;
        if ($data) {
            $conti = ContoModel::filterConti($data);
        }
        foreach ($ordini as $ordine) {
            // Assegna il valore restituito dal metodo 'mansioni' al campo 'mansioni' dell'oggetto cuoco
            $ordine->portate_arr = $ordine->showPortate();
        }
        //rendering template
        $view = new SaloneView();
        $view->render($conti, $ordini, $data, $menu);
    }
    
    public static function saveOrdine(){
        $obj = new OrdineModel(array(
            "idOrdine" => $_POST['idOrdine'],
            "data" => $_POST['data'],
            "orario" => $_POST['orario'],
            "codice_fiscale_cameriere" => $_POST['codice_fiscale_cameriere'],
            "idRistorante" => $_POST['idRistorante'],
            "numero_tavolo" => $_POST['numero_tavolo']
        ));
        $idPortata = $_POST['id_portata'];
        try {
            $id = $obj->save();
            $obj->assegnaPortata($idPortata);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $err) {
            echo $err;
        }
    }
}
