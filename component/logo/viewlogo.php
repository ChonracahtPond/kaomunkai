
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="text-2xl rounded-md border border-black p-2 flex justify-around ">
        <p>โลโก้</p>
        <div class=" w-[200px] h-[200px] mx-auto my-auto">
            <?php
            include("../../connection.php");
            // สร้างคำสั่ง SQL เพื่อดึงข้อมูลจากตาราง imagelogo
            $sql = "SELECT * FROM imagelogo";
            
            // ทำการ query ข้อมูล
            $result = $conn->query($sql);
            // ตรวจสอบว่ามีข้อมูลที่ถูกคืนมาหรือไม่
            if ($result->rowCount() > 0) {
                // วนลูปแสดงข้อมูลทุกรายการ
                while ($row = $result->fetch()) {
                    echo '<div class="text-2xl rounded-md border border-black p-2 flex">';
                    echo '<img src="' . $row['ImagePath'] . '" alt="' . $row['ImageName'] . '">';
                    // echo '<p>' . $row['ImageName'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "No images found.";
            }

            // ปิดการเชื่อมต่อฐานข้อมูล
            $conn = null;
            ?>
        </div>

    </div>

</body>

</html>