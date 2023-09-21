<?php 

include 'config.php';

		if(isset($_POST['Add']))
		{

			$Name=$_POST['Name'];
            $Category=$_POST['Category'];
            $Description=$_POST['Description'];
            $Startbid=$_POST['Startbid'];
            $Enddate=$_POST['Enddate'];
            $Image=$_POST['Image'];

			$query="INSERT INTO `product` (`Name`,`Category`,`Description`,`Startbid`,`Enddate`,`Image`) VALUES ('$Name', '$Category', '$Description', '$Startbid', '$Enddate','$Image')";

            $result=mysqli_query($conn,$query);

	            if($result)
	            {
	                 echo '<script type="text/javascript">';
	                 echo 'alert("Product added")';
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
	<title> Add Product </title>
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
                <h4 style="padding-bottom:20px;"><strong>New Products<strong></h4>
            </div>

            <form action="#" method="post">
                <div class="form-row">
                    <div class="col-sm-6">
                        <label for="text">Name</label>
                        <input type="text" name="Name" class="form-control" id="input" placeholder="Lenovo">
                    </div>
                    <div class="col-sm-6">
                        <label for="select">Category</label>
                        <select class="form-control" name="Category" id="input">
                            <?php 
                            $query = "select * from category";
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0)
                            {
                                while($cat_row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <option value="<?php echo $cat_row['Name'] ?>"> <?php echo $cat_row['Name'] ?> </option>
                                    <?php
                                }
                            }
                            ?>
                            <!-- <option>Laptop</option>
                            <option>Mobile Phones</option>
                            <option>Cars</option>
                            <option>Television</option> -->
                        </select>
                    </div>
                </div> 
                <div class="form-row">
                    <div class="col-sm-10">
                        <label for="textarea">Description</label>
                        <textarea name="Description" class="form-control" id="input" rows="3"></textarea>
                    </div>
                </div> 
                <div class="form-row">
                    <div class="col-sm-6">
                        <label for="number">Start Bidding Amount</label>
                        <input type="number" name="Startbid" class="form-control" id="input" placeholder="0">
                    </div>
                    <div class="col-sm-6" style="margin-bottom: 20px;">
                        <label for="text">Bidding End Date</label>
                        <input type="date" name="Enddate" class="form-control" id="input" placeholder="0">
                    </div>
                </div> 
                <div class="form-row">
                    <div class="col-sm-6" style="margin-bottom: 50px;">
                        <label for="text">Product Image/File</label>
                        <div class="custom-file">
                            <input type="file" name="Image" class="custom-file-input" id="input">
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-2" style="margin-top: 50px;margin-bottom: 50px;float:right;">
                    <input type="submit" name="Add" value="Add" class="style btn-primary"/>
                </div>
                
            </form>
            
        </div>
    </div>

</body>
</html>