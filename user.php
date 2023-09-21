<?php 

include 'config.php';
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title> Users </title>
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
                <h4 style="padding-bottom:20px;"><strong>List of Users<strong></h4>
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php

                    $sql="SELECT id,name,username,email from `user` ";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            $Id=$row['id'];
                            $Price=$row['name'];
                            $Id=$row['username'];
                            $Price=$row['email'];
                        
                                ?>
                            <tr>
                                <th scope="row"> <?php echo $row['id']; ?> </th>
                                <td> <?php echo $row['name']; ?> </td>
                                <td> <?php echo $row['username']; ?> </td>
                                <td> <?php echo $row['email']; ?> </td>

                                <td>
                                    <a href="user.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('are u sure you want to delete this user?')" style="color: red;font-size:20px;"> <span class="glyphicon glyphicon-trash"></span></a>
                                    <button type="button" id='<?= $row['id']; ?>' class="product btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        <a href="#" class="modalLink">View Details</a>
                                    </button>
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
                        $id=$_GET['delete'];

                        $query = "delete from user where id=$id";

                        if(mysqli_query($conn,$query))
                        {
                            
                            header("Location:user.php");
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"><strong>View User</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body Products">
                        
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>


    <script>
        $(document).ready(function(){
            $('.product').click(function(){
                productId = $(this).attr('id');
                
                $.ajax({
                    url: "ajaxfile2.php",
                    method: 'post',
                    data: {IdProduct: productId},
                    success:function(result){
                        $('.Products').html(result);
                    }
                });

                $('#exampleModall').modal('show');
            });
        });
    </script>

</body>
</html>