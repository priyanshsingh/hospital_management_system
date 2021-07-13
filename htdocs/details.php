<?php
	$firstName = $_POST['firstName'];
	$age = $_POST['age'];
	$blood = $_POST['blood'];
	$diagnosed = $_POST['diagnosed'];
	$appointment = $_POST['appointment'];

	// Database connection
	$conn = new mysqli('localhost','root','','register3', "3307");
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into details(firstName, age, blood, diagnosed, appointment) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sisss", $firstName, $age, $blood, $diagnosed, $appointment);
		$stmt->execute();
		
		header("LOCATION:end_success.html");
		$stmt->close();
		$conn->close();
	}
?>e