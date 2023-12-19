<?php
$host = "localhost"; // ชื่อเซิร์ฟเวอร์ MySQL
$username = "root"; // ชื่อผู้ใช้ MySQL
$password = ""; // รหัสผ่าน MySQL (ปล่อยว่างไว้ถ้าไม่มีรหัสผ่าน)
$database = "kaomunkai"; // ชื่อฐานข้อมูลที่คุณต้องการเชื่อมต่อ

// เชื่อมต่อกับ MySQL
$conn = new PDO("mysql:host=$host;dbname=kaomunkai", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$con= mysqli_connect("localhost","root","","kaomunkai") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' "); 

// echo "Connected successfully kaomunkai";


?>