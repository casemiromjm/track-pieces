<?php
declare(strict_types=1);

require_once(__DIR__ . '/../templates/common.php');
require_once(__DIR__ . '/../utils/session.php');

$session = new Session();

if (!$session->exists('qr')) {
    header("Location: menu.php");
    exit;
}

$qr_uri = $session->get('qr');
$session->unset('qr');

drawHead();
?>

<div class="qr-container">
    <h1>QR Code Gerado</h1>
    <div class="qr-code">
        <img id="qr-image" src="<?= $qr_uri ?>" alt="QR code gerado por último">
    </div>

    <form method="POST" action="/actions/generate_qrcode.php">
        <button type="submit" name="generate_qrcode">Gerar outro QR code</button>
    </form>
    <button onclick="downloadQR()" class="download-btn">Download</button>
    <a href="menu.php" class="back-btn">Voltar ao início</a>

    <script src="../js/download.js"></script>
</div>

<?php
drawFoot();
?>