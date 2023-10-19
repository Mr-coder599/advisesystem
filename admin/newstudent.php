<?php 
include('header.php');
 ?>
  <!-- ============================================================== -->
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">New students registration</h3>
                                    <p>Make sure you enter correctly all required information about the new student.</p>
                                </div>
                                 <?php

if (isset($_POST["new"])){
	$image=$_FILES['image']['name'];


$matricno=mysqli_real_escape_string($conn, $_POST["matricno"]);
    $name=mysqli_real_escape_string($conn, $_POST["name"]);
    $phone=mysqli_real_escape_string($conn, $_POST["phone"]);
    $email=mysqli_real_escape_string($conn, $_POST["email"]);
    $password=mysqli_real_escape_string($conn, $_POST["password"]);
        $error=array();
        $err=false;




    $target="students/".basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target);



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

            if(isset($email)&&($matricno)&&($name)&&($phone)){
        $sql="INSERT INTO students(matricno,name,phone,email,password,picture) values('". $matricno . "','" . $name . "','" . $phone . "','" . $email . "','" . $password . "','" . $image . "')";
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

<fieldset>

<?php
if (isset($_POST["new"])&& ($success)){?>
    <div class="alert alert-success"><?php echo $success; ?>.Click <a href="login.php">here</a>  to login</div>
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
                                                            <?php 
if (isset($_POST["new"])&& ($success)){?>
  <div class="success" style="">
      <p> This Student Matric number is <?php echo($matricno); ?> </p>
      <p>Please keep it safe because it will be used for login to check the portal for notice</p>

  </div>
<?php
}
 ?>
                                    <div class="user-avatar text-center d-block">
                                    <input type="hidden" name="size" value="1000000">
                                        
                                        <img id="blah" src="assets/images/avatar-1.jpg" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                        <input type="file" onchange="readURL(this);" name="image">
                                        <p></p>
                                        <p> Click above icon to upload the students's photo</p>
                                    </div>
                                            </div>
                                           
                                              <div class="form-group col-md-6">
                                                <label for="" class="col-form-label">Matric number</label>
                                                <input id="inputText4" type="text" name="matricno" class="form-control">
                                            </div>
                                             <div class="form-group col-md-6">
                                                <label for="" class="col-form-label">Name</label>
                                                <input id="inputText4" type="text" name="name" class="form-control">
                                            </div>

                                  
                                         <div class="form-group  col-md-6">
                                                <label for="" class="col-form-label">Phone</label>
                                                <input id="inputText4" type="text" name="phone" class="form-control">
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="" class="col-form-label">Email</label>
                                                <input id="inputText4" type="email" name="email" class="form-control">
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="" class="col-form-label">Password</label>
                                                <input id="inputText4" type="password" name="password" class="form-control">
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
