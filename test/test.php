<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu System</title>
</head>
<body>
    <h1>เลือกรายการเมนู</h1>
    <form action="display_menu.php" method="post">
        <label for="typemenu">เลือกประเภทเมนู:</label>
        <select name="typemenu" id="typemenu">
            <option value="101">ประเภทเมนู 1</option>
            <option value="102">ประเภทเมนู 2</option>
            <!-- เพิ่มตัวเลือกเมนูต่าง ๆ ตามที่คุณต้องการ -->
        </select>
        <button type="submit">แสดงข้อมูลเมนู</button>
    </form>

    <a action="display_menu.php" method="post" value="102">
        <img  src="../images/ขนม.jpg" alt=""  >
    </a>





</body>
</html>
