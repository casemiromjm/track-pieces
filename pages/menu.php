<?php
declare(strict_types=1);

require_once(__DIR__ . '/../templates/common.php');

function handleError(string $err) : void {
    switch ($err) {
        case 'duplicate-code':
            echo '<script type="text/javascript">';
            echo 'alert("Error generating the qrcode data. Try again")';
            echo "</script>";
        break;
    }
}

drawHead();

$method = 'POST';
$actions = ['generate_qrcode' => 'Gerar Qrcode',
            'add_piece' => 'Adicionar peça',
            'search_piece' => 'Buscar peça'
        ];

if (isset($_GET['error'])) {
    handleError($_GET['error']);
}

foreach ($actions as $action => $name) {
?>
    <form method=<?=$method?> action=<?= '/actions/' . $action . '.php' ?>>
        <button type="submit" name=<?=$action?>><?=$name?></button>
    </form>
<?php
}
drawFoot();
?>
