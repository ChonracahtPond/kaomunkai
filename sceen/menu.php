<?php
session_start();
if ($_SESSION['Userlevel'] != 'M') {  //check session

  Header("Location: logout.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else { ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <title>เมนูอาหาร</title>
    <style>
      .owl-carousel {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
    </style>
  </head>

  <body class="bg-[#373640]">

    <!-- nav -->
    <div class="w-full text-[#B6F7C1]  dark-mode:text-gray-200 dark-mode:bg-gray-800">
      <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="p-4 flex flex-row items-center justify-between">
          <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
              <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
              <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
          </button>
          <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline text-[#B6F7C1]">ข้าวมันไก่น้องกาน</a>
          <!-- <img class="h-[70px] " src="../images/logo.png" alt=""> -->
          <a href="cart.php"><span class="badge">2</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
              <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
            </svg>

          </a>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
          <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">หน้าหลัก</a>
          <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">รายการอาหารที่สั่ง</a>
          <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">ติดต่อ</a>
          <!-- <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">รายการอาหารที่สั่ง</a> -->
          <div @click.away="open = false" class="relative" x-data="{ open: false }">

          </div>
        </nav>
      </div>
    </div>
    <!-- nav -->

    <!-- <p class=" text-xl text-white">หมายเลขโต๊ะ<?php print_r($_SESSION); ?></p> -->
    <p class="text-xl text-white">หมายเลขโต๊ะ <?php echo $_SESSION['UserID']; ?></p>



    <iframe class="w-screen h-[250px]" src="slider.html" frameborder="0"></iframe>

    <div class="text-white flex justify-between mt-4">
      <p class="px-5">เมนู</p>
    </div>



    <!-- typemenu -->
    <div class="owl-carousel" style="display: flex; flex-wrap: wrap; justify-content: center;">
      <?php
      include("../connection.php");
      $sql = "select * from typemenu order by type_id";
      $result = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_array($result)) {
      ?>
        <div class="my-5 mx-2">
          <div class="col-sm-6 col-md-6 item">
            <form action="typemenu.php" method="post">
              <input type="hidden" name="type_id" value="<?php echo $row["type_id"]; ?>">
              <button type="submit" class="card-link">
                <img class="w-48 h-32 mx-auto rounded-md" src="<?php echo $row["type_image"]; ?>" alt="Food Image">
                <!-- <?php
                $imagePath = $row["menu_image"];
                ?>
                <img class="w-48 h-32 mx-auto rounded-md" src="<?php echo $imagePath; ?>" alt="Food Image"> -->
              </button>
              <p class="category text-white text-center mt-2"><?php echo $row["type_name"]; ?></p>
            </form>
          </div>
        </div>
      <?php
      }
      ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
      $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
          items: 4,
          loop: true,
          margin: 10,
          autoplay: true,
          autoWidth: true,
          autoplayTimeout: 5000,
          autoplayHoverPause: true,
          fallbackEasing: 'linear'
        });
      });
    </script>


    <!-- <div class="text-center" style="display: flex; flex-wrap: wrap; justify-content: center;">
      <?php
      include("../connection.php");
      $sql = "select * from typemenu order by type_id";
      $result = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_array($result)) {
      ?>
        <div class="my-5 mx-2">
          <div class="col-sm-6 col-md-6 item">
            <form action="typemenu.php" method="post">
              <input type="hidden" name="type_id" value="<?php echo $row["type_id"]; ?>">
              <button type="submit" class="card-link">
                <img class="w-48 h-32 mx-auto rounded-md" src="../images/ข้าวมันไก่.jpg" alt="Food Image">
              </button>
              <p class="category text-white text-center mt-2"><?php echo $row["type_name"]; ?></p>
            </form>
          </div>
        </div>
      <?php
      }
      ?>
    </div> -->




    <!-- <div class="my-5 ">
        <div class="col-sm-6 col-md-6 item">
          <form action="typemenu.php" method="post">
            <input type="hidden" name="type_id" value="<?php echo $row["type_id"]; ?>">
            <button type="submit" class="card-link">
              <img class="w-[150px] h-[100px] mx-auto" src="../images/ข้าวมันไก่.jpg" alt="">
            </button>
            <p class="category text-white"><?php echo $row["type_name"]; ?></p>
          </form>
        </div>

      </div> -->

    <!-- typemenu -->




    <div class="text-center text-white mt-5">
      <p>เมนูพิเศษประจำวัน</p>
      <div class="bg-[#252525] w-screen h-[150px] mx-auto rounded-xl"></div>
      <div class="bg-[#B6F7C1] w-screen h-[200px] mx-auto rounded-xl mt-10"></div>
    </div>


  </body>

  </html>
<?php } ?>