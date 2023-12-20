<?php
// include เพื่อเรียกใช้ไฟล์ connection.php
include("../connection.php");

// ตรวจสอบว่ามีการส่งค่า typemenu มาหรือไม่
if (isset($_POST['typemenu'])) {
    $typemenu_id = $_POST['typemenu'];

    // สร้างคำสั่ง SQL เพื่อดึงข้อมูลเมนูที่เชื่อมโยงกับประเภทเมนูที่ผู้ใช้เลือก
    $sql = "SELECT menu.menu_id, menu.menu_name, menu.price
            FROM menu
            WHERE menu.type_id = :typemenu_id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':typemenu_id', $typemenu_id);
    $stmt->execute();

    // แสดงผลลัพธ์
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        echo "<h2>Menu List</h2>";
        echo "<ul>";
        foreach ($result as $row) {
            echo "<li>{$row['menu_name']} - {$row['price']}</li>";
        }
        echo "</ul>";
    } else {
        echo "No menu available for the selected type.";
    }
}
?>
