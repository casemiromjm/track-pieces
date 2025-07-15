<?php
// database basic functions

function getDatabaseConnection() : PDO {
    $db = new PDO('sqlite:' . __DIR__ . '/pieces.db');

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $db;
}

function getPieceType() : array {
    $db = getDatabaseConnection();
    $stmt = $db->prepare('SELECT * FROM PieceType');
    $stmt->execute();

    $pieceTypes = $stmt->fetchAll();

    return array_column($pieceTypes, 'type');
}

?>