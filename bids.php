<?php 

include 'config.php';
session_start();

$id = $_SESSION['id'];
$name = $_SESSION['id'];
$name = $username = $email = '';
$sql = "SELECT * FROM user WHERE ID='$id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)
{

	while($row = mysqli_fetch_assoc($result))

	{
		$name = $row["name"];
		$username = $row["username"];
		$email = $row["email"];

	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Bids </title>
	<link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    
    
</head>

<style>
    body {
        background-color: #eee;
    }
</style>

<body>

    <div class="navbar">
        <p>Simple Online Auction System</p>
    </div>

    <div class="row">
        <ul class="col-sm-3">
        <li> <a href="category.php" class="sidebar">Categories</a> </li> 
        <li> <a href="product.php" class="sidebar">Products</a> </li> 
        <li> <a href="bids.php" class="sidebar">Bids</a> </li> 
        <li> <a href="user.php" class="sidebar">Users</a> </li> 
        </ul>

        <div class="col-sm-9" style="background-color: #fff;">
            <div class="title">
                <h4 style="padding-bottom:20px;"><strong>List of Bids<strong></h4>
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Bidder</th>
                        <th scope="col">Bidding Amount</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php

                    $sql="SELECT * from `bids` ";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            $Id=$row['Id'];
                            $Product_name=$row['Product_name'];
                            $Bidder_Id=$row['Bidder_Id'];
                            $Price=$row['Price'];
                        
                                ?>
                            <tr>
                                <th scope="row"> <?php echo $row['Id']; ?> </th>
                                <td>
                                <?php 
                                    $queryy = "select * from product where name='$Product_name' ";
                                    $resultt = mysqli_query($conn, $queryy);
                                    if(mysqli_num_rows($resultt) > 0)
                                    {
                                        while($cat_row = mysqli_fetch_assoc($resultt)){
                                            ?>
                                            <img src="<?php echo "upload/".$cat_row['Image']; ?>" width="100px"> 
                                            <?php
                                        }
                                    }
                                    ?>
                                </td>

                                <td> <?php echo $row['Product_name']; ?> </td>
                                <td> <?php echo $row['Bidder_Id']; ?> </td>
                                <td> <?php echo $row['Price']; ?> </td>
                                
                            </tr>
                            
                            <?php 
                        }
                    }
                ?>

                </tbody>
            </table>
        </div>
    </div>
  

</body>
</html>