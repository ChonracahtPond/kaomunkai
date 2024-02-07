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
  <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
      <a href="index.html.php" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">
        <img src="../../images/logo.png" alt="" srcset="" />
      </a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
      <a href="index.php" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
        <i class="fas fa-tachometer-alt mr-3"></i>
        หน้าแรก
      </a>
      <a href="main.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-tachometer-alt mr-3"></i>
        ข้อมูลสินค้า
      </a>
      <a href="blank.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-sticky-note mr-3"></i>
        ออเดอร์
      </a>
      <a href="tables.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-table mr-3"></i>
        รายงาน
      </a>
      <a href="forms.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-align-left mr-3"></i>
        สมาชิก
      </a>

    </nav>
    <a href="../../login/logout.php" class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
      <i class="fas fa-arrow-circle-up mr-3"></i>
      Logout
    </a>
  </aside>



  <div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- Desktop Header -->
    <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
      <div class="w-1/2"></div>
      <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
        <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
          <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400" />
        </button>
        <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
        <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
          <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
          <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
          <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
        </div>
      </div>
    </header>

    <!-- Mobile Header & Nav -->
    <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
      <div class="flex items-center justify-between">
        <a href="index.html.php" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
          <i x-show="!isOpen" class="fas fa-bars"></i>
          <i x-show="isOpen" class="fas fa-times"></i>
        </button>
      </div>

      <!-- Dropdown Nav -->
      <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
        <a href="main.php" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
          <i class="fas fa-tachometer-alt mr-3"></i>
          หน้าแรก
        </a>
        <a href="index.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
          <i class="fas fa-tachometer-alt mr-3"></i>
          ข้อมูลสินค้า
        </a>
        <a href="blank.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-sticky-note mr-3"></i>
          ออเดอร์
        </a>
        <a href="tables.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-table mr-3"></i>
          รายงาน
        </a>
        <a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-align-left mr-3"></i>
          สมาชิก
        </a>
        <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-tablet-alt mr-3"></i>
          คอมเมนต์
        </a>
        <!-- <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-calendar mr-3"></i>
                    Calendar
                </a> -->
        <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-cogs mr-3"></i>
          Support
        </a>
        <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-user mr-3"></i>
          My Account
        </a>
        <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-sign-out-alt mr-3"></i>
          Sign Out
        </a>
        <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
          <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
        </button>
      </nav>
      <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
    </header>



    <div class="w-full overflow-x-hidden border-t flex flex-col">
      <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">หน้าแรก</h1>

     
       <!-- <div class=" flex"> 
        <div class=" bg-slate-300 w-[50%] mx-10 rounded-red-500">
            <p class=" text-center">เมนูทั้งหมดในร้าน</p>
          </div>
          <div class="bg-slate-300 w-[50%]  mx-10 rounded-red-500">
          <p class=" text-center">2</p>
          </div>
          <div class="bg-slate-300 w-[50%]  mx-10 rounded-red-500">
          <p class=" text-center">3</p>
          </div>
          <div class="bg-slate-300 w-[50%]  mx-10 rounded-red-500">
          <p class=" text-center">4</p>
          </div>
        </div> -->



        <div class="flex mx-auto my-auto mt-5">
          <div class="bg-white w-[50%] h-[500px] mx-10 rounded-red-500">


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



          </div>




          <!-- ขวา -->
          <div class="bg-white w-[50%] h-[500px] mx-10 ">
            <h1 class=" text-center my-10 text-2xl">เมนูขายดี</h1>
            <div class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Menu ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Menu Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Total Quantity Sold
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <?php
                  include("../../connection.php");

                  // Check connection
                  if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                  }

                  // SQL query to find the best-selling menu items
                  $sql = "SELECT m.menu_id, m.menu_name, SUM(od.quantity) AS total_quantity_sold
                        FROM orderdetail od
                        JOIN menu m ON od.menu_id = m.menu_id
                        GROUP BY m.menu_id, m.menu_name
                        ORDER BY total_quantity_sold DESC";

                  $result = $con->query($sql);

                  if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["menu_id"] . "</td>";
                      echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["menu_name"] . "</td>";
                      echo "<td class='px-6 py-4 whitespace-nowrap'>" . $row["total_quantity_sold"] . "</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='3' class='px-6 py-4 whitespace-nowrap text-center'>No results found.</td></tr>";
                  }

                  $con->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- AlpineJS -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
  <!-- ChartJS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>


</body>

</html>

<?php ?>