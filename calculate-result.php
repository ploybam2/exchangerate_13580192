<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<?php 
	// 1.รับค่าจากหน้าที่แล้ว
	// 2.ส่งค่าเป็นpost
	// $thb = $_POST['attribute name']

	$thb = $_POST['thb'];
	$type = $_POST['type'];
	// echo "<div class='container' style='padding-top: 10px'>";
	// echo "<div class='form-group'>";
	// echo "ค่าที่กรอก : ".$thb;
	// echo "<br>";
	// echo "สกุลเงินที่ใช้คำนวณ : ".$type;
	// echo "<br>";
	

	if ($type == 'usd') {
		$result = $thb / 31.2273;
	}elseif ($type == 'jyp') {
		$result = $thb / 28.9814;
	}elseif ($type == 'krw') {
		$result = $thb / 0.0293;
	}elseif ($type == 'gbp') {
		$result = $thb / 43.3292;
	}elseif ($type == 'eur') {
		$result = $thb / 38.2737;
	}

	

	// // แบบที่ 2 
	// if ($type == 'usd') {
	// 	$rate=31.2273;
	// }elseif ($type == 'jyp') {
	// 	$rate = 28.9814;
	// }elseif ($type == 'krw') {
	// 	$rate = 0.0293;
	// }elseif ($type == 'gbp') {
	// 	$rate = 43.3292;
	// }elseif ($type == 'eur') {
	// 	$rate = 38.2737;
	// }

	// echo "Result = ".$thb*$reat;

	// // แบบที่ 3

	// switch ($type) {
	// 	case 'usd':
	// 		$rate=31.2273;
	// 		break;
	// 	case 'jyp':
	// 		$rate=28.9814;
	// 		break;
	// 	case 'krw':
	// 		$rate=0.0293;
	// 		break;
	// 	case 'gbp':
	// 		$rate=43.3292;
	// 		break;
	// 	case 'eur':
	// 		$rate=38.2737;
	// 		break;
	// 	default:
	// 		$rate=0;
	// 		break;
	// }

	// echo "Result = ".$thb*$reat;

	require 'connect.php';

	$sql = "INSERT INTO exch291_history(thb,calculated,currency) VALUES ($thb,$result,'$type')";

	$sql_exe=$conn -> query($sql);

	// print($sql_exe);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Result</title>
		
	</head>
	<body>
	<div class="container" style="padding-top: 10px;">
		<div class="row">
			<h4 style="text-align: left; line-height: 30px; text-align: center;">
				<?php 
					echo "<div class='form-group'>";
					echo "<h3>ข้อมูล</h3>";
					echo "<hr>";
					echo "ค่าที่กรอก : ".$thb;
					echo "<br>";
					echo "สกุลเงินที่ใช้คำนวณ : ".$type;
					echo "<br>";
					echo "Result = ".$result;
					echo "</div>";
					echo "<hr>";
					$sql = "SELECT * FROM exch291_history ORDER BY dateRecord DESC";
					$sql_exe = $conn -> query($sql);
				?>
			</h4>
		</div>

		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th class="text-center" colspan="5">History</th>
				</tr>
				<tr>
					<th>You money</th>
					<th>Currency</th>
					<th>Calculated</th>
					<th>Time Record</th>
					<th>Delete</th>
				</tr>
			</thead>

		<?php 
			

			while ($row = mysqli_fetch_assoc($sql_exe)) {
				     // $array['key/field name'];
				echo "<tr>
				     <td>".$row['thb']."</td>
					 <td>"." exchage to ".$row['currency']."</td>
					 <td>".$row['calculated']."</td>
					 <td>".$row['dateRecord']."</td>";

		?>
		<td><a class="btn btn-danger"  href="delete.php?id=<?php echo $row['recordID']?> &thb=<?php echo $row['thb'] ?>">Delete</a></td>
		</tr>
		<?php

			}
			$conn->close();
		?>
		</table>
		</div>
	</body>
</html>