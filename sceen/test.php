<?php
include("../connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="font-sans antialiased bg-[#373640]">
    <!-- nav -->
  <div class="w-full text-[#B6F7C1]  dark-mode:text-gray-200 dark-mode:bg-gray-800">
    <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
      <div class="p-4 flex flex-row items-center justify-between">
        <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline text-[#B6F7C1]">ข้าวมันไก่น้องกาน</a>
        <!-- <img class="h-[70px] " src="../images/logo.png" alt=""> -->
        <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
          <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
      <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
        <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Blog</a>
        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Portfolio</a>
        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">About</a>
        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Contact</a>
        <div @click.away="open = false" class="relative" x-data="{ open: false }">

        </div>
      </nav>
    </div>
  </div>
  <!-- nav -->

    <div class="text-white p-4">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["type_id"])) {
            $type_id = mysqli_real_escape_string($con, $_POST["type_id"]);

            $type_sql = "SELECT * FROM typemenu WHERE type_id = '$type_id'";
            $type_result = mysqli_query($con, $type_sql);

            if ($type_result) {
                while ($type_row = mysqli_fetch_array($type_result)) {
                    echo "<p class='text-2xl font-bold mb-4'>" . $type_row["type_name"] . "</p>";
                    echo "<p class=' mx-auto mb-5 bg-white w-[95%] h-[1px] '></p>";
                }

                $menu_sql = "SELECT * FROM menu WHERE type_id = '$type_id'";
                $menu_result = mysqli_query($con, $menu_sql);

                if ($menu_result) {
                    while ($menu_row = mysqli_fetch_array($menu_result)) {
                        echo "<p class='text-lg'>" . $menu_row["menu_name"] . "</p>";
                    }
                } else {
                    echo "<p class='text-red-500'>Error: " . mysqli_error($con) . "</p>";
                }
            } else {
                echo "<p class='text-red-500'>Error: " . mysqli_error($con) . "</p>";
            }
        }

        mysqli_close($con);
        ?>



<!-- test -->
<div class="text-center">
    <?php
    include("../connection.php");

    // Check if type_id is set in the request
    if (isset($_GET["type_id"])) {
        $type_id = mysqli_real_escape_string($con, $_GET["type_id"]);
        $sql = "SELECT * FROM menu WHERE type_id = '$type_id' ORDER BY menu_id";
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {
    ?>
            <div class="mt-5">
                <div class="item">
                    <a href="ordermenu.php?menu_id=<?php echo $row["menu_id"]; ?>" class="card-link">
                        <img class="w-[190px] h-[130px] mx-auto" src="../images/ข้าวมันไก่.jpg" alt="">
                    </a>
                    <span class="category"><?php echo $row["menu_name"]; ?></span>
                    <h6>$<?php echo number_format($row["price"], 2); ?></h6>
                    <div class="main-button">
                        <a href="ordermenu.php?menu_id=<?php echo $row["menu_id"]; ?>" class="card-link">รายละเอียดสินค้า</a>
                    </div>
                </div>
            </div>
    <?php
        }
    } else {
        echo "<p>No type_id provided.</p>";
    }

    // Close the database connection
    mysqli_close($con);
    ?>
</div>
<!-- test -->

    </div>
</body>

</html>
