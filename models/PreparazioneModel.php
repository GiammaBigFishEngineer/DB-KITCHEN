<?php

require_once('BaseModel.php');

class PreparazioneModel extends BaseModel
{
    public static string $nome_tabella = 'PREPARAZIONE';
    protected array $_fields = [
        "idPreparazione",
        "pasto",
        "descrizione",
        "data",
        "id_portata"
    ];

}