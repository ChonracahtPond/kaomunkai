<?php
require_once '../../../connection.php'; // เรียกไฟล์เชื่อมต่อฐานข้อมูล

if (isset($_GET['specialmenu_id'])) {
    $specialmenu_id = $_GET['specialmenu_id'];
    
    // ตรวจสอบว่า specialmenu_id ที่รับมาถูกต้องหรือไม่
    $stmt = $conn->prepare("SELECT * FROM specialmenu WHERE specialmenu_id = :specialmenu_id");
    $stmt->bindParam(':specialmenu_id', $specialmenu_id);
    $stmt->execute();
    $result = $stmt->fetch();
    
    if ($result) {
        // ถ้าพบข้อมูลผู้ใช้ ให้ลบข้อมูล
        $stmt = $conn->prepare("DELETE FROM specialmenu WHERE specialmenu_id = :specialmenu_id");
        $stmt->bindParam(':specialmenu_id', $specialmenu_id);
        $stmt->execute();
        header("Location: ../main.php"); // ลิ้งกลับไปหน้าหลักหลังจากลบข้อมูล
    } else {
        echo "ไม่พบข้อมูลผู้ใช้ specialmenu_id: $specialmenu_id";
    }
} else {
    echo "ไม่ระบุ specialmenu_id ที่ต้องการลบ";
}
?>
