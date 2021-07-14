<?php
	$number = $_POST['number'];
	$date = $_POST['date'];
	$cvv = $_POST['cvv'];
	$name = $_POST['name'];

	// Database connection
	$conn = new mysqli('localhost','root','','food_junction');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into card_details(number, date, cvv, name) values(?, ?, ?, ?)");
		$stmt->bind_param("isis", $number, $date, $cvv, $name);
		$stmt->execute();
		header("LOCATION:reg_success.html");
		$stmt->close();
		$conn->close();
	}
?>