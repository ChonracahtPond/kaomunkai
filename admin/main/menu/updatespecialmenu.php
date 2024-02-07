<?php
// Handle form submission for updating the menu record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize form data
    $specialmenu_id = $_POST['specialmenu_id'];
    $specialmenu_name = $_POST['specialmenu_name'];
    $price = $_POST['price'];
    $images_specialmenu = $_POST['images_specialmenu'];

    require_once '../../../connection.php';
    $stmt = $conn->prepare("UPDATE specialmenu SET specialmenu_name = :specialmenu_name, price = :price, images_specialmenu = :images_specialmenu WHERE specialmenu_id = :specialmenu_id");
    
    $stmt->bindParam(':specialmenu_name', $specialmenu_name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':images_specialmenu', $images_specialmenu);
    $stmt->bindParam(':specialmenu_id', $specialmenu_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ../main.php"); // Change to the actual list page URL
        exit;
    } else {
        // Handle the update error, e.g., display an error message or redirect back to the edit page with an error flag
        echo "Error updating menu: " . $stmt->errorInfo()[2];
    }
}
?>
