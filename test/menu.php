<?php
include("../connection.php");

// Check if type_id is set in the URL
if (isset($_GET['type_id'])) {
    $type_id = $_GET['type_id'];
    
    // Validate $type_id to prevent SQL injection
    $type_id = mysqli_real_escape_string($con, $type_id);

    // Fetch menu data based on type_id
    $sql = "SELECT * FROM menu WHERE type_id = $type_id";
    $result = mysqli_query($con, $sql);

    // Check if the query was successful
    if ($result) {
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Menu</title>
        </head>
        <body>
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div>
                    <p><?php echo $row['menu_id']; ?></p>
                    <p><?php echo $row['menu_name']; ?></p>
                    <!-- Add other menu details as needed -->
                </div>
            <?php
            }
            ?>
        </body>
        </html>
<?php
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Type ID is not set in the URL.";
}

// Close the database connection
mysqli_close($con);
?>
