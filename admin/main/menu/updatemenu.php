<?php
// Handle form submission for updating the menu record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize form data
    $menu_id = $_POST['menu_id'];
    $menu_name = $_POST['menu_name'];
    $price = $_POST['price'];
    $type_id = $_POST['type_id'];
    $menu_image = $_POST['menu_image'];
    // $animal_Note = $_POST['Animal_Note'];
    // $owner_ID = $_POST['Owner_ID'];
    // $pet_TypeID = $_POST['Pet_TypeID'];
    // $species_ID = $_POST['Species_ID'];
    // $animal_Date = $_POST['Animal_Date'];

    // You should add more validation and sanitization as needed

    // Update the menu record in the database
    require_once '../../../connection.php';
    $stmt = $conn->prepare("UPDATE menu SET menu_name = :menu_name, price = :price, type_id = :type_id, menu_image = :menu_image WHERE menu_id = :menu_id");
    
    $stmt->bindParam(':menu_name', $menu_name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':type_id', $type_id);
    $stmt->bindParam(':menu_image', $menu_image);
    // $stmt->bindParam(':Animal_Note', $animal_Note);
    // $stmt->bindParam(':Owner_ID', $owner_ID);
    // $stmt->bindParam(':Pet_TypeID', $pet_TypeID);
    // $stmt->bindParam(':Species_ID', $species_ID);
    // $stmt->bindParam(':Animal_Date', $animal_Date);
    $stmt->bindParam(':menu_id', $menu_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Redirect to the menu list page or show a success message
        header("Location: ../main.php"); // Change to the actual list page URL
        exit;
    } else {
        // Handle the update error, e.g., display an error message or redirect back to the edit page with an error flag
        echo "Error updating menu: " . $stmt->errorInfo()[2];
    }
}
?>
