<?php
session_start();
$data  = $_SESSION["listaM"];

$db = new SQLite3('MyDb.db');
// Inserisci dati nella tabella usando prepared statements
$stmt = $db->prepare('INSERT INTO movie (titolo, anno, regista, img, genere, trama) VALUES (:titolo, :anno,:regista,:img, :genere,:trama   )');
$stmt->bindValue(':titolo', $data['Title'], SQLITE3_TEXT);
    $stmt->bindValue(':anno', $data['Year'], SQLITE3_TEXT);
    $stmt->bindValue(':regista', $data['Director'], SQLITE3_TEXT);
    $stmt->bindValue(':img', $data['Poster'], SQLITE3_TEXT);
    $stmt->bindValue(':genere', $data['Genre'], SQLITE3_TEXT);
    $stmt->bindValue(':trama', $data['Plot'], SQLITE3_TEXT);
 // Esegui la query e controlla il risultato
 if ($stmt->execute()) {
    echo "Nuovo film inserito con successo.";
} else {
    echo "Errore nell'inserimento del film: " . $db->lastErrorMsg();
}   




?>
<form action = "home.php" method = 'get'>
    <input type = "submit" value = "Torna alla home">
</form>