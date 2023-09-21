<?php

require_once('config.php');

$name = $username = $email = $password = $phoneno = $address = $pwd = '';


$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$pwd = $_POST['password'];
$phoneno = $_POST['phoneno'];
$address = $_POST['address'];
$password = MD5($pwd);



    if(isset($_POST['email']) == true && empty($_POST['email']) == false || empty($_POST['name']) == false || empty($_POST['username']) == false || empty($_POST['password']) == false || empty($_POST['phoneno']) == false || empty($_POST['address']) == false){
    	$email = $_POST['email'];

		if(filter_var($email, FILTER_VALIDATE_EMAIL) == true) {
		
			$sql = "INSERT INTO user (name,username,email,password,phoneno,address) VALUES ('$name','$username','$email','$password','$phoneno','$address')";

			$result = mysqli_query($conn, $sql);

			if($result)

			{
				// echo "Registered Successfully!";
				header("Location: index.php");

			}

			else

			{

				echo "Error :".$sql;

			}
		}
		else{
			echo 'Email not valid';
		  }
		
    
  }
  else{
	echo 'Please enter data';
  }





?>
