<?php
   include("config/connect.php");
   session_start();
   
   if(isset($_SESSION['login_user'])){
      header("location:/home/");
      die();
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - Data Entry</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-home100">
            <div class="wrap-home100">
                <form class="home100-form validate-form" id="login-form" action="" method="POST">
                    <span class="home100-form-logo">
						<div class="home100-pic js-tilt" data-tilt>
							<img src="images/img-01.png" alt="IMG">
						</div>
					</span>

                    <span class="home100-form-title p-b-34 p-t-27">
						Member Login
					</span>

                    <div id="login-msg"  class="alert alert-danger text-center dis-none">
                        <strong>Error!</strong> Wrong Username/Password
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye-off"></i>
                        </span>
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="container-home100-form-btn">
                            <button class="home100-form-btn">
							Login
                            </button>
                    </div>

                    <!-- <div class="text-center p-t-90">
                        <a class="txt1" href="#">
							Forgot Password?
						</a>
                    </div> -->
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        });

    </script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/validate.js"></script>
    <script>

        <?php

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $post = true;

                $username = trim($_POST['username']);
                $password = $_POST['password'];
                
                $tsql= "SELECT fullname FROM dbo.csgopr WHERE no = '$username' and pass = '$password'";

                $getResults= sqlsrv_query($db, $tsql);
                
                if ($getResults == FALSE){
                    echo " <br/> SERVER ERROR! PLEASE RELOAD AND TRY AGAIN <br/>";
                }
                $count = 0;
                $name = '';
                while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
                    $count++;
                    $name = $row['fullname'];
                }
                sqlsrv_free_stmt($getResults);
                if($count == 1) {
                    $_SESSION['login_user'] = $username;
                }
            } 
        ?>
        var post = '<?php echo $post; ?>';
        if(Boolean(post)){
            var count = '<?php echo $count; ?>';
            var username = '<?php echo $username; ?>';
            var name = '<?php echo $name; ?>';
            if(Number(count)){

                $("#login-msg").hide();
                $(".input100[name='username']").val(''); 
                $(".input100[name='password']").val('');
                
                window.location.replace("/home/");

            } else {
                $("#login-msg").fadeIn();
            }
        }
    </script>

</body>

</html>