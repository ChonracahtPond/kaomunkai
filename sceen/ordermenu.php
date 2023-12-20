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



	<div class=" mx-auto my-auto text-white ">
		<p class=" text-white text-center my-5">คุณต้องการสั่งซื้อหรือไม่</p>

		<div class=" mt-10">
			<?php
			$menu_id = $_GET['menu_id'];
			$sql = "select * from menu where menu_id = $menu_id";
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($result);
			?>

			<div class=" text-center">
				<img class="w-[200px] h-[150px] mx-auto" src="../images/ข้าวมันไก่.jpg" alt="">
				<h3><?php echo $row['menu_name']; ?></h3>
				<p class="text-primary">ราคา: <?php echo number_format($row['price'], 2); ?> บาท</p>


				<div class=" mt-5">
					<!-- <a href="cart.php?menu_id=<?php echo $row['menu_id']; ?>&act=add">ไม่ใช่</a>
					<a href="cart.php?menu_id=<?php echo $row['menu_id']; ?>&act=add">ใช่</a> -->
					<button class="bg-red-500 hover:bg-red-500 text-white font-bold py-2 px-4 border-b-4 border-red-500 rounded transform transition duration-200 ease-in-out hover:-translate-y-1 hover:scale-110"><a href="menu.php">ไม่ใช่</a></button>
					<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border-b-4 border-blue-700 rounded transform transition duration-200 ease-in-out hover:-translate-y-1 hover:scale-110"><a href="cart.php?menu_id=<?php echo $row['menu_id']; ?>&act=add">ใช่</a></button>
				</div>
			</div>
		</div>

	</div>
</body>

</html>