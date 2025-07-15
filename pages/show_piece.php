<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../templates/common.php');

$session = new Session();

$piece = $session->get('piece');
$session->unset('piece');

drawHead(); ?>
    <main>
        <h1>Detalhes da peça</h1>
    
<?php
if ($piece):
?>
    <div>
        <h2>Informações básicas</h2>
        <ul>
            <li><strong>Tipo:</strong> <?= htmlspecialchars($piece['type']) ?></li>
            <li><strong>Marca:</strong> <?= htmlspecialchars($piece['brand'] ?? 'N/A') ?></li>
            <li><strong>Valor:</strong> R$ <?= htmlspecialchars((string)$piece['value']) ?></li>
            <li><strong>Quantidade:</strong> <?= htmlspecialchars((string)$piece['quantity']) ?></li>
        </ul>

        <h2>Identificação</h2>
        <ul>
            <li><strong>QR Code:</strong> <?= htmlspecialchars($piece['qrcode']) ?></li>
            <li><strong>Foto:</strong> <img src="<?= '.' . htmlspecialchars($piece['piece_photo']) ?>" alt="Piece photo" style="max-width: 200px;"></li>
        </ul>

        <h2>Status</h2>
        <ul>
            <li><strong>Data de compra(YYYY-MM-DD):</strong> <?= htmlspecialchars($piece['purchase_date']) ?></li>
            <li><strong>Quebrada?:</strong> <?= $piece['isBroke'] ? 'Sim' : 'Não' ?></li>
            <li><strong>Está em um evento?:</strong> <?= $piece['isInEvent'] ? 'Sim' : 'Não' ?></li>
        </ul>
    </div>
    <?php else: ?>
        <p>Peça não registrada no sistema.</p>
    <?php endif; ?>
    </main>
<?php
drawFoot();
?>
