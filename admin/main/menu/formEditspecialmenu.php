<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-family-karla flex">

    <div class="container mx-auto p-4">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-2xl font-bold mb-4">แก้ไขเมนูพิเศษ</h1>

            <?php
            // Include the connection file
            require_once '../../../connection.php';

            // Check if specialmenu_id is set in the URL
            if (isset($_GET['specialmenu_id'])) {
                $specialmenu_id = $_GET['specialmenu_id'];

                // Fetch menu details from the database
                $stmt = $conn->prepare("SELECT * FROM specialmenu WHERE specialmenu_id = ?");
                $stmt->execute([$specialmenu_id]);
                $menu = $stmt->fetch();

                if ($menu) {
            ?>
                    <!-- Your HTML form for editing menu details goes here -->
                    <form action="updatespecialmenu.php" method="post">
                        <input type="hidden" name="specialmenu_id" value="<?= $menu['specialmenu_id']; ?>">
                        <div class="form-group">
                            <label for="specialmenu_name">ชื่อเมนูอาหาร :</label>
                            <input type="text" class="form-control" name="specialmenu_name" value="<?php echo $menu['specialmenu_name']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="price">ราคา :</label>
                            <input type="text" class="form-control" name="price" value="<?= $menu['price']; ?>">
                        </div>


                        <div class="form-group">
                            <label for="images_specialmenu">รูปภาพ:</label>
                            <input type="text" class="form-control" name="images_specialmenu" value="<?= $menu['images_specialmenu']; ?>">
                        </div>

                        <!-- <input type="submit" class="btn btn-primary" value="Update"> -->

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">บันทึกการแก้ไข</button>
                    </form>
            <?php
                } else {
                    echo "ไม่พบข้อมูลเมนูที่ต้องการแก้ไข";
                }
            } else {
                echo "ไม่ได้ระบุเมนูที่ต้องการแก้ไข";
            }
            ?>
        </div>
    </div>

</body>

</html>

<!-- <input type="hidden" name="specialmenu_id" value="<?= $animal['specialmenu_id']; ?>">

<div class="form-group">
        <label for="menu_name">ชื่อเมนูอาหาร :</label>
        <input type="text" class="form-control" name="menu_name" value="<?= $animal['menu_name']; ?>">
    </div>

    <div class="form-group">
        <label for="price">ราคา :</label>
        <input type="text" class="form-control" name="price" value="<?= $animal['price']; ?>">
    </div>

<div class="form-group">
    <label for="type_id">หมวดหมู่อาหาร :</label>
    <input type="text" class="form-control" name="type_id" value="<?= $animal['type_id']; ?>">
</div>

<div class="form-group">
    <label for="menu_image">รูปภาพ:</label>
    <input type="text" class="form-control" name="menu_image" value="<?= $animal['menu_image']; ?>">
</div>

<input type="submit" class="btn btn-primary" value="Update"> -->