<?php
include("../config.php");
if (isset($_POST["create"])){
    
    $firstname=mysqli_real_escape_string($conn, $_POST["firstname"]);
    $lastname=mysqli_real_escape_string($conn, $_POST["lastname"]);
    $middlename=mysqli_real_escape_string($conn, $_POST["middlename"]);
    $username=mysqli_real_escape_string($conn, $_POST["username"]);
    $password=mysqli_real_escape_string($conn, $_POST["password"]);
    $gender=mysqli_real_escape_string($conn, $_POST["gender"]);
    $email=mysqli_real_escape_string($conn, $_POST["email"]);
    $department=mysqli_real_escape_string($conn, $_POST["department"]);
        $phone=mysqli_real_escape_string($conn, $_POST["phone"]);
        $error=array();
        $err=false;
         $loguser="SELECT * FROM staffs";
$result=$conn->query($loguser);
$rowcount=$result->num_rows;
$addrowc=$rowcount+1;
$rowc=strlen($rowcount);
if ($rowcount===0) {
 $access="admin";
 $status="active";
} else {
 $access="staff";
  $status="inactive";
}
    if(empty($firstname)){

        $error[]='Please enter your firstname';
        $err=true;
        }
        if(empty($lastname)){

        $error[]='Please enter your lastname';
$err=true;
        }
        if(empty($middlename)){

        $error[]='Please enter your middlename';
$err=true;
        }
        if(empty($username)){

        $error[]='Please enter your username';
$err=true;
        }
        if(empty($email)){

        $error[]='Please enter your email address';
$err=true;
        }
        if(empty($phone)){

        $error[]='Please enter your phone number';
$err=true;
        }
        if(empty($gender)){

        $error[]='Please select your gender';
$err=true;
        }
        if(empty($password)){

        $error[]='Please select your password';
$err=true;
        }
        foreach ($error as $key => $verror) {
        }
            if(isset($gender)&&($email)&&($firstname)&&($lastname)&&($middlename)&&($phone)&&($password)){
        $sql="INSERT INTO staffs(firstname,lastname,middlename,username,phone,email,gender,password,access,status,department) values('". $firstname . "','" . $lastname . "','" . $middlename . "','" . $username . "','" . $phone . "','" . $email . "','" . $gender . "','" . md5($password) . "','" . $access . "','" . $status . "','" . $department . "')";
        if($conn->query($sql)===TRUE){


        $success='Success!  Registration successful';
}else{
    $success='';
    $error[]='Error registering this account ,please try again later';
}
}else{
$success='';    
}}
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Staff Registration</title>
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
    <script>
        function myFunction() {
            var x =
            document.getElementById("myInput");
            if (x.type === "password"){
                x.type = "text";
            }else{
                x.type = "password";
            }
        }
    </script>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->

    <form class="splash-container" action="" method="post">
        <div class="card">
            <div class="card-header">
            <div class="card-header text-center"><a href="index.php"><img class="logo-img" src="assets/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
                <h3 class="mb-1">Registrations Form</h3>
                <?php
if (isset($_POST["create"])&& ($success)){?>
    <div class="alert alert-success"><?php echo $success; ?>.Click<a href="login.php">here</a>  to login</div>
    <?php
}

if (isset($_POST["create"])&& ($error)){?>
    
    <?php
    foreach ($error as $key => $value) {
            
        ?>

<div class="alert alert-danger">Error! <?php echo $value; ?></div>
<?php
}}
?>
                <p>Please enter your user information.</p>
            </div>
            <div class="card-body">
            <div class="form-group col-md-12">
            <div class="form-group" >
            <label>Firstname</label>
                    <input class="form-control form-control-lg" type="text" name="firstname" required=""  autocomplete="on">

                </div>
                <div class="form-group">
                <label>Lastname</label>
                    <input class="form-control form-control-lg" type="text" name="lastname" required=""  autocomplete="on">
                </div>
                <div class="form-group">
                <label>Middlename</label>
                    <input class="form-control form-control-lg" type="text" name="middlename" required=""  autocomplete="on">
                </div>
                <div class="form-group">
                <label>Username</label>
                    <input class="form-control form-control-lg" type="text" name="username" required="" autocomplete="on">
                </div>
                <div class="form-group">
                <label>Email</label>
                    <input class="form-control form-control-lg" type="email" name="email" required=""  autocomplete="on">
                </div>
                <div class="form-group">
                <label>Phone</label>
                    <input class="form-control form-control-lg" type="number" name="phone" required=""  autocomplete="on">
                </div>
                <div class="form-group">
                <label>Password</label>
                    <input class="form-control form-control-lg" id="myInput" name="password" type="password" required="" >
                    <input  type="checkbox" onclick="myFunction()">Show password
                </div>
                 <div class="form-group">
                <label>Select department</label>
                    <select name="department" class="form-control form-control-lg">
                            <option value="Computer Science">Computer Science</option>
                            <option value="Maths and Statistics">Maths and Statistics</option>
                            <option value="Geology">Geology</option>
                            <option value="Nutrition and Dietetics">Nutrition and Dietetics</option>
                                <option value="HLTM">HLTM</option>
                        </select>
                </div>
                <div class="form-group">
                <label>Retype Password</label>
                    <input class="form-control form-control-lg" required="" >
                </div>
                 <div class="form-group">
                 <label>Gender</label>
                    <select class="form-control form-control-lg" name="gender">
                    <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group pt-2">
                    <input class="btn btn-block btn-primary" name="create" type="submit" value="Register My Account">
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">By creating an account, you agree the <a href="#">terms and conditions</a></span>
                    </label>
                </div>
               
            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="login.php" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
</body>

 
</html>