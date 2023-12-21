<?php
require_once 'phpqrcode/qrlib.php';
$path = 'images/';
$qecode = $path.time().".png";
QRcode :: png("Tech Area" , $qrcode ,'H',4,4);
echo "<img src='".$qrcode."'>";

?>