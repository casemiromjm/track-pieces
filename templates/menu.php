<?php

/**
 * Draws the options menu
 */
function drawMenu() {

    $method = 'POST';
    $actions = ['generate_qrcode' => 'Gerar Qrcode',
                'add_piece' => 'Adicionar peça',
                'search_piece' => 'Buscar peça'
            ];

    foreach ($actions as $action => $name) {
?>
    <form method=<?=$method?> action=<?= '/../actions/' . $action . '.php' ?>>
        <button type="submit" name=<?=$action?>><?=$name?></button>
    </form>
<?php    
    }
}
?>
