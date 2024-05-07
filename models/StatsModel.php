<?php

require_once('BaseModel.php');

class StatsModel extends BaseModel
{
    public $top_piatti;
    public $media_incasso;
    public $top_cuochi;


    public function __construct($date_i, $date_f)
    {
        $query1 = "SELECT CM.id_portata, M.nome_portata, COUNT(CM.idOrdine) as ordini
            FROM composto_menu CM JOIN MENU M ON CM.id_portata = M.id_portata
            GROUP BY CM.id_portata, M.nome_portata
            ORDER BY ordini DESC
            LIMIT 3;";
        $query2 = "SELECT AVG(totale) AS media
            FROM CONTO
            WHERE data BETWEEN '$date_i' AND '$date_f';";
        $query3 = "SELECT P.codice_fiscale_cuoco, COUNT(P.idPreparazione) as preparazioni
            FROM prepara P JOIN CUOCO C ON C.codice_fiscale_cuoco = P.codice_fiscale_cuoco
            GROUP BY P.codice_fiscale_cuoco
            ORDER BY preparazioni DESC
            LIMIT 4";

        $sth = DB::get()->prepare($query1);
        $sth->execute();
        $this->top_piatti = $sth->fetchAll();

        $sth = DB::get()->prepare($query2);
        $sth->execute();
        $this->media_incasso = $sth->fetch(PDO::FETCH_NUM);
        
        $sth = DB::get()->prepare($query3);
        $sth->execute();
        $this->top_cuochi = $sth->fetchAll();
    }




}