<?php
// database basic functions

function getDatabaseConnection() : PDO {
    $db = new PDO('sqlite:' . __DIR__ . '/pieces.db');

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $db;
}

?>