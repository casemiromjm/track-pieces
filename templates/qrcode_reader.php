<?php
function drawQrcodeReaderHead() {
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/favicon.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
    <script src="../js/qrcode_reader.js"></script>
    <title>Controle do Almoxarifado</title>
</head>
<body>

<?php } ?>

<?php

function drawQrcodeReader() {
?>
    <div>
        <h1>Buscar peça</h1>
        
        <div id="reader" style="width: 50%"></div>
        <form id="qrcode-form" method="POST" action="/actions/search_piece.php">
            <input id="qrcode-data" name="qrcode-data" type="text" hidden>
        </form>

        <script>
            document.addEventListener("DOMContentLoaded", () => startQrcodeScanner());
        </script>

        <a href="menu.php" class="back-btn">Voltar ao início</a>
    </div>

<?php } ?>
