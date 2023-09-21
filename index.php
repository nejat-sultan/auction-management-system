<! DOCTYPE html>  
<html lang="en" >  
<head>  
    <meta charset="UTF-8">  
    <title> Login Form  </title>  
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

<body>  
    <div class="pt-5">  
        <h1 class="text-center"> Login </h1>  
        <div class="container">  
            <div class="row">  
                <div class="col-md-5 mx-auto">  
                    <div class="card card-body">  
                        <form id="submitForm" method="POST" action="loginfunction.php" data-parsley-validate="" data-parsley-errors-messages-disabled="true" novalidate="" _lpchecked="1">  
                            <input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">  
                            <div class="form-group required">  
                                <lSabel for="username"> Email </lSabel>  
                                <input type="email" class="form-control text-lowercase" name="email" id="username" required="" name="username" value="">  
                            </div>                    
                            <div class="form-group required">  
                                <label for="password"> Enter your Password </label>  
                                <input type="password" class="form-control" required="" id="password" name="password" value="">  
                            </div>  
                          
                            <div class="form-group pt-1">  
                                <button class="btn btn-primary btn-block" type="submit"> Log In </button>  
                            </div>  
                        </form>  
                        <p class="small-xl pt-3 text-center">  
                            <span class="text-muted"> Not a member? </span>  
                            <a href="registration.php"> Sign up </a>  
                        </p>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  

</body>
</html>