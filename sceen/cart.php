<?php
session_start();

$act = isset($_GET['act']) ? $_GET['act'] : '';

if ($act == 'add' && isset($_GET['menu_id']) && !empty($_GET['menu_id'])) {
    $menu_id = $_GET['menu_id'];
    if (isset($_SESSION['cart'][$menu_id])) {
        $_SESSION['cart'][$menu_id]++;
    } else {
        $_SESSION['cart'][$menu_id] = 1;
    }
}

if ($act == 'remove' && isset($_GET['menu_id']) && !empty($_GET['menu_id'])) {
    $menu_id = $_GET['menu_id'];
    unset($_SESSION['cart'][$menu_id]);
}

if ($act == 'update') {
    if (isset($_POST['amount'])) {
        $amount_array = $_POST['amount'];
        foreach ($amount_array as $menu_id => $amount) {
            $_SESSION['cart'][$menu_id] = $amount;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-[#373640]">
    <!-- <div class="container  "> -->

    <div class=" top-0 z-40 flex w-screen flex-row justify-between py-3 text-white">
        <a href="menu.php">
            <svg id="navOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-8 w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25l-6-6 6-6" />
            </svg>
        </a>
        <p class=" text-center">ออเดอร์ของฉัน</p>
        <p class=" text-center"></p>
    </div>

    <?php
    $total = 0;
    if (!empty($_SESSION['cart'])) {
        include("../connection.php");

        foreach ($_SESSION['cart'] as $menu_id => $qty) {
            $sql = "select * from menu where menu_id=$menu_id";
            $query = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($query);
            $sum = floatval($row['menu_price']) * floatval($qty);
            $total += $sum;
    ?>
            <div class="py-2">
                <div class="flex bg-white mx-auto rounded-lg w-[400px] h-[150px] " id="menu_<?php echo $menu_id; ?>">
                    <img class="w-[150px] h-[150px]" src="../images/ข้าวมันไก่.jpg" alt="">


                    <div class="card-body d-flex ">
                        <a class='btn btn-danger text-red-600 ml-48' href='cart.php?menu_id=<?php echo $menu_id; ?>&act=remove'>ยกเลิก</a>
                        <h5 class="card-title"><?php echo $row["menu_name"]; ?></h5>
                        <p class="card-text text-[#B6F7C1]">ราคา : <?php echo number_format($row["menu_price"], 2); ?></p>
                        <p class="card-text">จำนวนจาน:
                            <input type='text' class='form-control' name='amount[<?php echo $menu_id; ?>]' value='<?php echo $qty; ?>' size='2' />
                        </p>
                        <p class="card-text">ราคารวม: <?php echo number_format($sum, 2); ?></p>

                    </div>

                </div>

                <!-- echo "<td colspan='3' align='center'><b>ราคารวม</b></td>";
                        echo "<td align='right'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>"; -->

            </div>


    <?php
        }
    }
    ?>


    <div class=" bg-[#B6F7C1] w-screen h-[150px] mt-10">
    <tfoot>
                    <tr>
                        <td>
                            <!-- <a href="user_page.php">กลับหน้ารายการสินค้า</a> -->
                        </td>
                        <td colspan="4" align="right">
                            <input type="submit" class="btn btn-primary" name="button" id="button" value="อัพเดต" />
                            <input type="button" class="btn btn-success" name="Submit2" value="สั่งซื้ออาหาร" onclick="window.location='confirm.php';" />
                        </td>
                    </tr>
                </tfoot>

    </div>


</body>

</html>