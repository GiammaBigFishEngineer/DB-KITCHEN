<?php

require_once('BaseModel.php');

class OrdineModel extends BaseModel
{
    public static string $nome_tabella = 'ORDINE';
    protected array $_fields = [
        "idOrdine",
        "data",
        "orario",
        "codice_fiscale_cameriere",
        "idRistorante",
        "numero_tavolo"
    ];

    public function showPortate() {
        $idOrdine = $this->idOrdine;
        $query = "SELECT * 
            FROM composto_menu CM JOIN MENU M ON CM.id_portata = M.id_portata 
            WHERE idOrdine=$idOrdine";
        $stmt = DB::get()->prepare($query);
        $stmt->execute();
        $ris = $stmt->fetch(PDO::FETCH_ASSOC);
        return $ris;
    }

    public function assegnaPortata($idPortata) {
        $idOrdine = $this->idOrdine;
        echo $idOrdine;
        $query = "INSERT INTO composto_menu values(:idPortata, :idOrdine)";
        $stmt = DB::get()->prepare($query);
        $succ = $stmt->execute([
            'idPortata'=>$idPortata,
            'idOrdine' => $idOrdine
        ]);
        return $succ;
    }

    public static function get($idOrdine) {
        $query = "SELECT * FROM " . static::$nome_tabella  . " WHERE idOrdine=:id";
        $sth = DB::get()->prepare($query);
        $sth->execute([
            'id' => $idOrdine,
        ]);
        $row = $sth->fetch();
        return new static($row);
    }
}