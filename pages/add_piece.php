<?php

require_once(__DIR__.'/../templates/common.php');
require_once(__DIR__.'/../templates/qrcode_reader.php');

drawQrcodeReaderHead();
?>
<div>
    <h1>Ler QR code</h1>
    
    <div id="reader" style="width: 50%"></div>
    <p id="qrcode-data"></p>

    <script>
        const htmlQrcode = new Html5Qrcode("reader");
        htmlQrcode.start(
            {facingMode: "environment"},
            {},
            handleQrcodeScan
        ).catch(err => console.error("Error starting scanner:", err));
    </script>

    <a href="menu.php" class="back-btn">Voltar ao início</a>
</div>

<?php

drawFoot();

?>
