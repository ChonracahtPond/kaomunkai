<?php
require_once '../../../connection.php'; // เรียกไฟล์เชื่อมต่อฐานข้อมูล

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    
    // ตรวจสอบว่า user_id ที่รับมาถูกต้องหรือไม่
    $stmt = $conn->prepare("SELECT * FROM user WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $result = $stmt->fetch();
    
    if ($result) {
        // ถ้าพบข้อมูลผู้ใช้ ให้ลบข้อมูล
        $stmt = $conn->prepare("DELETE FROM user WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        header("Location: ../forms.php"); // ลิ้งกลับไปหน้าหลักหลังจากลบข้อมูล
    } else {
        echo "ไม่พบข้อมูลผู้ใช้ user_id: $user_id";
    }
} else {
    echo "ไม่ระบุ user_id ที่ต้องการลบ";
}
?>
