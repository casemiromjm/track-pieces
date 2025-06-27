<?php
declare(strict_types=1);

require_once (__DIR__ . '/../templates/common.php');

if (!isset($qr_image) || empty($qr_image)) {
    header("Location: index.php");
    exit;
}

drawHead();
?>

<div class="qr-container">
    <h1>QR Code Gerado</h1>
    <div class="qr-code">
        <img src="data:image/png;base64,<?= base64_encode($qr_image) ?>" alt="QR code gerado por último" id="qr-image">
    </div>

    <form method="POST" action="/actions/generate_qrcode.php">
        <button type="submit" name="generate_qrcode">Gerar outro QR code</button>
    </form>
    <button onclick="downloadQR()" class="download-btn">Download</button>
    <a href="index.php" class="back-btn">Voltar ao início</a>

    <script src="../js/download.js"></script>
</div>

<?php
drawFoot();
?>