<?php
include("../../connection.php");

// Function to add a new special menu
function addSpecialMenu($name, $price, $images)
{
    global $conn;
    $sql = "INSERT INTO specialmenu (specialmenu_name, price, images_specialmenu) VALUES (:name, :price, :images)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':images', $images);
    return $stmt->execute();
}


// Function to delete a special menu by ID
function deleteSpecialMenu($id)
{
    global $conn;
    $sql = "DELETE FROM specialmenu WHERE specialmenu_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    return $stmt->execute(); // Use execute instead of query
}

// Function to update a special menu by ID
function updateSpecialMenu($id, $name, $price, $images)
{
    global $conn;
    $sql = "UPDATE specialmenu SET specialmenu_name = :name, price = :price, images_specialmenu = :images WHERE specialmenu_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':images', $images);
    return $stmt->execute(); // Use execute instead of query
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Menu Operations</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body>
    <h1>Special Menu Operations</h1>
    <!-- <?php
    // Display existing special menus
    $result = $conn->query("SELECT * FROM specialmenu");
    if ($result->rowCount() > 0) {
        echo "<ul>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<li>{$row['specialmenu_name']} - \${$row['price']} - Image: {$row['images_specialmenu']}</li>";
        }
        echo "</ul>";
    } else {
        echo "No special menus available.";
    }
    ?> -->

    <!-- Form for adding a new special menu -->
    <h2>Add New Special Menu</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="price">Price:</label>
        <input type="number" name="price" step="0.01" required>
        <br>
        <label for="images">Image Path:</label>
        <input type="file" name="image" id="image" accept="image/*" />
        <br>
        <input type="submit" name="addSpecialMenu" value="Add Special Menu Upload Image">
    </form>
    <!-- <form action="upload.php" method="post" enctype="multipart/form-data">
              <input type="file" name="image" id="image" accept="image/*" />
              <br />
              <input type="submit" value="Upload Image" />
            </form> -->
    <?php
    // Handle form submission
    if (isset($_POST['addSpecialMenu'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $images = $_POST['images'];

        if (addSpecialMenu($name, $price, $images)) {
            echo "<p>New special menu added successfully!</p>";
        } else {
            echo "<p>Error adding special menu.</p>";
        }
    }
    ?>

</body>

</html>