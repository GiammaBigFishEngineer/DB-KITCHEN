<?php

require_once('BaseModel.php');

class ContoModel extends BaseModel
{
    public static string $nome_tabella = 'CONTO';
    protected array $_fields = [
        "totale",
        "ordine",
        "idOrdine",
        "data"
    ];

    public static function filterConti($data) {
        $query = "SELECT * FROM CONTO WHERE data = date('$data');";
        $stmt = DB::get()->prepare($query);
        $stmt->execute();
        $ris = $stmt->fetch(PDO::FETCH_ASSOC);
        return $ris;
    }

}