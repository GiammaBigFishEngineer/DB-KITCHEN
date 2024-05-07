<?php

require_once('BaseModel.php');

class CuocoModel extends BaseModel
{
    public static string $nome_tabella = 'CUOCO';
    protected array $_fields = [
        "codice_fiscale_cuoco",
        "codice_fiscale", #lo stesso dell'id
        "grado", #char
    ];


    public function mansioni($data) {
        // Query per recuperare l'hash della password dal database
        // data in formato date mysql dd-mm-yy
        $codice_fiscale_cuoco = $this->codice_fiscale_cuoco;
        $query = "SELECT * FROM PREPARAZIONE P1 JOIN prepara P2 ON 
            P1.idPreparazione = P2.idPreparazione 
            WHERE P1.data = date('$data') AND P2.codice_fiscale_cuoco = :codice_fiscale_cuoco;";
        $stmt = DB::get()->prepare($query);
        $stmt->execute([
            'codice_fiscale_cuoco'=>$codice_fiscale_cuoco,
        ]);
        $ris = $stmt->fetch(PDO::FETCH_ASSOC);
        return $ris;
    }  

    public function assegnaPreparazione($idPreparazione) {
        $codice_fiscale_cuoco = $this->codice_fiscale_cuoco;
        $query = "INSERT INTO prepara values(:codice_fiscale_cuoco, :id)";
        $stmt = DB::get()->prepare($query);
        $succ = $stmt->execute([
            'codice_fiscale_cuoco'=>$codice_fiscale_cuoco,
            'id' => $idPreparazione
        ]);
        return $succ;
    }
    
    public static function get($codice_fiscale) {
        $query = "SELECT * FROM " . static::$nome_tabella  . " WHERE codice_fiscale_cuoco=:id";
        $sth = DB::get()->prepare($query);
        $sth->execute([
            'id' => $codice_fiscale,
        ]);
        $row = $sth->fetch();
        return new static($row);
    }

}