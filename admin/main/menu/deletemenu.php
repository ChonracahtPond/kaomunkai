<?php
require_once '../../../connection.php'; // เรียกไฟล์เชื่อมต่อฐานข้อมูล

if (isset($_GET['menu_id'])) {
    $menu_id = $_GET['menu_id'];
    
    // ตรวจสอบว่า menu_id ที่รับมาถูกต้องหรือไม่
    $stmt = $conn->prepare("SELECT * FROM menu WHERE menu_id = :menu_id");
    $stmt->bindParam(':menu_id', $menu_id);
    $stmt->execute();
    $result = $stmt->fetch();
    
    if ($result) {
        // ถ้าพบข้อมูลผู้ใช้ ให้ลบข้อมูล
        $stmt = $conn->prepare("DELETE FROM menu WHERE menu_id = :menu_id");
        $stmt->bindParam(':menu_id', $menu_id);
        $stmt->execute();
        header("Location: ../main.php"); // ลิ้งกลับไปหน้าหลักหลังจากลบข้อมูล
    } else {
        echo "ไม่พบข้อมูลผู้ใช้ menu_id: $menu_id";
    }
} else {
    echo "ไม่ระบุ menu_id ที่ต้องการลบ";
}
?>
