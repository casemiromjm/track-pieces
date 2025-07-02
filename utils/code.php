<?php
declare(strict_types=1);

class RandomCodeGenerator {
    // members
    private int $QR_CODE_SIZE = 6;

    // methods

    public function __construct() {
        
    }

    /**
     * Creates a random code with QR_CODE_SIZE digits
     * @return string code The random code generated
    */
    public function generate() : string {

        $code = 0;

        for ($i = 0; $i < $this->QR_CODE_SIZE; $i++) {
            if ($i == 0) {
                $n = random_int(1,9);
            } else {
                $n = random_int(0,9);
            }

            $code += $n*(10**($this->QR_CODE_SIZE-($i+1)));
        }

        return (string)$code;
    }
}

?>