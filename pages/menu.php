<?php
declare(strict_types=1);

require_once(__DIR__ . '/../templates/common.php');

function handleMessage(string $msg) : void {
    switch ($msg) {
        case 'duplicate-code':
            echo '<script type="text/javascript">';
            echo 'alert("Error generating the qrcode data. Try again")';
            echo "</script>";
            break;
        case 'added-piece':
            echo '<script type="text/javascript">alert("A peça foi adicionada!")</script>';
            break;
    }
}

drawHead();

$method = 'POST';
$actions = ['generate_qrcode' => 'Adicionar peça',
            'search_piece' => 'Buscar peça'
        ];

if (isset($_GET['msg'])) {
    handleMessage($_GET['msg']);
}

// when adding a piece, it goes first to generate_qrcode, then it goes to the actual add_piece page

foreach ($actions as $action => $name) {
?>
    <form method=<?=$method?> action=<?= '/actions/' . $action . '.php' ?>>
        <button type="submit" name=<?=$action?>><?=$name?></button>
    </form>
<?php
}
drawFoot();
?>
