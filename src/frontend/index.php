<?php
    $page_title = "Controle de Almoxarifado";
    require_once("./template/header.html");
?>
<!-- header included -->
    <form method="POST" action="./includes/generate_qrcode.php">
        <button type="submit" name="generate_qrcode">Gerar Qrcode</button>
    </form>
    <form method="POST" action="">
        <button type="submit" name="add_piece">Adicionar peça</button>
    </form>
    <form method="POST" action="">
        <button type="submit" name="search_piece">Buscar peça</button>
    </form>

<!-- footer included -->
<?php
    require_once("./template/footer.html");
?>
