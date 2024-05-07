<?php

// Configurazione per la connessione al database MySQL
$servername = "localhost"; // Nome del server MySQL
$username = "root"; // Nome utente del database
$password = "topolino03"; // Password del database
$database = "RELATIONS"; // Nome del database
$sql_file = "queries.sql"; // Percorso del file SQL

$conn = new mysqli($servername, $username, $password);

// Query per creare il database RELATIONS
$sql_create_db = "CREATE DATABASE IF NOT EXISTS RELATIONS";

if ($conn->query($sql_create_db) === TRUE) {
    echo "Database 'RELATIONS' creato con successo";
} else {
    echo "Errore nella creazione del database: " . $conn->error;
}


// Ottieni il percorso completo del file SQL
$sql_file_path = __DIR__ . DIRECTORY_SEPARATOR . $sql_file;

// Connessione al database
$conn = new mysqli($servername, $username, $password, $database);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Verifica se il file SQL esiste
if (!file_exists($sql_file_path)) {
    die("File SQL non trovato: " . $sql_file_path);
}

// Leggi il contenuto del file SQL
$sql_content = file_get_contents($sql_file_path);


// Suddividi il contenuto del file SQL in singole query
$queries = explode(';', $sql_content);

// Esegui ogni singola query
foreach ($queries as $query) {
    // Ignora le query vuote (ad esempio alla fine del file)
    if (trim($query) != '') {
        if ($conn->query($query) === FALSE) {
            echo "Errore nell'esecuzione della query: " . $conn->error;
            break;
        }
    }
}

// Chiusura della connessione al database
$conn->close();

?>
