<?php

require_once('config.php');

$Email = $Password = $pwd = '';

$Email = $_POST['Email'];
$pwd = $_POST['Password'];
$Password = MD5($pwd);



$sql = "INSERT INTO admin (Email,Password) VALUES ('$Email','$Password')";

$result = mysqli_query($conn, $sql);

if($result)

{
	echo "Registered Successfully!";
	header("Location: product.php");

}

else

{

	echo "Error :".$sql;

}

?>