<?php

require_once('BaseModel.php');

class DispensaModel extends BaseModel
{
    public static string $nome_tabella = 'DISPENSA';
    protected array $_fields = [
        "idProdotto",
        "prezzo", 
        "data_scadenza",
        "data_arrivo",
        "temperatura_conservazione",
        "nome", #riferimento a CATALOGO_PRODOTTI
        "idRistorante",
        "quantita",
    ];

    public static function get(int $id)
    {
        $query = "SELECT * FROM " . static::$nome_tabella  . " WHERE idProdotto=:id";
        $sth = DB::get()->prepare($query);
        $sth->execute([
            'id' => $id,
        ]);
        $row = $sth->fetch();

        return new static($row);
    }


}