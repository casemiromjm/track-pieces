<?php
declare(strict_types=1);

/**
 * Draws header
 */
function drawHeader() {

}

/**
 * Draws Head HTML
 */
function drawHead() {
    // $base_stylesheet = __DIR__ . '/../css/base.css';
    // <link rel="stylesheet" href=<?=$base_stylesheet>
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/favicon.png">
    <title>Controle do Almoxarifado</title>
</head>
<body>
<?php } ?>


<?php
/**
 * Draws footer
 */
function drawFooter () {
?>

    <footer>@casemiromjm 2025</footer>

<?php
}

/**
 * Draws Foot HTML
 */
function drawFoot() {

    drawFooter();
?>

</body>
</html>

<?php } ?>
