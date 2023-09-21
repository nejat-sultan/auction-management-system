<?php 

include 'config.php';
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title> Product </title>
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
                <h4><strong>List of Products<strong></h4>
                <a href="http://localhost:8080/AuctionManagement/AddProduct">
                    <button type="button" class="btn addButton"> Add Product</button>
                </a>
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category</th>
                        <th scope="col">Product</th>
                        <th scope="col">Other Info</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php

                    $sql="Select * from `product`";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            $Id=$row['Id'];
                            $Name=$row['Name'];
                            $Category=$row['Category'];
                            $Description=$row['Description'];
                            $Startbid=$row['Startbid'];
                            $Enddate=$row['Enddate'];
                            $Image=$row['Image'];
                                ?>
                            <tr>
                
                            <th scope="row"> <?php echo $row['Id']; ?> </th>
                            <td> <img src="<?php echo "upload/".$row['Image']; ?>" width="100px"> </td>
                            <td> <?php echo $row['Category']; ?> </td>
                            <td> <?php echo $row['Name']; ?> </td>
                            <td> 
                                <p> Starting Price: <?php echo $row['Startbid']; ?> </p>
                                <p> End Date: <?php echo $row['Enddate']; ?> </p>
                                <p> Description: <?php echo $row['Description']; ?> </p>
                            </td>
                            
                            <td>
                                <a href="update.php?update=<?php echo $row['Id']; ?>" style="color: green;font-size:20px;margin-right:10px;"> <span class="glyphicon glyphicon-edit"></span></a> 
                                <a href="product.php?delete=<?php echo $row['Id']; ?>" onclick="return confirm('are u sure you want to delete this product?')" style="color: red;font-size:20px;"> <span class="glyphicon glyphicon-trash"></span></a>
                               
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

                        $query = "delete from product where id=$Id";

                        if(mysqli_query($conn,$query))
                        {
                            
                            header("Location:product.php");
                            
                        
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