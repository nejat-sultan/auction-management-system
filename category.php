<?php 

include 'config.php';
ob_start();

		if(isset($_POST['Add']))
		{
            $Name=$_POST['Name'];

			$query="INSERT INTO `category` (`Name`) VALUES ('$Name')";
            $result=mysqli_query($conn,$query);

	            if($result)
	            {
	                 echo '<script type="text/javascript">';
	                 echo 'alert("Category added")';
	          	     echo '</script>';  
			
	            }
	            else
	            {
	            	echo '<script type="text/javascript">';
	                 echo 'alert("error")';
	          	     echo '</script>';  
	           	}

			
		}


?>


<!DOCTYPE html>
<html>
<head>
	<title> Home </title>
    <link rel="stylesheet" type="text/css" href="style.css">
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

        <div class="col-sm-3" style="background-color: #fff;padding:20px;margin:10px;">
            <div class="title">
                <h4 style="padding-bottom:20px;"><strong>New Category<strong></h4>
            </div>

            <form action="#" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="Name" id="Name" placeholder=" ">
                </div>
        
                <button type="submit" name="Add" class="btn btn-primary">Save</button>
            </form>
            
        </div>

    <div class="col-sm-5" style="background-color: #fff;">
            <div class="title">
                <h4><strong> Category List <strong></h4>
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php

                    $sql="Select * from `category`";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            $Id=$row['Id'];
                            $Name=$row['Name'];
                                ?>
                            <tr>
                                <th scope="row"> <?php echo $row['Id']; ?> </th>
                                <td> <?php echo $row['Name']; ?> </td>
                                <td>
                                <a href="updateCategory.php?update=<?php echo $row['Id']; ?>" style="color: green;font-size:20px;margin-right:10px;"> <span class="glyphicon glyphicon-edit"></span></a> 
                                <a href="category.php?delete=<?php echo $row['Id']; ?>" onclick="return confirm('are u sure you want to delete this Category?')" style="color: red;font-size:20px;"> <span class="glyphicon glyphicon-trash"></span></a>
                               
                            </td>
                                
                            </tr>
                            <?php 
                        }
                       
                    }
                    ?>
                </tbody>
            </table>

            <?php 
            if($conn)
            {
            if(isset($_GET['delete']))
                    {
                        $Id=$_GET['delete'];

                        $query = "delete from category where id=$Id";

                        if(mysqli_query($conn,$query))
                        {
                            
                            header("Location:category.php");
                            
                        
                        }
                        else
                        {
                            echo '<script type="text/javascript">';
                            echo 'alert("error")';
                            echo '</script>';  
                        }

                    }

                }

        ?>

    </div>
</div>

</body>
</html>