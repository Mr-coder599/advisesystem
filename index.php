   <?php 
session_start();
include("config.php");
$error="";
if(isset($_POST["login"])){
$matricno=mysqli_real_escape_string($conn, $_POST["matricno"]);
$password=mysqli_real_escape_string($conn, $_POST["password"]);
$sql=mysqli_query($conn, "SELECT * FROM students where matricno='" . $matricno . "' AND password='" . md5($password) . "'");
if($rows=mysqli_fetch_array($sql)){
      $_SESSION['name']=$rows['firstname']." ".$rows['lastname']." ".$rows['middlename'];
    $_SESSION['matricno']=$rows['matricno'];
    $_SESSION['department']=$rows['department'];
$_SESSION['access']=$rows['access'];
$_SESSION['email']=$rows['email'];
    header("Location: /advisesystem/student");
    $error="";
}else{
    $error="Incorrect matricno or password";
}
}

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Online Student Advising System :: Federal Poly Ede</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Validate Login & Register Forms Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}

        function myFunction() {
            var x =
            document.getElementById("myInput");
            if (x.type === "password"){
                x.type = "text";
            }else{
                x.type = "password";
            }

        }
   function myFunctionn() {
            var x =
            document.getElementById("myInput2");
            if (x.type === "password"){
                x.type = "text";
            }else{
                x.type = "password";
            }
            
        }
	</script>
	<!-- Meta tag Keywords -->

	<!-- css files -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Magra:400,700&amp;subset=latin-ext" rel="stylesheet">
	<!-- //web-fonts -->
</head>

<body>
	<!-- title -->
	<h1>
		<img src="admin/assets/images/logo.png">
		Online Student Advising System 
	</h1>
	<!-- //title -->

	<!-- content -->
	<div class="container-agille">
		<div class="formBox level-login">
			<div class="box boxShaddow"></div>
			<div class="box loginBox">
				<h3>Student Login</h3>

 <?php if(isset($_POST["login"])) {?>
           
<div class="alert alert-danger"><?php echo $error; ?></div>
 <?php } ?>
				<form class="form" action="#" method="post">
					<div class="f_row-2">
						<input type="text" class="input-field" placeholder="Matric number" name="matricno" required>
					</div>
					<div class="f_row-2 last">
						<input type="password" name="password" placeholder="Password" id="myInput" class="input-field" required><input  type="checkbox" onclick="myFunction()">Show password
					</div>
					<input class="submit-w3" type="submit" value="Login" name="login">
					<div class="f_link">
						<a href="" class="resetTag">Forgot your password?</a> | <a href="admin/">Login as Staff</a>
					</div>
				</form>
			</div>
			<div class="box forgetbox agile">
				<a href="#" class="back icon-back">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 viewBox="0 0 199.404 199.404" style="enable-background:new 0 0 199.404 199.404;" xml:space="preserve">
						<polygon points="199.404,81.529 74.742,81.529 127.987,28.285 99.701,0 0,99.702 99.701,199.404 127.987,171.119 74.742,117.876 
			  199.404,117.876 " />
					</svg>
				</a>
				<h3>Reset Password</h3>
				<form class="form" action="#" method="post">
					<p>Don't panic when you lost your password, kindly enter your email below to reset your password.</p>
					<div class="f_row last">
						<label>Email Id</label>
						<input type="email" name="email" placeholder="Email" class="input-field" required>
						<u></u>
					</div>
					<button class="btn button submit-w3">
						<span>Reset</span>
					</button>
				</form>
			</div>
			<div class="box registerBox wthree">
				<span class="reg_bg"></span>
				<h3>Student Registration</h3>
	<?php

if (isset($_POST["register"])){
	


$matricno=mysqli_real_escape_string($conn, $_POST["matricno"]);
    $name=mysqli_real_escape_string($conn, $_POST["name"]);
    $phone=mysqli_real_escape_string($conn, $_POST["phone"]);
    $email=mysqli_real_escape_string($conn, $_POST["email"]);
     $department=mysqli_real_escape_string($conn, $_POST["department"]);
    $password=mysqli_real_escape_string($conn, md5($_POST["password"]));
        $error=array();
        $err=false;


     $error=array();
        $err=false;
        if(empty($matricno)){

        $error[]='Please enter your matricno';
        $err=true;
        }
        if(empty($name)){

        $error[]='Please enter your name';
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

        foreach ($error as $key => $verror) {
        }
    if ($err=="") {
      $errors="YES";
    }else{
      $errors="";
    }
        
        if($err=true){
            $gerror="YES";
        }else{
            $gerror="NO";
        }

        foreach ($error as $key => $verror) {
        } 

     $checkuser="SELECT * FROM students where email='$email'";
        $result=$conn->query($checkuser);
        $row=$result->num_rows;
if ($row>0) {
    $error[]='This email has been used by another Student on our system';
        $err=true;
}
   if ($err=="") {
      $errors="YES";
    }else{
      $errors="";
    }

            if(isset($email)&&($matricno)&&($name)&&($phone)&&($errors)){
        $sql="INSERT INTO students(matricno,name,phone,email,password,department) values('". $matricno . "','" . $name . "','" . $phone . "','" . $email . "','" . $password . "','" . $department . "')";
        if($conn->query($sql)===TRUE){


        $success='Success!  Registration successful';
}else{
    $success='';
    $error[]='Error registering this account ,please try again later';
}
}else{
$success='';    
}


}

?>
<?php
if (isset($_POST["register"])&& ($success)){
    echo "<script>alert('Your account has been registered successful,please login ');</script>";
}


if (isset($_POST["register"])&&($error)){?>
    
    <?php
    foreach ($error as $key => $value) {

    echo "<script>alert($value);</script>";
    echo "<script>alert('Error occured! please try again... ');</script>";


}}

?>

				<form class="form" action="" method="post">
					<div class="f_row-2">
						<input type="text" class="input-field" placeholder="Matric number" name="matricno" required>
					</div>
<div class="f_row-2">
						<input type="text" class="input-field" placeholder="Email" name="email" required>
					</div>
<div class="f_row-2">
						<input type="text" class="input-field" placeholder="Phone number" name="phone" required>
						</div>
						<div class="f_row-2">
						<select name="department" style="width: 360px;height: 40px; margin-bottom: 10px;">
							<option>...Choose Department</option>
							<option value="All">All</option>
							<option value="Computer Science">Computer Science</option>
							<option value="Maths and Statistics">Maths and Statistics</option>
							<option value="Geology">Geology</option>
							<option value="Nutrition and Dietetics">Nutrition and Dietetics</option>
								<option value="HLTM">HLTM</option>
						</select>
					</div>


					<div class="f_row-2 last">
						<input type="text" name="name" placeholder="Full name" id="name" class="input-field" required>
					</div>
					<div class="f_row-2 last">
						<input type="password" name="password" placeholder="Password" id="myInput2" class="input-field" required><input  type="checkbox" onclick="myFunctionn()">Show password
					</div>
					<input class="submit-w3" type="submit" name="register" value="Register">
				</form>
			</div>
			<a href="#" class="regTag icon-add">
				<i class="fa fa-repeat" aria-hidden="true"></i>

			</a>
		</div>
	</div>
	<!-- //content -->

	<!-- copyright -->
	<div class="footer-w3ls">
	<br><br><br>
		<h2>&copy; 2023 Online Student Advising System . All rights reserved | Managed by
			<a href="http://cybernida.com">FPE Staffs</a>
		</h2>
	</div>
	<!-- //copyright -->


	<!-- js files -->
	<!-- Jquery -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //Jquery -->
	<!-- input fields js -->
	<script src="js/input-field.js"></script>
	<!-- //input fields js -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->
	<!-- //js files -->


</body>

</html>