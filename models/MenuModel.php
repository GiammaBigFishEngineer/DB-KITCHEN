<?php

require_once('BaseModel.php');

class MenuModel extends BaseModel
{
    public static string $nome_tabella = 'MENU';
    protected array $_fields = [
        "prezzo",
        "nome_portata",
        "id_portata",
        "descrizione",
        "tempo_preparazione"
    ];

}