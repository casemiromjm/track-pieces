<?php
declare(strict_types=1);

require_once(__DIR__.'/../templates/common.php');
require_once(__DIR__.'/../utils/session.php');

$session = new Session();

$qrcode_data = $session->get('qrcode-data');
$qrcode_imgpath = $session->get('qrcode-imgpath');

$session->unset(['qrcode-data', 'qrcode-imgpath']);

$piece_types = [
    'travessa',
    'copo',
    'taça',
    //TO ADD
];
sort($piece_types);

drawHead();
?>
    <div>
        <h1>Adicionar nova peça</h1>
        <form method='POST' action="/actions/add_piece.php" enctype="multipart/form-data">
            <!-- somente 1 foto -->
            <label for="piece-photo">Foto da peça</label>
            <input type="file" id="piece-photo" name="piece-photo" accept="image/*" capture="environment" required>

            <!-- pegar da lista hard-coded -->
            <label for="piece-type">Tipo da peça</label>
            <select id="piece-type" name="piece-type" required>
                <?php foreach ($piece_types as $type): ?>
                    <option value="<?= htmlspecialchars($type) ?>"><?= ucfirst($type) ?></option>
                <?php endforeach; ?>
            </select>

            <!-- precisa ajeitar o input; colocar tudo em minuscula -->
            <label for="piece-brand">Marca da peça</label>
            <input type="text" id="piece-brand" name="piece-brand" required>

            <label for="piece-value">Valor da peça</label>
            <div>
                <span>R$</span>
                <input type="number" id="piece-value" name="piece-value" min="0" step="0.01" inputmode="decimal" required>
            </div>
            
            <label for="qnt-piece">Quantidade</label>
            <input type="number" id="qnt-piece" name="qnt-piece" min="0" required>

            <label for="qrcode">Código Qrcode</label>
            <input type="text" id="qrcode" name="qrcode" value="<?= htmlspecialchars($qrcode_data ?? '000000')?>" readonly>
            <script src="../js/download.js"></script>
            <button onclick="downloadQR()" class="download-btn" qrcode-path="<?= '.' . $qrcode_imgpath ?>">Baixar Qrcode</button>

            <button type="submit">Adicionar peça</button>
        </form>
    </div>
<?php

drawFoot();

?>