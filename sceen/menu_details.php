<?php
session_start();
if ($_SESSION['Userlevel'] != 'M') {
    Header("Location: logout.php");
} else {
    include("../connection.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Process the form submission
        $menu_name = $_POST['menu_name'];
        $price = $_POST['price'];

        // Perform validation as needed

        // Insert into the database
        $insert_sql = "INSERT INTO menu (menu_name, price) VALUES ('$menu_name', $price)";
        $insert_query = mysqli_query($con, $insert_sql);

        if ($insert_query) {
            echo "Item added successfully.";
        } else {
            echo "Error adding item: " . mysqli_error($con);
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Add Item</title>
    </head>

    <body class="bg-[#373640]">
        <!-- nav -->
        <div class=" top-0 z-40 flex w-screen flex-row justify-between py-3 text-[#B6F7C1]">
            <a href="cart.php">
                <svg id="navOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-8 w-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25l-6-6 6-6" />
                </svg>
            </a>
            <p class=" text-center text-2xl text-[#B6F7C1]">รายละเอียด</p>
            <p class=" text-center"></p>
        </div>
        <!-- nav -->


        <div class=" bg-white w-[90%] h-[90%] flex mx-auto rounded-xl">
            <div class="max-w-md mx-auto  p-6 rounded-md  ">
                <?php
                if (isset($_GET['menu_id']) && !empty($_GET['menu_id'])) {
                    $menu_id = $_GET['menu_id'];
                    $sql = "SELECT * FROM menu WHERE menu_id = $menu_id";
                    $query = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($query);

                    if ($row) {
                        // echo "<h2 class='text-2xl font-bold mb-4'>Menu Details</h2>";

                        echo '<img src="' . $row['menu_image'] . '" class="w-full h-auto mb-4 rounded-md" alt="Menu Image">';

                        echo '<div class" bg-black w-[80%] h-3"></div>';

                        echo "<p class='text-xl font-bold mb-2'>" . $row['menu_name'] . "</p>";
                        echo "<p class='mb-4'><span class='font-bold text-green-500'>Price:</span> $" . number_format($row['price'], 2) . "</p>";
                    } else {
                        echo "<p class='text-red-500'>Invalid menu ID.</p>";
                    }
                } else {
                    echo "<p class='text-red-500'>Invalid menu ID.</p>";
                }
                ?>
                <form action="">
                    <div class=" mx-auto text-center mt-5">
                        <p class="">รายละเอียดเพิ่มเติม</p>
                        <textarea id="message" rows="4" class=" mx-auto block p-2.5 w-[90%] text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
             dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
                        <p class=" text-red-500 text-sm">*/กรุณาพิมพ์ให้ชัดเจนก่อนกดยืนยัน</p>
                    </div>


                    <div class=" flex mt-5">
                        <!-- <button class=" w-[50%] mx-1 middle none center rounded-lg bg-orange-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-orange-500/20 transition-all hover:shadow-lg hover:shadow-orange-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-light="true">
                            เพิ่มในออเดอร์
                        </button> -->


                        <button class="  w-[45%]  middle none center mr-4 rounded-lg bg-green-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-light="true">
                        ยืนยัน
                        </button>
                        <button  class="  w-[45%]  middle none center mr-4 rounded-lg bg-red-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" >
                        <a href="cart.php">ยกเลิก</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>






































        <!-- <div class="text-white">
            <h1>Add New Item</h1>
            <form method="post" action="">
                <label for="menu_name">Menu Name:</label>
                <input type="checkbox" name="menu_name" required>

                <label for="price">Price:</label>
                <input type="checkbox" name="price" step="0.01" required>

                <button type="submit">Add Item</button>
            </form>







            <?php
            if (isset($_GET['menu_id']) && !empty($_GET['menu_id'])) {
                $menu_id = $_GET['menu_id'];
                $sql = "SELECT * FROM menu WHERE menu_id = $menu_id";
                $query = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($query);


                echo "<h2>Menu Details</h2>";
                echo "<p>Menu ID: " . $row['menu_id'] . "</p>";
                echo "<p>Menu Name: " . $row['menu_name'] . "</p>";
                echo "<p>Price: " . number_format($row['price'], 2) . "</p>";
            } else {
                echo "Invalid menu ID.";
            }
            ?>
        </div> -->
    </body>

    </html>
<?php } ?>