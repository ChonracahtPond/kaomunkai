<?php
session_start();
if ($_SESSION['Userlevel'] != 'M') {  //check session

  Header("Location: login/form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else { ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      .bg {
        background-image: url("images/bg.png");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        /* justify-content: center; */
      }
    </style>
  </head>

  <body class="bg">
    <div>
      <img class="sm: h-[300px]" src="images/logo.png" alt="" srcset="" />
    </div>

    <img class="sm:flex inset-x-0 bottom-0" src="images/gg.png" alt="" srcset="" />
    <div class="absolute bottom-32 text-center">
      <p class="text-[#B6F7C1] text-xl">ขอต้อนรับเข้าสู่ระบบสั่งอาหาร</p>
      <!-- <p class=" text-xl">หมายเลขโต๊ะ<?php print_r($_SESSION); ?></p> -->
      <p class="text-xl mt-5 text-red-500">หมายเลขโต๊ะ <?php echo $_SESSION['UserID']; ?></p>
      <p class="mt-10 text-xl">ร้านข้าวมันไก่น้องกานต์</p>
      <p class="text-sm mt-10">
        ระบบที่จะช่วยทำให้คุณสั่งอาหารง่ายขึ้น เพื่อเพิ่มความสะดวก
      </p>
      <p class="text-sm">
        สบายในการสั่งอาหาร เสริมสร้างประสบการณ์ที่ดีในการใช้บริการ
      </p>

      <button class="group relative h-12 w-48 overflow-hidden rounded-2xl bg-[#B6F7C1] text-lg font-bold  mt-10">
        <a href="sceen/menu.php">เริ่มเลย</a>
        <div class="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30"></div>
      </button>
    </div>

    <!-- <img class="h-screen" src="images/3f483410b8f2f1eb486efa7142deefc3 1.png" alt="" srcset=""> -->
    <!-- <img class="mt-4 flex-auto" src="images/logo.png" alt="" srcset=""> -->
    <!-- <h1 class="text-5xl font-bold underline">
    Hello world!
  </h1> -->






  </body>

  </html>
<?php } ?>