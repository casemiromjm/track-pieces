<?php
declare(strict_types=1);

require_once('piece.php');

class PieceStorage {
    // members

    private PDO $db;

    // methdos

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function savePiece(Piece $piece) {
        $stmt = $this->db->prepare('INSERT INTO Piece (piece_photo, type, brand, value, quantity, qrcode, purchase_date) VALUES (:img_path, :piece_type, :piece_brand, :piece_value, :piece_qnt, :piece_qrcode, :purchase_date)');
        $stmt->execute([
            ':img_path' => $piece->getImgPath(),
            ':piece_type' => $piece->getType(),
            ':piece_brand' => $piece->getBrand(),
            ':piece_value' => $piece->getValue(),
            ':piece_qnt' => $piece->getQuantity(),
            ':piece_qrcode' => $piece->getQrcodeData(),
            ':purchase_date' => $piece->getPurchaseDate(),
        ]);

    }

    public function getLastPiece() {
        $stmt = $this->db->prepare('SELECT * FROM Piece ORDER BY rowid DESC LIMIT 1');
        $stmt->execute();

        $lastPiece = $stmt->fetch(PDO::FETCH_ASSOC);

        return $lastPiece ?? '';
    }
}

?>