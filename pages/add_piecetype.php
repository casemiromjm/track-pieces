<?php
declare(strict_types=1);

require_once(__DIR__.'/../templates/common.php');

drawHead();
?>

<main>
    <h1>Adicionar novo tipo de peças</h1>
    <form method="POST" action='/actions/add_piecetype.php'>
        <label for="new-piecetype">Novo tipo de peças</label>
        <input type="text" id="new-piecetype" name="new-piecetype" required>

        <button type="submit">Submit</button>
    </form>
    <a href="menu.php">Voltar ao início</a>
</main>

<?php drawFoot(); ?>