<?php
session_start();
if ($_SESSION['Userlevel'] != 'M') {  //check session

  Header("Location: logout.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else { ?>
<?php
// session_start();
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
    <p class=" text-center text-2xl text-[#B6F7C1]">ยืนยันการสั่งอาหาร</p>
    <p class=" text-center"></p>
  </div>
  <!-- nav -->

  <p class="text-xl text-white">หมายเลขโต๊ะ <?php echo $_SESSION['UserID']; ?></p>





  <form id="frmcart" name="frmcart" method="post" action="saveorder.php" class="max-w-screen-md mx-auto my-8">
    <table class=" text-white">
      <thead>
        <tr class="">
          <th colspan="4" class="text-2xl ">สั่งซื้อสินค้า</th>
        </tr>
        <tr class=" mt-10">
          <th class="py-2 px-4">เมนู</th>
          <th class="py-2 px-4 text-center">ราคา</th>
          <th class="py-2 px-4 text-center">จำนวน</th>
          <th class="py-2 px-4 text-center">รวม/รายการ</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $menu_id => $qty) {
          $sql  = "select * from menu where menu_id=$menu_id";
          $query  = mysqli_query($con, $sql);
          $row  = mysqli_fetch_array($query);
          $sum  = $row['price'] * $qty;
          $total  += $sum;
          echo "<tr>";
          echo "<td class='py-2 px-4'>" . $row["menu_name"] . "</td>";
          echo "<td class='py-2 px-4 text-right'>" . number_format($row['price'], 2) . "</td>";
          echo "<td class='py-2 px-4 text-right'>$qty</td>";
          echo "<td class='py-2 px-4 text-right'>" . number_format($sum, 2) . "</td>";
          echo "</tr>";
        }
        echo "<tr>";
        echo "<td  colspan='3' class='py-2 px-4  text-right text-red-500'><b>รวมทั้งสิน</b></td>";
        echo "<td class='py-2 px-4  text-right text-red-500'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
        echo "</tr>";
        ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4" class=" text-center ">
            <!-- <button type="submit" name="Submit2" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">สั่งซื้อ</button> -->
            <button type="submit" name="Submit2" class="bg-green-500 hover:bg-green-500 text-white font-bold py-2  border-b-4 border-green-500 rounded transform transition duration-200 ease-in-out hover:-translate-y-1 hover:scale-110 w-screen">ยืนยันการสั่งอาหาร</button>
          </td>
        </tr>
      </tfoot>
    </table>
  </form>






</body>

</html>
<?php } ?>