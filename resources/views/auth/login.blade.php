
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login | Accounting & Bulling Software</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/login/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/login/util.css">
    <link rel="stylesheet" type="text/css" href="css/login/main.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
                   
            <div class="wrap-login100">
                <span class="login100-form-title" style="color: #18A15F; ">
                       Online Accounting Billing Inventory Management System <br><span>Purchase, Sales, Stock</span>
                    </span>  
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/login/images/img-01.png" alt="IMG">
                </div>
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">

                    @csrf

                    <span class="login100-form-title">
                        Member Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input100" type="email" name="email" placeholder="Email" value="{{ old('email') }}"  >

                                                        <span class="invalid-feedback" role="alert">
                                 @if ($errors->has('email'))
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input100" type="password" name="password" placeholder="Password" >

                        @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>


                    
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                  

                </form>


                    <div class="text-center p-t-136" style="text-align: center;">
                        <a class="txt2" href="#">
                            ©2019 All Rights Reserved. <b>Mohaimen Khalid</b> Privacy and Terms
                            
                        </a>
                    </div>
            </div>
        </div>
    </div>
    
    

    
<!--===============================================================================================-->  
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>

