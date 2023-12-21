<?php
	session_start();
    include("../connection.php");  
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Checkout</title>
</head>
<body>
<form id="frmcart" name="frmcart" method="post" action="saveorder.php">
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td width="1558" colspan="4" bgcolor="#FFDDBB">
      <strong>สั่งซื้อสินค้า</strong></td>
    </tr>
    <tr>
      <td bgcolor="#F9D5E3">สินค้า</td>
      <td align="center" bgcolor="#F9D5E3">ราคา</td>
      <td align="center" bgcolor="#F9D5E3">จำนวน</td>
      <td align="center" bgcolor="#F9D5E3">รวม/รายการ</td>
    </tr>
<?php
	$total=0;
	foreach($_SESSION['cart'] as $menu_id=>$qty)
	{
		$sql	= "select * from menu where menu_id=$menu_id";
		$query	= mysqli_query($con, $sql);
		$row	= mysqli_fetch_array($query);
		$sum	= $row['price']*$qty;
		$total	+= $sum;
    echo "<tr>";
    echo "<td>" . $row["menu_name"] . "</td>";
    echo "<td align='right'>" .number_format($row['price'],2) ."</td>";
    echo "<td align='right'>$qty</td>";
    echo "<td align='right'>".number_format($sum,2)."</td>";
    echo "</tr>";
	}
	echo "<tr>";
    echo "<td  align='right' colspan='3' bgcolor='#F9D5E3'><b>รวม</b></td>";
    echo "<td align='right' bgcolor='#F9D5E3'>"."<b>".number_format($total,2)."</b>"."</td>";
    echo "</tr>";
?>

<tr>
	<td colspan="2" align="center" bgcolor="#CCCCCC">
	<input type="submit" name="Submit2" value="สั่งซื้อ" />
</td>
</tr>
</form>
</body>
</html>




<!-- -- Table structure for table `bill`
CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `order_dttm` datetime NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `bill`
-- (You can add data as needed)
INSERT INTO `bill` (`bill_id`, `customer_name`, `order_dttm`) VALUES
(1, 'John Doe', '2023-12-21 10:00:00'),
(2, 'Jane Smith', '2023-12-21 12:30:00'); -->
