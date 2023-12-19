<?php
session_start();
include("../connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
	<title>Document</title>
</head>
<body class=" bg-[#373640]">
	<div class="justify-between"><p class=" text-white text-center">คุณต้องการสั่งซื้อหรือไม่</p></div>

	<div class=" ">
		<!-- <div class="center">
			<h1 class="text-primary">คำสั่งซื้อ</h1>
		</div> -->

		<?php
		$menu_id = $_GET['menu_id'];
		$sql = "select * from menu where menu_id = $menu_id";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		?>

		<div class="text-white mt-10 text-center">
			<div class=" justify-evenly">
				<h3><?php echo $row['menu_name']; ?></h3>
				<p class="text-primary">ราคา: <?php echo number_format($row['menu_price'], 2); ?> บาท</p>
				<!-- <a  href="cart.php?menu_id=<?php echo $row['menu_id']; ?>&act=add">ไม่ใช่</a> -->
				<a   href="cart.php?menu_id=<?php echo $row['menu_id']; ?>&act=add">ใช่</a>
			</div>
		</div>
	</div>


</body>
</html>