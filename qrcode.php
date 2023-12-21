<!-- <?php
        require_once 'phpqrcode/qrlib.php';
        $path = 'images/';
        $qecode = $path . time() . ".png";
        QRcode::png("Tech Area", $qrcode, 'H', 4, 4);
        echo "<img src='" . $qrcode . "'>";

        ?> -->




<!-- <?php
        include('vendor/autoload.php');

        include('phpqrcode/qrlib.php');
        $file_name = "qrcode.png";
        $content = "Hello my name is Devdit";
        QRcode::png($content, $file_name, QR_ECLEVEL_L, 10);
        echo "<img src='{$file_name}'>";
        ?> -->



<?php
include('vendor/autoload.php'); // ตรวจสอบ path ที่ถูกต้องตามโครงสร้างของโปรเจกต์ของคุณ
use Zxing\QrReader;

$file_name = "qrcode.png";
$content = "Hello my name is Devdit";

$result = QRcode::png($content, $file_name, QR_ECLEVEL_L, 10);

if ($result === false) {
    var_dump(error_get_last());
} else {
    echo "<img src='{$file_name}'>";
}
?>