<?php
 include("../../connection.php");
// รับค่าจากฟอร์ม
$specialmenu_name = $_POST['specialmenu_name'];
$price = $_POST['price'];

// อัพโหลดรูปภาพ
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES['image']['name']);
move_uploaded_file($_FILES["image"]["name"], $target_file);
$images_specialmenu = $target_file;


// เพิ่มข้อมูลลงในฐานข้อมูล
$sql = "INSERT INTO specialmenu (specialmenu_name, price, images_specialmenu) VALUES ('$specialmenu_name', $price, '$images_specialmenu')";

if ($conn->query($sql) === TRUE) {
    echo "Record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->errorInfo()[2]; // ใช้ errorInfo แทน error
}



?>
