<?php
// Handle form submission for updating the user record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize form data
    $user_id = $_POST['user_id'];
    $Username = $_POST['Username'];
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];

    require_once '../../../connection.php';
    $stmt = $conn->prepare("UPDATE user SET Username = :Username, Firstname = :Firstname, Lastname = :Lastname WHERE user_id = :user_id");
    
    $stmt->bindParam(':Username', $Username);
    $stmt->bindParam(':Firstname', $Firstname);
    $stmt->bindParam(':Lastname', $Lastname);

    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Redirect to the user list page or show a success message
        header("Location: ../forms.php"); // Change to the actual list page URL
        exit;
    } else {
        // Handle the update error, e.g., display an error message or redirect back to the edit page with an error flag
        echo "Error updating user: " . $stmt->errorInfo()[2];
    }
}
?>
