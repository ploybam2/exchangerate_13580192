<?php 
	

	if ($_SERVER['HTTP_HOST'] == 'localhost') {
		
		$DB_SERVER = 'localhost';
		$DB_USER_READER = 'root';
		$DB_PASS_READER = '';
		$DB_NAME = 'db291_exchange_rate';	

	}
	else{
		// imsu
		$DB_SERVER = 'localhost';
		$DB_USER_READER = 'u13580192';
		$DB_PASS_READER = 'c4tLQR>1Te';
		$DB_NAME = 'db13580192';	
	}
	// คำสั่งต่อกับฐานข้อมูล
	$conn = new mysqli($DB_SERVER,$DB_USER_READER,$DB_PASS_READER,$DB_NAME);
	// เช็คว่าต่อสำเร็จมั้ย

	if ($conn -> connect_error) {
		die("connection failed".$conn -> connect_error);
	}
	mysqli_set_charset($conn,"utf8");




?>