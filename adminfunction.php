<?php

require_once('config.php');

$Email = $Password = $pwd = '';



$Email = $_POST['Email'];

$pwd = $_POST['Password'];

$Password = MD5($pwd);

$sql = "SELECT * FROM admin WHERE Email='$Email' AND Password='$Password'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)

{

	while($row = mysqli_fetch_assoc($result))

	{

		$Id = $row["Id"];

		$Email = $row["Email"];

		session_start();

		$_SESSION['Id'] = $Id;

		$_SESSION['Email'] = $Email;

	}

	header("Location: product.php");

}

else

{

	echo "Invalid email or password";

}

?>