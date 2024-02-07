<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-family-karla flex">

    <div class="container mx-auto p-4">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-2xl font-bold mb-4">แก้ไขสมากชิก</h1>

            <?php
            // Include the connection file
            require_once '../../../connection.php';

            // Check if user_id is set in the URL
            if (isset($_GET['user_id'])) {
                $user_id = $_GET['user_id'];

                // Fetch user details from the database
                $stmt = $conn->prepare("SELECT * FROM user WHERE user_id = ?");
                $stmt->execute([$user_id]);
                $user = $stmt->fetch();

                if ($user) {
            ?>
                    <!-- Your HTML form for editing user details goes here -->
                    <form action="updateuser.php" method="post">
                        <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">
                        <div class="form-group">
                            <label for="Username">Username :</label>
                            <input type="text" class="form-control" name="Username" value="<?php echo $user['Username']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="Firstname">ชื่อ :</label>
                            <input type="text" class="form-control" name="Firstname" value="<?= $user['Firstname']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="Lastname">นามสกุล :</label>
                            <input type="text" class="form-control" name="Lastname" value="<?= $user['Lastname']; ?>">
                        </div>

                       

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

