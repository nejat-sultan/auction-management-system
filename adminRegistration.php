<! DOCTYPE html>  
<html lang="en" >  
<head>  
    <meta charset="UTF-8">  
    <title> Admin Registration Form  </title>  
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
        <h1 class="text-center"> Register </h1>  
        <div class="container">  
            <div class="row">  
                <div class="col-md-5 mx-auto">  
                    <div class="card card-body">  
                        <form id="submitForm" method="POST" action="adminRegistrationFunction.php" data-parsley-validate="" data-parsley-errors-messages-disabled="true" novalidate="" _lpchecked="1">  
                            <input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">  

                            <div class="form-group required">  
                                <label for="email"> Enter your Email </label>  
                                <input type="email" class="form-control text-lowercase" id="email" required="" name="Email" value="">  
                            </div>                    
                            <div class="form-group required">  
                                <label for="password"> Enter your Password </label>  
                                <input type="password" class="form-control" required="" id="password" name="Password" value="">  
                            </div>  
                             
                            <div class="form-group pt-1">  
                                <button class="btn btn-primary btn-block" name="create" type="submit"> Register </button>  
                            </div>  
                        </form>  
                          
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  

</body>
</html>
