<?php


require_once('config.php');


session_start();

$id = $_SESSION['id'];
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


<?php 

include 'config.php';

$user=$_SESSION["id"];
$query="Select * from user where name='$name'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$name=$row["name"];


		if(isset($_POST['Add']))
		{
            $Product_name=$_POST['Product_name'];
			$Price=$_POST['Price'];

			$query="INSERT INTO `bids` (`Product_name`,`Bidder_id`,`Price`) VALUES ('$Product_name','$name','$Price')";

            $result=mysqli_query($conn,$query);

	            if($result)
	            {
	                 echo '<script type="text/javascript">';
	                 echo 'alert("Bid added")';
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
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    
</head>

<style>
    body {
        background-color: #eee;
    }
</style>

<body>

    <div class="navbar">
        <p>Simple Online Auction System</p>
        <h6 style="color:#fff;float:right;margin-left:35rem;"> <?php echo $email; ?></h6>
        <a style="color:#fff;font-weight:bold;" href="logout.php">Logout</a>
    </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Categories</h4>
            
                    </div>
                </div>
                <button style="float:right;margin-right:10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#BidModal">
                    <a href="#" class="modalLink">Place a Bid</a>
                </button>
            </div>
            

            <!-- Brand List  -->
            <div class="col-md-3">
                <form action="" method="GET">
                    <div class="card shadow mt-3">
                        <div class="card-header">
                            <h5>Filter 
                                <button type="submit" class="btn btn-primary btn-sm float-right">Search</button>
                            </h5>
                        </div>
                        <div class="card-body">
                            <h6>Category List</h6>
                            <hr>
                            <?php
                                

                                $brand_query = "SELECT * FROM category";
                                $brand_query_run  = mysqli_query($conn, $brand_query);

                                if(mysqli_num_rows($brand_query_run) > 0)
                                {
                                    foreach($brand_query_run as $brandlist)
                                    {
                                        $checked = [];
                                        if(isset($_GET['categories']))
                                        {
                                            $checked = $_GET['categories'];
                                        }
                                        ?>
                                            <div>
                                                <input type="checkbox" name="categories[]" value="<?= $brandlist['Name']; ?>" 
                                                    <?php if(in_array($brandlist['Id'], $checked)){ echo "checked"; } ?>
                                                 />
                                                <?= $brandlist['Name']; ?>
                                            </div>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "No Brands Found";
                                }
                            ?>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Brand Items - Products -->
            <div class="col-md-9 mt-3">
                <div class="card ">
                    <div class="card-body row">
                        <?php
                            if(isset($_GET['categories']))
                            {
                                $branchecked = [];
                                $branchecked = $_GET['categories'];
                                foreach($branchecked as $rowbrand)
                                {
                                    // echo $rowbrand;
                                    $date=date('Y/m/d');
                                    $products = "SELECT * FROM product WHERE Category IN ('$rowbrand') && Enddate>='$date'";
                                    $products_run = mysqli_query($conn, $products);
                                    if(mysqli_num_rows($products_run) > 0)
                                    {
                                        foreach($products_run as $proditems) :
                                            ?>
                                                <div class="col-md-4 mt-3">
                                                    <div class="border p-2" style="margin-bottom: 30px;">

                                                        <img class="card-img-top"  src="<?= "upload/".$proditems['Image']; ?>" alt="Card image cap">
                                                        <h5 class="card-title m-0"> <?= $proditems['Name']; ?> </h5>
                                                        <p class="card-text m-0">Category:<?= $proditems['Category']; ?></p>
                                                        <p class="card-text">Deadline: <?= $proditems['Enddate']; ?> </p>
                                                        <button type="button" id='<?= $proditems['Id']; ?>' class="product btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                            <a href="#" class="modalLink">View Details</a>
                                                        </button>

                                                    </div>
                                                </div>
                                            <?php
                                        endforeach;
                                    }
                                    else
                                    {
                                        echo "No Items Found";
                                    }
 
                                    
                                }
                            }
                            else
                            {
                                $date=date('Y/m/d');
                                $products = "SELECT * FROM product where Enddate>='$date'";
                                $products_run = mysqli_query($conn, $products);
                                if(mysqli_num_rows($products_run) > 0)
                                {
                                    foreach($products_run as $proditems) :
                                        ?>
                                            <div class="col-md-4 mt-3">
                                                <div class="border p-2" style="margin-bottom: 30px;">

                                                    <img class="card-img-top"  src="<?= "upload/".$proditems['Image']; ?>" alt="Card image cap">
                                                    <h5 class="card-title m-0"> <?= $proditems['Name']; ?> </h5>
                                                    <p class="card-text m-0">Category:<?= $proditems['Category']; ?></p>
                                                    <p class="card-text">Deadline: <?= $proditems['Enddate']; ?> </p>
                                                    <button type="button" id='<?= $proditems['Id']; ?>' class="product btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                        <a href="#" class="modalLink">View Details</a>
                                                    </button>
                                                    
                                                </div>
                                            </div>
                                        <?php
                                    endforeach;
                                }
                                else
                                {
                                    echo "No Items Found";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div> 

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body Products">
                        
                    </div>
                    <div class="modal-footer">
                    <!-- <form action="#" method="post">
                        <input type="text" name="Price" class="form-control" id="input" placeholder="">
                        <input type="submit" name="Add" value="Place Bid" class="btn btn-primary">
                    </form> -->
                    </div>
                </div>
            </div>
        </div>


    <script>
        $(document).ready(function(){
            $('.product').click(function(){
                productId = $(this).attr('Id');
                
                $.ajax({
                    url: "ajaxfile.php",
                    method: 'post',
                    data: {IdProduct: productId},
                    success:function(result){
                        $('.Products').html(result);
                    }
                });

                $('#exampleModal').modal('show');
            });
        });
    </script>



        <!-- Modal -->
        <div class="modal fade" id="BidModal" tabindex="-1" role="dialog" aria-labelledby="BidLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bid for Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                    <form action="#" method="post">
                        <input type="text" name="Price" class="form-control" id="input" placeholder="">
                        <select class="form-control" name="Product_name" id="input">
                            <?php 
                            $query = "select * from product";
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0)
                            {
                                while($product_row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <option value="<?php echo $product_row['Name'] ?>"> <?php echo $product_row['Name'] ?> </option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                       
                   
                    </div>
                    <div class="modal-footer">
                   
                        <input type="submit" name="Add" value="Place Bid" class="btn btn-primary">
                    </form>
                    </div>
                </div>
            </div>
        </div>



</body>
</html>