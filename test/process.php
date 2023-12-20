<!-- process.php -->
<?php
include("../connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['type_id'])) {
        $type_id = $_POST['type_id'];
        // You may want to validate $type_id to prevent SQL injection
        header("Location: menu.php?type_id=$type_id");
        exit();
    }
}
?>
