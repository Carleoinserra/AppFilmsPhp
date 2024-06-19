<?php
try {
    // Collegati a un nuovo database (verrà creato se non esiste)
    $db = new SQLite3('MyDb.db');

    // Crea una tabella
    $query = 'CREATE TABLE IF NOT EXISTS movie(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        titolo TEXT NOT NULL,
        anno TEXT NOT NULL,
        regista TEXT NOT NULL,
        img TEXT NOT NULL,
        genere TEXT NOT NULL,
        trama TEXT NOT NULL
    )';
    $db->exec($query);

    // Query per verificare l'esistenza della tabella dipendenti
    $query = "SELECT name FROM sqlite_master WHERE type='table' AND name='movie';";
    $result = $db->query($query);

    // Controlla il risultato
    if ($result->fetchArray()) {
        echo "La tabella 'movie' esiste.";
    } else {
        echo "La tabella 'scarpe' non esiste.";
    }
    
} catch (Exception $e) {
    echo "Errore: " . $e->getMessage();
} finally {
    // Chiudi la connessione al database
    $db->close();
}
?>
