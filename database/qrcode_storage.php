<?php

require_once(__DIR__ . '/../utils/qrcode_generator.php');
require_once(__DIR__ . '/../utils//qrcode_result.php');
require_once('db.php');


class QrcodeStorage {
    // members
    private PDO $db;

    // methods
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function saveQrcode(QrcodeResult $qr_result) {
        // queria fazer com q o codigo fosse gerado novamente
        if (!$this->isQrcodeUnique($qr_result)) {
            header('Location: ../pages/menu.php?error=duplicate-code');
            exit;
        }

        try {
            $stmt = $this->db->prepare('INSERT INTO Qrcode (qrcode_num, qrcode_img) VALUES (:qr_data, :qr_img_path)');
        
            $qr_data = $qr_result->getData();

            $fileExtension = match ($qr_result->getFileExt()) {
                'svg' => '.svg',
                default => '.png',
            };

            $stmt->execute([
                ':qr_data' => $qr_data,
                ':qr_img_path' => '/database/qr/' . $qr_data . $fileExtension,
            ]);

            $qr_result->saveToFile(__DIR__ . '/database/qr/' . $qr_data . $fileExtension);

        } catch (Exception $e) {
            die('An error occured storing the qrcode: ' . $e->getMessage());
        }

        return 0;
    }

    private function isQrcodeUnique(QrcodeResult $qr_result) : bool {

        try {
            $stmt = $this->db->prepare('SELECT 1 FROM Qrcode WHERE qrcode_num = :qrcode_data LIMIT 1');
            $stmt->execute([':qrcode_data' => $qr_result->getData()]);


            // no matches: false === false -> TRUE
            // found a match: true === false -> FALSE

            return $stmt->fetch() === false;
        } catch (PDOException $e) {
            throw new RuntimeException('An error occured while checking qrcode uniqueness: ' . $e->getMessage());
        }
    }
}


?>