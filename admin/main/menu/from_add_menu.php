<!DOCTYPE html>
<html>

<head>
    <title>เพิ่มข้อมูลยา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="mt-3">เพิ่มเมนูอาหาร</h2>
        <form method="POST" action="addmenu.php" enctype="multipart/form-data" class="mt-3">
            <div class="mb-3">
                <label for="menu_name" class="form-label">ชื่อเมนูอาหาร :</label>
                <input type="text" name="menu_name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">ราคา :</label>
                <input type="text" name="price" class="form-control">
            </div>
            <div class="mb-3">
                <label for="menu_image" class="form-label">รูปภาพ:</label>
                <font color="red">*อัพโหลดได้เฉพาะ .jpeg , .jpg , .png </font>
                <input type="file" name="menu_image" required class="form-control" accept="image/jpeg, image/png, image/jpg"> <br>
               
            </div>
          
            <button type="submit" class="btn btn-primary">บันทึกข้อมูลยา</button>
        </form>
    </div>
</body>

</html>