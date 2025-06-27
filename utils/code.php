<?php
declare(strict_types=1);

define('QRCODE_CODE_SIZE', 6);

/**
 * Creates a random code with QRCODE_CODE_SIZE digits
 * @return code The random code generated
 */
function generateRandomCode() {

    $code = 0;

    for ($i = 0; $i < QRCODE_CODE_SIZE; $i++) {
        if ($i == 0) {
            $n = random_int(1,9);
        } else {
            $n = random_int(0,9);
        }

        $code += $n*(10**(QRCODE_CODE_SIZE-($i+1)));
    }

    return $code;
}

?>