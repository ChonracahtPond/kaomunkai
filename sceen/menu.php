<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>เมนูอาหาร</title>
  </head>
  <body class="bg-[#373640]">
    <iframe class="w-screen" src="slider.html" frameborder="0"></iframe>
    <div class="text-white flex justify-between mt-4">
        <p class="px-5">เมนู</p>
        <p class="px-5">ดูทั้งหมด</p>
      </div>
    <!-- <div class="text-white flex justify-between mt-4 px-4">
        <img
          src="../images/ข้าวมันไก่.jpg"
          alt=""
          class="w-[190px] h-[130px]"
          srcset=""
        />
        <img
          src="../images/ขนม.jpg"
          alt=""
          class="w-[190px] h-[130px]"
          srcset=""
        />
      </div> -->
      

      <div class=" text-center">
        <?php
      //connect db
      include("../connection.php");
      $sql = "select * from menu order by menu_id";  //เรียกข้อมูลมาแสดงทั้งหมด
      $result = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_array($result)) {
      ?>
          <div class="mt-5">
            <div class="item">
            <a href="ordermenu.php?menu_id=<?php echo $row["menu_id"]; ?>" class="card-link">
                <img class="w-[190px] h-[130px] mx-auto" src="../images/ข้าวมันไก่.jpg" alt=""></a>
              <span class="category"><?php echo $row["menu_name"]; ?></span>
              <h6>$<?php echo number_format($row["menu_price"], 2); ?></h6>
              <div class="main-button">
                <!-- <a href="property-details.html">Schedule a visit</a> -->
                <a href="ordermenu.php?menu_id=<?php echo $row["menu_id"]; ?>" class="card-link">รายละเอียดสินค้า</a>
              </div>
            </div>
          </div>
        <?php
      }
        ?>
        </div>
        



    <div class="text-center text-white mt-5"><p>เมนูพิเศษประจำวัน</p>
    <div class="bg-[#252525] w-[400px] h-[150px] mx-auto rounded-xl" ></div>
    <div class="bg-[#B6F7C1] w-[400px] h-[200px] mx-auto rounded-xl mt-10" ></div>
</div>



  </body>
</html>
