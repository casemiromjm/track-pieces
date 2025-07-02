<?php

require_once(__DIR__.'/../templates/common.php');

drawHead();

?>
    <div>
        <form>
            <label>Foto da peça</label>
            <input required>

            <label for="piece-name">Nome da peça</label>
            <input type="text" id="piece-name" name="piece-name" required>

            <label>Tipo da peça</label>
            <input required>

            <label>Marca da peça</label>
            <input required>

            <label for="piece-value">Valor da peça</label>
            <input type="number" id="piece-value" name="piece-value" value="R$ " min="0" required>

            <label for="qnt-piece">Quantidade</label>
            <input type="number" id="qnt-piece" name="qnt-piece" min="0" required>

            <label>Código Qrcode</label>
            <input type="number" value="123456" disabled>

            <button>Adicionar peça</button>
        </form>
    </div>
<?php

drawFoot();

?>