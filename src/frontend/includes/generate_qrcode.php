<?php
    require_once("../template/header.html");

    shell_exec("python3 ../../backend/qr.py");

    echo "Qrcode gerado com sucesso";
?>

<button>Download</button>
<a href="../index.php">Voltar para o início</a>

<?php
require_once("../template/footer.html");
?>