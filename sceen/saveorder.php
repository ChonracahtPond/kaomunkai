<?php
session_start();
if ($_SESSION['Userlevel'] != 'M') {
    header("Location: logout.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("../connection.php");

    // Get user ID and total amount from the session
    $userID = $_SESSION['UserID'];
    $totalAmount = $_SESSION['total'];

    // Insert order details into the orders table
    $insertOrderQuery = "INSERT INTO orders (user_id, total_amount, order_date) VALUES ('$userID', '$totalAmount', NOW())";
    mysqli_query($con, $insertOrderQuery);

    // Get the order ID of the newly inserted order
    $orderID = mysqli_insert_id($con);

    // Insert order items into the order_items table
    foreach ($_SESSION['cart'] as $menu_id => $qty) {
        $menuQuery = mysqli_query($con, "SELECT * FROM menu WHERE menu_id = '$menu_id'");
        $menuRow = mysqli_fetch_assoc($menuQuery);

        $menuItemName = $menuRow['menu_name'];
        $menuItemPrice = $menuRow['price'];
        $itemTotal = $menuItemPrice * $qty;

        $insertOrderItemQuery = "INSERT INTO order_items (order_id, menu_id, menu_name, quantity, price, total) VALUES ('$orderID', '$menu_id', '$menuItemName', '$qty', '$menuItemPrice', '$itemTotal')";
        mysqli_query($con, $insertOrderItemQuery);
    }

    // Clear the shopping cart
    unset($_SESSION['cart']);
    unset($_SESSION['total']);

    // Redirect to a success page or display a success message
    header("Location: success.php");
    exit;
} else {
    // If the form is not submitted, redirect to the ordering page
    header("Location: ordering.php");
    exit;
}
?>
