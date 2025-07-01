<?php

require_once(__DIR__.'/../templates/common.php');

drawHead();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
<div>
    <h1>Ler QR code</h1>

    <script>
        const htmlQrcode = new Html5Qrcode("reader");
        htmlQrcode.start(
            {facing: "environment"},
            {},
            handleScan
        ).catch(err => console.error("Error starting scanner:", err));
    </script>
</div>

<?php

drawFoot();

?>
