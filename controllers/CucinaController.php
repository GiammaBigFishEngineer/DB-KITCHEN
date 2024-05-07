<?php

require_once dirname(__DIR__) . "/models/CuocoModel.php";
require_once dirname(__DIR__) . "/models/MenuModel.php";
require_once dirname(__DIR__) . "/models/DispensaModel.php";
require_once dirname(__DIR__) . "/models/PreparazioneModel.php";
require_once dirname(__DIR__) . "/views/CucinaView.php";
require_once dirname(__DIR__) . "/views/DispensaView.php";

class CucinaController
{

    public static function showCucina()
    {
        $cuochi = CuocoModel::all();
        $data = isset($_GET['data']) ? $_GET['data'] : '0000-01-01';

        foreach ($cuochi as $cuoco) {
            // Assegna il valore restituito dal metodo 'mansioni' al campo 'mansioni' dell'oggetto cuoco
            $cuoco->mansioni_arr = $cuoco->mansioni($data);
        }
        $menu = MenuModel::all();
        //rendering template
        $view = new CucinaView();
        $view->render($cuochi, $menu, $data);
    }

    public static function savePreparazione()
    {
        $obj = new PreparazioneModel(array(
            "idPreparazione" => $_POST['idPreparazione'],
            "pasto" => $_POST['pasto'],
            "descrizione" => $_POST['descrizione'],
            "data" => $_POST['data'],
            "id_portata" => $_POST['id_portata'],
        ));
        $cuoco = CuocoModel::get($_POST['codice_fiscale_cuoco']);
        
        try {
            $id = $obj->save();
            $insertion = $cuoco->assegnaPreparazione($id);
            if (!$insertion){
                echo "Inserimento non andato a buon fine";
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $err) {
            echo $err;
        }
    }

    public static function showDispensa() {
        $dispensa = DispensaModel::all();
        //rendering template
        $view = new DispensaView();
        $view->render($dispensa);
    }

    public function updateQuantita() {
        $idProd = $_POST['idProd'];
        $prod = DispensaModel::get($idProd);
        $prod->quantita = $_POST['quantita'];
        try {
            $id = $prod->save();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (Exception $err) {
            echo $err;
        }
    }


}
