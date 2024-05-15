<?php
/*
 * DISPATCHER BASATO SU MVC, OGNI URL USA UN CONTROLLER PER ACCEDERE 
 * AL MODELLO E INTERFACCIARSI CON UNA VIEW
*/
/*
    Mostra errori se online:
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
*/
/*
    ESempio di routing:
    case '/lista_clienti':
        LeadController::list();
        break;
*/

define('__ROOT__', dirname(__FILE__));

require_once(__ROOT__ . '/controllers/CucinaController.php');

session_start();

class Dispatcher
{
    private $method;
    private $path;

    public function __construct()
    {
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    }

    public function dispatch()
    {
        switch ($this->path) {
            
            case '/':
    
                break;

            case '/cucina':
                $controller = new CucinaController();
                $controller->showCucina();
                break;
            case '/dispensa':
                $controller = new CucinaController();
                $controller->showDispensa();
                break;
            case '/salva_preparazione':
                $controller = new CucinaController();
                $controller->savePreparazione();
                break;

            case '/salone':
                $controller = new SaloneController();
                $controller->showSalone();
                break;
            
            default:
                echo "404 HTML<br>";
                echo $this->path;
                break;
        }
    }
}

$dispatcher = new Dispatcher();
$dispatcher->dispatch();
