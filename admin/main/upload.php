<?php
include("../../connection.php");

// ตรวจสอบว่ามีการส่งไฟล์รูปภาพมาหรือไม่
if ($_FILES['image']['error'] == 0) {
    // กำหนดที่อยู่ที่จะบันทึกไฟล์
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($_FILES['image']['name']);

    // ตรวจสอบว่าไฟล์ภาพมีนามสกุลที่ถูกต้องหรือไม่ (เช่น jpg, png)
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowedExtensions = array('jpg', 'jpeg', 'png');

    if (in_array($imageFileType, $allowedExtensions)) {
        // บันทึกไฟล์ภาพ
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // บันทึกข้อมูลไฟล์ภาพลงในฐานข้อมูล
            $imageName = basename($_FILES['image']['name']);
            $imagePath = $target_file;

            $sql = "INSERT INTO imagelogo (ImageName, ImagePath) VALUES (?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $imageName);
            $stmt->bindParam(2, $imagePath);

            if ($stmt->execute()) {
                echo "Image uploaded successfully.";
                header('Location: index.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
    }
} else {
    echo "Error uploading file. Please try again.";
}

?>
