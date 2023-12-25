<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Special Menu</title>
</head>
<body>
    <h2>Add Special Menu</h2>
    <form action="process.php" method="post" enctype="multipart/form-data">
        <label for="specialmenu_name">Special Menu Name:</label>
        <input type="text" name="specialmenu_name" required><br>

        <label for="price">Price:</label>
        <input type="text" name="price" required><br>

        <label for="image">Upload Image:</label>
        <input type="file" name="image" accept="image/*" required><br>

        <input type="submit" value="Add Special Menu">
    </form>
</body>
</html>
