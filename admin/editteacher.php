<?php 
include('header.php');
 ?>
  <!-- ============================================================== -->
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">New Lecturer registration</h3>
                                    <p>Make sure you enter correctly all required information about the new Lecturer.</p>
                                </div>
                                 <?php

if (isset($_POST["new"])){
	$image=$_FILES['image']['name'];
    $firstname=mysqli_real_escape_string($conn, $_POST["firstname"]);
    $lastname=mysqli_real_escape_string($conn, $_POST["lastname"]);
    $middlename=mysqli_real_escape_string($conn, $_POST["middlename"]);
     $password=mysqli_real_escape_string($conn, md5($_POST["password"]));
    $phone=mysqli_real_escape_string($conn, $_POST["phone"]);
    $email=mysqli_real_escape_string($conn, $_POST["email"]);
    $gender=mysqli_real_escape_string($conn, $_POST["gender"]);
    $target="staffs/".basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target);



     $error=array();
        $err=false;
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

        
        if($err=true){
            $gerror="YES";
        }else{
            $gerror="NO";
        }

        foreach ($error as $key => $verror) {
        } 

    $gid=$_GET["username"];
            if(isset($gender)&&($email)&&($name)&&($phone)){
       $sql = "UPDATE staffs SET firstname='$firstname',lastname='$lastname',middlename='$middlename',image='$image',gender='$gender',email='$email',phone='$phone',password='$password' WHERE username='$gid'";
        if($conn->query($sql)===TRUE){


        $success='Success!  Lecturer profile updated successfully';
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
    <div class="alert alert-success"><?php echo $success; ?></div>
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
                                 <div class="card-body">
                                        <h3 class="card-title">Lecturer's file</h3>
                                        <p class="card-text"> 
                                        <form action="" method="get" role="form" >
                                        <div class="form-row"> 
                                        <input type="type" name="username" class="form-control" placeholder="Enter the Lecturer's username" >
                                       </p>
                                        <input type="submit" name="view" class="btn btn-primary" value="Find"> 
                                        </div>
                                        </form>
                                    </div>
                                     <?php 
                                          if (isset($_GET['view'])){
                                $username=$_GET["username"];
                                        $loguser="SELECT * FROM staffs where username='$username'";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){
                                                if ($row["image"]==""){
                                                    $src="assets/images/avatar-1.jpg";
                                                }else{
                                                   $src="staffs/".$row["image"];
                                                }

                                                ?>
                                    <h5 class="card-header">Update Profile</h5>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data" role="form">
                                          <div class="form-row">
                                            <div class="form-group col-md-8">
                                    <div class="user-avatar text-center d-block">
                                    <input type="hidden" name="size" value="1000000">
                                        
                                        <img id="blah" src="<?php echo $src; ?>" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                        <input type="file" onchange="readURL(this);" name="image">
                                        <p></p>
                                        <p> Click above icon to upload the Lecturer's photo</p>
                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="" class="col-form-label">Username</label>
                                                <input id="inputText4" type="text" name="username" value="<?php echo $row["username"]; ?>"  class="form-control" disabled>
                                            </div>
                                              <div class="form-group col-md-6">
                                                <label for="" class="col-form-label">Firstame</label>
                                                <input id="inputText4" type="text" name="firstname" value="<?php echo $row["firstname"]; ?>"  class="form-control">
                                            </div>
                                                  <div class="form-group col-md-6">
                                                <label for="" class="col-form-label">Lastame</label>
                                                <input id="inputText4" type="text" name="lastname" value="<?php echo $row["lastname"]; ?>"  class="form-control">
                                            </div>
                                                  <div class="form-group col-md-6">
                                                <label for="" class="col-form-label">Middlename</label>
                                                <input id="inputText4" type="text" name="middlename" value="<?php echo $row["middlename"]; ?>"  class="form-control">
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="" class="col-form-label">Gender</label>
                                                <select name="gender" class="form-control" id="input-select">
                                                 <option value="<?php echo $row["gender"]; ?>"><?php echo $row["gender"]; ?></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="" class="col-form-label">Email</label>
                                                <input id="inputText4" type="email" name="email" value="<?php echo $row["email"]; ?>"  class="form-control">
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="" class="col-form-label">Phone</label>
                                                <input id="inputText4" type="phone" name="phone" value="<?php echo $row["phone"]; ?>"  class="form-control">
                                            </div>
                                              <div class="form-group  col-md-6">
                                                <label for="" class="col-form-label">Password</label>
                                                <input id="inputText4" type="password" name="password"   class="form-control">
                                            </div>
                                            
                                              
                                          </div>
                                            <input type="submit" class="btn btn-block btn-primary" name="new"  value="Update"/>
                                        </form>
                                    </div>
                                            <?php
}}
else{
    echo("This user doesn't exist on our system");
}
}
  ?>                          
                  
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
