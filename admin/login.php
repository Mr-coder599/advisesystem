         <?php 
session_start();
include("../config.php");
$error="";
if(isset($_GET["active"])){
   $error="Your staff's account is yet to be activated, please contact an Administrator for activation"; 
}elseif(isset($_POST["login"])){
$username=mysqli_real_escape_string($conn, $_POST["username"]);
$password=mysqli_real_escape_string($conn, $_POST["password"]);
$sql=mysqli_query($conn, "SELECT * FROM staffs where username='" . $username . "' AND password='" . md5($password) . "'");
if($rows=mysqli_fetch_array($sql)){
      $_SESSION['name']=$rows['firstname']." ".$rows['lastname']." ".$rows['middlename'];
    $_SESSION['username']=$rows['username'];
$_SESSION['access']=$rows['access'];
$_SESSION['email']=$rows['email'];
$_SESSION['status']=$rows['status'];
    header("Location: index");
    $error="";
}else{
    $error="Incorrect username or password";
}
}

?>
      
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Staff Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="index.php"><img class="logo-img" src="assets/images/logo.png" alt="logo"></a><h3>Staff's login</h3><span class="splash-description">Please enter your user information.</span>
<?php if(isset($_GET["inactive"])) {?>
           
<div class="alert alert-danger"><?php echo $error; ?></div>
 <?php }elseif(isset($_POST["login"])) {?>
           
<div class="alert alert-danger"><?php echo $error; ?></div>
 <?php }else{
    echo "";
    } ?>
            </div>
            <div class="card-body">
            <form action="" method="post" role="form">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" type="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <input type="submit" name="login" class="btn btn-primary btn-lg btn-block" value="Sign in">
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="register.php" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="forget.php" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>