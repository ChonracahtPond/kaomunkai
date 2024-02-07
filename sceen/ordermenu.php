<?php
session_start();
if ($_SESSION['Userlevel'] != 'M') {  //check session

	Header("Location: logout.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else { ?>
	<!-- <?php
			session_start();
			include("../connection.php");
			?> -->

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
			<!-- <p class=" text-center text-2xl text-[#B6F7C1]">ข้าวมันไก่น้องกาน</p> -->
			<p class="text-xl text-white">หมายเลขโต๊ะ <?php echo $_SESSION['UserID']; ?></p>

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
						<textarea id="message" name="message" rows="4" class=" mx-auto block p-2.5 w-[90%] text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
             dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
						<p class=" text-red-500 text-sm">*/กรุณาพิมพ์ให้ชัดเจนก่อนกดยืนยัน</p>
						<input type="submit" value="Submit">
					</div>


					<!-- <?php
							if (isset($_GET['message']) && !empty($_GET['message'])) {
								$message = $_GET['message'];
								echo "<p>Additional Details: $message</p>";
							}
							?> -->

					<div class=" flex mt-5">
						<button class="  w-[45%]  middle none center mr-4 rounded-lg bg-green-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-light="true">
							<a href="cart.php?menu_id=<?php echo $row['menu_id']; ?>&act=add">ใช่</a>
						</button>
						<button class="  w-[45%]  middle none center mr-4 rounded-lg bg-red-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
							<a href="menu.php">ยกเลิก</a>
						</button>
					</div>
				</form>
			</div>
		</div>
	</body>

	</html>
<?php } ?>