<?php
include("../../connection.php");
// สร้างคำสั่ง SQL เพื่อดึงข้อมูลจากตาราง imagelogo
$sql = "SELECT * FROM imagelogo";
// $sql = "SELECT * FROM imagesbanner";

// ทำการ query ข้อมูล
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tailwind Admin Template</title>
  <meta name="author" content="David Grzyb" />
  <meta name="description" content="" />
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Tailwind -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet" />
  <style>
    @import url("https://fonts.googleapis.com/css?family=Karla:400,700&display=swap");

    .font-family-karla {
      font-family: karla;
    }

    .bg-sidebar {
      background: #373640;
    }

    .cta-btn {
      color: #3d68ff;
    }

    .upgrade-btn {
      background: #1947ee;
    }

    .upgrade-btn:hover {
      background: #0038fd;
    }

    .active-nav-link {
      background: #63686e;
    }

    .nav-item:hover {
      background: #63686e;
    }

    .account-link:hover {
      background: #3d68ff;
    }
  </style>
</head>

<body class="bg-gray-100 font-family-karla flex">

  <div class="w-full flex flex-col h-screen overflow-y-hidden">


    <div class="w-full overflow-x-hidden border-t flex flex-col">
      <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">หน้าแรก</h1>

        <div class="flex mx-auto my-auto">
          <div class="bg-white w-[50%] h-[500px] mx-10 rounded-red-500">
            <h2>ข้อมูล</h2>
            <form action="upload.php" method="post" enctype="multipart/form-data">
              <input type="file" name="image" id="image" accept="image/*" />
              <br />
              <input type="submit" value="Upload Image" />
            </form>

            <div class="text-2xl rounded-md border border-black p-2 flex justify-around ">
              <p>โลโก้</p>
              <div class=" w-[200px] h-[200px] mx-auto my-auto">
                <?php
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
            <div class="text-2xl rounded-md border border-black p-2 flex justify-around ">
              <p>โลโก้</p>
              <div class=" w-[200px] h-[200px] mx-auto my-auto">
                <?php
                // ตรวจสอบว่ามีข้อมูลที่ถูกคืนมาหรือไม่
                if ($result->rowCount() > 1) {
                  // วนลูปแสดงข้อมูลทุกรายการ
                  while ($row = $result->fetch()) {
                    echo '<div class="text-2xl rounded-md border border-black p-2 flex">';
                    echo '<img src="' . $row['imagesbannerPath'] . '" alt="' . $row['imagesbannerName'] . '">';
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


            <p class=" mt-5">แบนเนอร์</p>
            <div class="text-2xl rounded-md border border-black p-2 flex justify-around ">

              <div class=" w-[200px] h-[200px] mx-auto my-auto">
               
              
                  <?php
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
          </div>




          <!-- ขวา -->
          <div class="bg-white w-[50%] h-[500px] mx-10 ">
            <h1 class=" text-center my-10">เมนูขายดี</h1>
            <div class="text-2xl rounded-md border border-black p-2 flex justify-around bg-[#63686E] h-[100px] w-[90%] mx-auto ">เมนู</div>
            <div class="text-2xl rounded-md border border-black p-2 flex justify-around bg-[#63686E] h-[100px] w-[90%] mx-auto my-5">เมนู</div>
            <div class="text-2xl rounded-md border border-black p-2 flex justify-around bg-[#63686E] h-[100px] w-[90%] mx-auto">เมนู</div>
          </div>
        </div>
      </main>
    </div>
  </div>


</body>

</html>

<?php ?>