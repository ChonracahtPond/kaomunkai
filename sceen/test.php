<?php
session_start();
if ($_SESSION['Userlevel'] != 'M') {
    Header("Location: logout.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shopping Cart</title>
    </head>

    <body>
        <h1>Shopping Cart</h1>

        <!-- Display textarea for additional details -->
        <form action="">
            <label for="additional_details">Additional Details:</label><br>
            <textarea id="additional_details" name="additional_details" rows="4" cols="50"></textarea><br>
            <input type="submit" value="Submit">
        </form>

        <?php
        // Check if form is submitted and display additional details if available
        if (isset($_GET['additional_details']) && !empty($_GET['additional_details'])) {
            $additional_details = $_GET['additional_details'];
            echo "<p>Additional Details: $additional_details</p>";
        }
        ?>

        <!-- Display items in the shopping cart -->
        <h2>Items in Cart:</h2>
        <!-- Your code to display items in the cart goes here -->
    </body>

    </html>
<?php } ?>
