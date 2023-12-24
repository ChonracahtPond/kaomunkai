<?php
session_start();
    include("../connection.php");

	// Check if the form is submitted
	if(isset($_POST['Submit2']))
	{
		// Get the total price from the session
		$total_price = $_SESSION['total'];

		// Insert order into the orderdetail table
		$sql_order = "INSERT INTO orderdetail (menu_id, quantity, total_price) VALUES ";
		foreach($_SESSION['cart'] as $menu_id => $qty)
		{
			$sql_order .= "($menu_id, $qty, ($qty * (SELECT price FROM menu WHERE menu_id = $menu_id))), ";
		}
		$sql_order = rtrim($sql_order, ", "); // Remove the trailing comma
		mysqli_query($con, $sql_order);


		// Clear the shopping cart
		unset($_SESSION['cart']);

