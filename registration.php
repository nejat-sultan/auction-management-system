<! DOCTYPE html>  
<html lang="en" >  
<head>  
    <meta charset="UTF-8">  
    <title> Registration Form  </title>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">  
</head>  
<style>  
    body {  
    background: #165725 !important;  
    font-family: 'Muli', sans-serif;  
    }  
    h1 {  
    color: #fff;  
    padding-bottom: 2rem;  
    font-weight: bold;  
    }  
    a {  
    color: #333;  
    }  
    a:hover {  
    color: #E8D426;  
    text-decoration: none;  
    }  
    .form-control:focus {  
        color: #000;  
        background-color: #fff;  
        border: 2px solid #E8D426;  
        outline: 0;  
        box-shadow: none;  
    }  
    .btn {  
    background: #28a745;  
    border: #E8D426;  
    }  
    .btn:hover {  
    background: #28a745;  
    border: #E8D426;  
    }  
</style>

  <?php
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty($_POST['name'])){
      $name_error = "Please enter the name";
    }
    if(empty($_POST['username'])){
      $username_error = "Please enter the name";
    }
    if(empty($_POST['email'])){
      $email_error = "Please enter the name";
    }
    if(empty($_POST['password'])){
      $password_error = "Please enter the name";
    }
    if(empty($_POST['phoneno'])){
      $phoneno_error = "Please enter the name";
    }
    if(empty($_POST['address'])){
      $address_error = "Please enter the name";
    }
  }

  ?> 

  

<body>  
    <div class="pt-5">  
        <h1 class="text-center"> Register </h1>  
        <div class="container">  
            <div class="row">  
                <div class="col-md-5 mx-auto">  
                    <div class="card card-body">  
                        <form id="submitForm" method="POST" action="registrationfunction.php" data-parsley-validate="" data-parsley-errors-messages-disabled="true" novalidate="" _lpchecked="1">  
                            <input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">  

                            <div class="form-group required">  
                                <label for="name"> Enter your Name </label>  
                                <input type="text" class="form-control text-lowercase" id="name" required="" name="name" value="">  
                                <span><?php if(isset($name_error)) echo $name_error; ?></span>
                            </div> 
                            <div class="form-group required">  
                                <label for="username"> Enter your Username </label>  
                                <input type="text" class="form-control text-lowercase" id="username" required="" name="username" value=""> 
                                <span><?php if(isset($username_error)) echo $username_error; ?></span> 
                            </div> 
                            <div class="form-group required">  
                                <label for="email"> Enter your Email </label>  
                                <input type="email" class="form-control text-lowercase" id="email" required="" name="email" value="">
                                <span><?php if(isset($email_error)) echo $email_error; ?></span>  
                            </div>                    
                            <div class="form-group required">  
                                <label for="password"> Enter your Password </label>  
                                <input type="password" class="form-control" required="" id="password" name="password" value="">  
                                <span><?php if(isset($password_error)) echo $password_error; ?></span>
                            </div>
                            <div class="form-group required">  
                                <label for="phoneno"> Enter your Phone number </label>  
                                <input type="text" class="form-control text-lowercase" id="phoneno" required="" name="phoneno" value=""> 
                                <span><?php if(isset($phoneno_error)) echo $phoneno_error; ?></span> 
                            </div>                    
                            <div class="form-group required">  
                                <label for="address"> Enter your Address </label>  
                                <input type="address" class="form-control" required="" id="address" name="address" value=""> 
                                <span><?php if(isset($address_error)) echo $address_error; ?></span> 
                            </div>   
                             
                            <div class="form-group pt-1">  
                                <button class="btn btn-primary btn-block" name="create" type="submit"> Register </button>  
                            </div>  
                        </form>  
                        <p class="small-xl pt-3 text-center">  
                            <span class="text-muted"> Already have an account? </span>  
                            <a href="index.php"> Sign in </a>  
                        </p>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  

</body>
</html>







<!-- <div id="frmRegistration">

<form class="form-horizontal" action="registrationfunction.php" method="POST">

	<h1>User Registration</h1>

	<div class="form-group">

    <label class="control-label col-sm-2" for="firstname">First Name:</label>

    <div class="col-sm-6">

      <input type="text" name="name" class="form-control" id="firstname" placeholder="Enter Firstname">

    </div>

  </div>

  <div class="form-group">

    <label class="control-label col-sm-2" for="username">user Name:</label>

    <div class="col-sm-6">

      <input type="text" name="username" class="form-control" id="lastname" placeholder="Enter Lastname">

    </div>

  </div>


  <div class="form-group">

    <label class="control-label col-sm-2" for="email">Email:</label>

    <div class="col-sm-6">

      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">

    </div>

  </div>

  <div class="form-group">

    <label class="control-label col-sm-2" for="pwd">Password:</label>

    <div class="col-sm-6"> 

      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">

    </div>

  </div>

  <div class="form-group"> 

    <div class="col-sm-offset-2 col-sm-10">

      <button type="submit" name="create" class="btn btn-primary">Submit</button>

    </div>

  </div>

</form>

</div> -->