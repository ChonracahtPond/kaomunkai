<?php
session_start();

if ($_SESSION['Userlevel'] != 'M') {
    header("Location: logout.php");
    exit; // Ensure script stops execution after redirect
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection code
    require_once '../../../connection.php';

    // Validate and sanitize form data
    $menu_name = $_POST['menu_name'];
    $price = $_POST['price'];

    // Check if the "menu_image" key is set in the $_FILES array
    if (isset($_FILES['menu_image'])) {
        $menu_image = $_FILES['menu_image'];

        // Specify the target directory
        $targetDir = "path/to/uploaded/images/";

        // Create the target directory if it doesn't exist
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Specify the target file path
        $targetFile = $targetDir . basename($menu_image['name']);

        // ... rest of the file upload and database insert code ...

        // Move the uploaded file to the target directory
        if (move_uploaded_file($menu_image['tmp_name'], $targetFile)) {
            // File uploaded successfully
            echo "File is valid, and was successfully uploaded.";
            header("Location: ../main.php");
        } else {
            // Error uploading the file
            echo "Error uploading the file.";
        }
    } else {
        // "menu_image" key not set in $_FILES array
        echo "Error: File input not set.";
    }
}
?>
