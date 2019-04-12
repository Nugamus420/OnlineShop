<?php
include("connect.php");
session_start();

if (isset($_POST['username']))
{
	$username = $_POST['username'];
	$sql = "SELECT * FROM users WHERE username = '$username'";
	$userid = mysqli_fetch_assoc(mysqli_query($connection, $sql))['id'];

	$sql = "SELECT * FROM orderhistory WHERE userid = $userid";
	$res = mysqli_query($connection, $sql);

	if (mysqli_num_rows($res) > 0)
	{
		echo "<h3>Buys:</h3>";
		while($row = mysqli_fetch_assoc($res))
		{
			$productid = $row['productid'];
			$sql = "SELECT * FROM products WHERE id = $productid";
			$res2 = mysqli_query($connection, $sql);
			echo mysqli_fetch_assoc($res2)['title'] . "<br>";
		}
	}
}
?>

<html>
	<body>
		<form method = "post" action = "orderhistory.php">
			<label>Username :</label><input type = "text" name = "username" class = "box">
			<input type = "submit" value = "Find history" />
		</form>
	</body>
</html>