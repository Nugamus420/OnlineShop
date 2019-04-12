<?php 
	include("connect.php");
	session_start();

	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		//Find alle brugere med det skrevne nav
		$sql1 = "SELECT * FROM users WHERE username = '$username'";
		$res = mysqli_query($connection, $sql1);

		//Opret konto, kun hvis der er ingen med navnet allerede
		if (mysqli_num_rows($res) == 0)
		{
			$sql2 = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
			mysqli_query($connection, $sql2);
		}

		header("Location: registration.html");
	}
?>