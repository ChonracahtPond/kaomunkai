<?php
session_start();
if ($_SESSION['Userlevel'] != 'M') {  //check session

    Header("Location: logout.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else { ?>
    <?php
    include("../connection.php");
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> -->
    </head>

    <body class="font-sans antialiased bg-[#373640]">
        <!-- nav -->
        <div class=" top-0 z-40 flex w-screen flex-row justify-between py-3 text-[#B6F7C1]">
            <a href="menu.php">
                <svg id="navOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-8 w-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25l-6-6 6-6" />
                </svg>
            </a>
            <p class=" text-center text-2xl text-[#B6F7C1]">ข้าวมันไก่น้องกาน</p>
            <p class=" text-center"></p>
        </div>
        <!-- nav -->

        <p class="text-xl text-white">หมายเลขโต๊ะ <?php echo $_SESSION['UserID']; ?></p>


        <iframe class="w-screen h-[250px]" src="slider.html" frameborder="0"></iframe>


        <div class="text-white p-4 text-center">

            <?php
            include("../connection.php");

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["type_id"])) {
                $type_id = mysqli_real_escape_string($con, $_POST["type_id"]);

                $type_sql = "SELECT * FROM typemenu WHERE type_id = '$type_id'";
                $type_result = mysqli_query($con, $type_sql);

                if ($type_result) {
                    while ($type_row = mysqli_fetch_array($type_result)) {
                        echo "<p class='text-2xl font-bold mb-4'>" . $type_row["type_name"] . "</p>";
                        echo "<p class='mx-auto mb-5 bg-white w-[95%] h-[1px]'></p>";
                    }

                    $menu_sql = "SELECT * FROM menu WHERE type_id = '$type_id'";
                    $menu_result = mysqli_query($con, $menu_sql);

                    if ($menu_result) {
                        echo "<div class='text-center'>";
                        while ($menu_row = mysqli_fetch_array($menu_result)) {
                            echo "<a href='ordermenu.php?menu_id=" . $menu_row["menu_id"] . "' class='card-link'>";
                            echo "<div class='mt-5'>";
                            echo "<div class='flex bg-white mx-auto rounded-lg w-[95%] h-[100px] text-black'>";
                            echo "<img class='w-[150px] h-[100px] mx-auto' src='../images/ข้าวมันไก่.jpg' alt='' />";
                            echo "<p class='category'>ชื่อ : " . $menu_row["menu_name"] . "</p>";
                            echo "<h6>ราคา : $" . number_format($menu_row["price"], 2) . "</h6>";
                            echo "</div>";
                            echo "</div>";
                            echo "</a>";
                        }
                        echo "</div>";
                    } else {
                        echo "<p class='text-red-500'>Error fetching menu: " . mysqli_error($con) . "</p>";
                    }
                } else {
                    echo "<p class='text-red-500'>Error fetching type: " . mysqli_error($con) . "</p>";
                }
            }

            mysqli_close($con);
            ?>




            <!-- test -->
            <!-- <div class=" text-center">
            <?php
            include("../connection.php");
            $sql = "select * from menu order by menu_id";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <a href="ordermenu.php?menu_id=<?php echo $row["menu_id"]; ?>" class="card-link">
                    <div class="mt-5">
                        <div class=" flex bg-white mx-auto rounded-lg w-[400px] h-[100px] text-black">
                            <img class="w-[150px] h-[100px] mx-auto" src="../images/ข้าวมันไก่.jpg" alt="" />
                            <p class="category">ชื่อ : <?php echo $row["menu_name"]; ?></p>
                            <h6>ราคา : $<?php echo number_format($row["price"], 2); ?></h6>
                        </div>
                    </div>
                </a>
            <?php
            }
            ?>
        </div> -->
            <!-- test -->

        </div>
    </body>

    </html>
<?php } ?>