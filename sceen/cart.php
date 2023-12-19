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

        <div  class=" top-0 z-40 flex w-screen flex-row justify-between py-3 text-white">
            <a href="menu.php">
            <svg id="navOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-8 w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25l-6-6 6-6" />
            </svg>
            </a>
            <p class=" text-center">ออเดอร์ของฉัน</p>
            <p class=" text-center"></p>
        </div>

        <form id="frmcart" name="frmcart" method="post" action="?act=update">
<div class=" bg-white mx-auto rounded-lg w-[400px] h-[150px]">
    <div class=" flex">
        <img class="w-[150px] h-[150px]" src="../images/ข้าวมันไก่.jpg" alt="">
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
                            
                            echo "<tr>";
                            echo "<td>" . $row["menu_name"] . "</td>";
                            echo "<td align='right'>" . number_format($row["menu_price"], 2) . "</td>";
                            echo "<td align='right'>";
                            echo "<input type='text' class='form-control' name='amount[$menu_id]' value='$qty' size='2'/></td>";
                            echo "<td align='right'>" . number_format($sum, 2) . "</td>";
                            echo "<td align='center'><a class='btn btn-danger' href='cart.php?menu_id=$menu_id&act=remove'>ยกเลิก</a></td>";
                            echo "</tr>";
                        }



                    }
            ?>
            
    </div>
</div>
</form>



        <form id="frmcart" name="frmcart" method="post" action="?act=update">
            <table class="table table-striped">
                <tbody>
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
                            
                            echo "<tr>";
                            echo "<td>" . $row["menu_name"] . "</td>";
                            echo "<td align='right'>" . number_format($row["menu_price"], 2) . "</td>";
                            echo "<td align='right'>";
                            echo "<input type='text' class='form-control' name='amount[$menu_id]' value='$qty' size='2'/></td>";
                            echo "<td align='right'>" . number_format($sum, 2) . "</td>";
                            echo "<td align='center'><a class='btn btn-danger' href='cart.php?menu_id=$menu_id&act=remove'>ยกเลิก</a></td>";
                            echo "</tr>";
                        }




                        // echo "<tr>";
                        // echo "<td colspan='3' align='center'><b>ราคารวม</b></td>";
                        // echo "<td align='right'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
                        // echo "<td></td>";
                        // echo "</tr>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <!-- <a href="user_page.php">กลับหน้ารายการสินค้า</a> -->
                        </td>
                        <td colspan="4" align="right">
                            <input type="submit" class="btn btn-primary" name="button" id="button" value="อัพเดต" />
                            <input type="button" class="btn btn-success" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" />
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
        <p class="text-center"><a href="index.php" class="btn btn-primary">กลับไปที่หน้าเมนู</a></p>
    <!-- </div> -->


</body>

</html>