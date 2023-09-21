<?php
	$sno = $_POST['sno'];
	$fname = $_POST['fname'];

	$pass= $_POST['password'];
	

	// Database connection
	$conn = new mysqli('localhost','root','Amith@2005','students');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into datalog(sno, fname, pass) values(?, ?, ?)");
		$stmt->bind_param("isi", $sno, $fname, $pass);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>