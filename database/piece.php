<?php
declare(strict_types=1);

require_once(__DIR__ . '/piece_storage.php');
require_once(__DIR__ . '/db.php');

class Piece {
    // members

    private string $img_path;
    private string $type;
    private string $brand;
    private float $value;
    private int $qnt;
    private string $qrcode_data;
    private string $purchase_date;
    private bool $isBroke = false;
    private bool $isInEvent = false;

    // methods

    public function __construct(string $img_path, string $type, string $brand, float $value, int $qnt, string $qrcode_data, string $purchase_date) {
        $this->img_path = $img_path;
        $this->type = $type;
        $this->brand = $brand;
        $this->value = $value;
        $this->qnt = $qnt;
        $this->qrcode_data = $qrcode_data;
        $this->purchase_date = $purchase_date;
    }

    public function isBroke() : bool {
        return $this->isBroke;
    }

    public function isInEvent() : bool {
        return $this->isInEvent;
    }

    public function setIsBroke(bool $val) : void {
        $this->isBroke = $val;
    }

    public function setIsInEvent(bool $val) : void {
        $this->isInEvent = $val;
    }

    public function getImgPath() : string {
        return $this->img_path;
    }

    public function getType() : string {
        return $this->type;
    }

    public function getBrand() : string {
        return $this->brand;
    }

    public function getValue() : float {
        return $this->value;
    }

    public function getQuantity() : int {
        return $this->qnt;
    }

    public function getQrcodeData() : string {
        return $this->qrcode_data;
    }

    public function getPurchaseDate() : string {
        return $this->purchase_date;
    }

    static function getPieceTypes() : array {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM PieceType');
        $stmt->execute();

        $pieceTypes = $stmt->fetchAll();

        return array_column($pieceTypes, 'type');
    }

    static function getPieceByQrcode(string $target_qrcode) : array {
        $db = getDatabaseConnection();

        $stmt = $db->prepare('SELECT * FROM Piece WHERE qrcode=:target_qrcode');
        $stmt->execute([':target_qrcode' => $target_qrcode]);

        $found_piece = $stmt->fetch();

        return $found_piece;
    }
}

?>