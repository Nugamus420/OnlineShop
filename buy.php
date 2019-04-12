<?php 
	include("connect.php");
	session_start();

	$success = false;

	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = mysqli_query($connection, $sql);
		if (mysqli_num_rows($result) > 0){
			$user = mysqli_fetch_assoc($result);
			if ($password == $user['password']){
				$userid = $user['id'];

				$items = $_SESSION['cart'];
		        if (!empty($items))
		        {
					$cartitems = explode(",", $items);
		         	foreach ($cartitems as $key=>$id) 
		         	{
						mysqli_query($connection, "INSERT INTO orderhistory (userid, productid) VALUES ($userid, $id)");
		        	}
		        	$_SESSION['cart'] = array();

		        	echo "<h3>Thanks for your purchase</h3>";
		        	$success = true;
		        }
			}
		}
	}
	if (!$success)
	{
		echo "<h3>Purchase not succesful</h3>";
	}
	echo "<a href='index.php'>Back to front page</a>";
?>