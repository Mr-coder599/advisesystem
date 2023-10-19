<?php 
include('header.php');
 ?>
  <!-- ============================================================== -->
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">New teacher's registration</h3>
                                    <p>Make sure you enter correctly all required information about the new prison inmate.</p>
                                </div>
                                 <?php
 $loguser="SELECT * FROM staffs";
$result=$conn->query($loguser);
$rowcount=$result->num_rows;
$addrowc=$rowcount+1;
$rowc=strlen($rowcount);
if ($rowcount===0) {
 $access="admin";
} else {
 $access="staff";
}



  $first="";
  $second="";

if (isset($_POST["new"])){
	$image=$_FILES['image']['name'];

// $name=mysqli_real_escape_string($conn, $_POST["name"]);
//   $nme=explode(' ', $name);
// $first=substr($nme[0], 0,1);
// $second=substr($nme[1], 0,1);
 $firstname=mysqli_real_escape_string($conn, $_POST["firstname"]);
    $lastname=mysqli_real_escape_string($conn, $_POST["lastname"]);
    $middlename=mysqli_real_escape_string($conn, $_POST["middlename"]);
    $username=mysqli_real_escape_string($conn, $_POST["username"]);
    $password=mysqli_real_escape_string($conn, $_POST["password"]);
    $phone=mysqli_real_escape_string($conn, $_POST["phone"]);
    $email=mysqli_real_escape_string($conn, $_POST["email"]);
    $status=mysqli_real_escape_string($conn, $_POST["status"]);
    $gender=mysqli_real_escape_string($conn, $_POST["gender"]);
        $error=array();
        $err=false;

        $checkuser="SELECT * FROM staffs where email='$email'";
        $result=$conn->query($checkuser);
        $row=$result->num_rows;
if ($row>0) {
    $error[]='This email has been used by another Lecturer on our system';
        $err=true;
}
    $target="staffs/".basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target);



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

        $error[]='Please enter your username number';
$err=true;
        }
        if(empty($password)){

        $error[]='Please enter your password';
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
             $checkuser="SELECT * FROM staffs where email='$email'";
        $result=$conn->query($checkuser);
        $row=$result->num_rows;
if ($row>0) {
    $error[]='This email has been used by another Lecturer on our system';
        $err=true;
}
          if ($err=="") {
      $errors="YES";
    }else{
      $errors="";
    }
        
        foreach ($error as $key => $verror) {
        }
        if(isset($gender)&&($email)&&($name)&&($phone)&&($errors)){
        $sql="INSERT INTO staffs(firstname,lastname,middlename,username,password,phone,email,gender,status,access,image) values('". $firstname . "','" . $lastname . "','" . $middlename . "','" . $username . "','" . md5($password) . "','" . $phone . "','" . $email . "','" . $gender . "','" . $status . "','" . $access . "','" . $image . "')";
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
var_dump($_POST)

?>

<fieldset>

<?php
if (isset($_POST["new"])&& ($success)){?>
    <div class="alert alert-success"><?php echo $success; ?>.Click <a href="t-record.php">here</a>  to activate this teacher's account</div>
    <?php

if (isset($_POST["new"])&&($error)){?>
    
    <?php
    foreach ($error as $key => $value) {
            
        ?>

<div class="alert alert-danger">Error! <?php echo $value; ?></div>
<?php
}}}

?>
<script type="text/javascript">
	function readURL(input){
		if(input.files && input.files[0]){
			var reader = new FileReader();
			reader.onload=function(e){
				$('#blah')
				.attr('src',e.target.result);
			};
			reader.readAsDataURL(input.files[0])
		}
	}
</script>
                                <div class="card">
                                    <h5 class="card-header">New Profile</h5>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data" role="form">
                                          <div class="form-row">
                                            <div class="form-group col-md-8">
                                    <div class="user-avatar text-center d-block">
                                    <input type="hidden" name="size" value="1000000">
                                        
                                        <img id="blah" src="assets/images/avatar-1.jpg" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                        <input type="file" onchange="readURL(this);" name="image">
                                        <p></p>
                                        <p> Click above icon to upload the teacher's photo</p>
                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="" class="col-form-label">Username</label>
                                                 <input type="text" class="form-control" name="username" value="">
                                           
                                            </div>
                                              <div class="form-group col-md-6">
                                                <label for="" class="col-form-label">Firstame</label>
                                                <input id="inputText4" type="text" name="firstname" class="form-control">
                                            </div>
                                               <div class="form-group col-md-6">
                                                <label for="" class="col-form-label">Lastname</label>
                                                <input id="inputText4" type="text" name="lastname" class="form-control">
                                            </div>
                                             
                                               <div class="form-group col-md-6">
                                                <label for="" class="col-form-label">Middlename</label>
                                                <input id="inputText4" type="text" name="middlename" class="form-control">
                                            </div>
                                             
                                             
                                            <div class="form-group  col-md-6">
                                                <label for="" class="col-form-label">Email</label>
                                                <input id="inputText4" type="email" name="email" class="form-control">
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="" class="col-form-label">Phone</label>
                                                <input id="inputText4" type="phone" name="phone" class="form-control">
                                            </div>
                                              <input type="hidden" name="status" value="NO">
                                    <div class="form-group  col-md-6">
                                                <label for="" class="col-form-label">Password</label>
                                                <input id="inputText4" type="text" name="password" class="form-control">
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="" class="col-form-label">Gender</label>
                                                <select name="gender" class="form-control" id="input-select">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                              
                                          </div>
                                            <input type="submit" class="btn btn-block btn-primary" name="new"  value="Submit"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic form  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- select options  -->
                        <!-- ============================================================== -->
<?php 
include('footer.php');
 ?>
