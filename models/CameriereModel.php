<?php

require_once('BaseModel.php');

class CameriereModel extends BaseModel
{
    public static string $nome_tabella = 'CAMERIERE';
    protected array $_fields = [
        "codice_fiscale_cameriere",
        "codice_fiscale", //lo stesso dell'id
    ];

    //Override
    public static function get($codice_fiscale) {
        $query = "SELECT * FROM " . static::$nome_tabella  . " WHERE codice_fiscale_cameriere=:id";
        $sth = DB::get()->prepare($query);
        $sth->execute([
            'id' => $codice_fiscale,
        ]);
        $row = $sth->fetch();
        return new static($row);
    }

}