<?php 
include('header.php');
 ?>
  <!-- ============================================================== -->
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                
                                </div>
                                 <?php

if (isset($_POST["update"])){
	$image=$_FILES['image']['name'];
    $firstname=mysqli_real_escape_string($conn, $_POST["firstname"]);
    $session=mysqli_real_escape_string($conn, $_POST["session"]);
    $lastname=mysqli_real_escape_string($conn, $_POST["lastname"]);
    $middlename=mysqli_real_escape_string($conn, $_POST["middlename"]);
    $phone=mysqli_real_escape_string($conn, $_POST["phone"]);
    $email=mysqli_real_escape_string($conn, $_POST["email"]);
    $gender=mysqli_real_escape_string($conn, $_POST["gender"]);
    $department=mysqli_real_escape_string($conn, $_POST["department"]);
    $level=mysqli_real_escape_string($conn, $_POST["level"]);
     $about=mysqli_real_escape_string($conn, $_POST["about"]);
    $target="commitee/".basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target);



     $error=array();
        $err=false;
       if(empty($firstname)){

        $error[]='Please enter the commitee firstname';
        $err=true;
        }
        if(empty($lastname)){

        $error[]='Please enter the commitee lastname';
$err=true;
        }
        if(empty($middlename)){

        $error[]='Please enter the commitee middlename';
$err=true;
        }
         if(empty($about)){

        $error[]='Please enter little information about you';
$err=true;
        }
        if(empty($email)){

        $error[]='Please enter the commitee email exam';
$err=true;
        }
        if(empty($phone)){

        $error[]='Please enter the commitee phone number';
$err=true;
        }
        if(empty($gender)){

        $error[]='Please select the commitee gender';
$err=true;
        }
        if(empty($department)){

        $error[]='Please select the commitee department';
$err=true;
        }
         if(empty($level)){

        $error[]='Please select the commitee level';
$err=true;
        }


        
        if($err=true){
            $gerror="YES";
        }else{
            $gerror="NO";
        }

        foreach ($error as $key => $verror) {
        } 

    $gid=$username;
          if(isset($gender)&&($email)&&($firstname)&&($lastname)&&($middlename)&&($phone)&&($department)){
       $sql = "UPDATE commitee SET firstname='$firstname',picture='$image',lastname='$lastname',middlename='$middlename',gender='$gender',department='$department',level='$level',session='$session',about='$about',email='$email',phone='$phone' WHERE username='$gid'";
        if($conn->query($sql)===TRUE){


        $success='Success!  commitee profile updated successfully';
}else{
    $success='';
    $error[]='Error updating this account ,please try again later';
}
}else{
$success='';    
}


}

?>

<fieldset>

<?php
if (isset($_POST["update"])&& ($success)){?>
    <div class="alert alert-success"><?php echo $success; ?></div>
    <?php

if (isset($_POST["update"])&&($error)){?>
    
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
                                        <h3 class="card-title">Commitee's profile</h3>
                                       
                                    </div>
                                     <?php 
                                          if (empty($_GET['view'])){
                              
                                        $loguser="SELECT * FROM commitee where username='$username'";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){
                                                if ($row["picture"]==""){
                                                    $src="assets/images/avatar-1.jpg";
                                                }else{
                                                   $src="commitee/".$row["picture"];
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
                                        <p> Click above icon to upload the student's photo</p>
                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="" class="col-form-label">Username</label>
                                                <input id="inputText4" type="text" name="studentid" value="<?php echo $row["username"]; ?>"  class="form-control" disabled>
                                            </div>
                                              <div class="form-group col-md-6">
                                                <label for="" class="col-form-label">Firstname</label>
                                                <input id="inputText4" type="text" name="firstname" value="<?php echo $row["firstname"]; ?>"  class="form-control">
                                            </div>
                                             <div class="form-group col-md-6">
                                                <label for="" class="col-form-label">Lastname</label>
                                                <input id="inputText4" type="text" name="lastname" value="<?php echo $row["lastname"]; ?>"  class="form-control">
                                            </div>

                                             <div class="form-group col-md-6">
                                                <label for="" class="col-form-label">Middlename</label>
                                                <input id="inputText4" type="text" name="middlename" value="<?php echo $row["middlename"]; ?>"  class="form-control">
                                            </div>
                                             <div class="form-group  col-md-6">
                                                <label for="" class="col-form-label">Post</label>
                                                <select name="post" class="form-control" id="input-select">
                                                 <option value="<?php echo $row["post"]; ?>"><?php echo $row["post"]; ?></option>
                                                  
                                                        <option value="Chairman">Chairman</option>
                                                          <option value="member">member</option>
                                                                                                    </select>
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
                                                <label for="" class="col-form-label">Session</label>
                                                  <select name="session" class="form-control" id="input-select">
                                            <option value="SUG <?php echo date("Y"); ?>">SUG <?php echo date("Y"); ?></option>
                                    
                                                <?php 
                                                $loguser="SELECT * FROM faculties";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){?>
                                                <option value="<?php echo $row["tag"]." ".date("Y"); ?>"><?php echo $row["tag"]." ".date("Y"); ;?></option>
                                                    <?php }}
                                                    $loguser="SELECT * FROM departments";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){?>
                                                <option value="<?php echo $row["tag"]." ".date("Y"); ?>"><?php echo $row["tag"]." ".date("Y"); ;?></option>
                                                    <?php }}
                                              ?>
                                                </select>
                                            </div>
                                        
                                <div class="form-group  col-md-6">
                                                <label for="" class="col-form-label">Level</label>

                                               <select name="level" class="form-control" id="input-select">
                                               <option value="<?php echo $row["level"]; ?>"><?php echo $row["level"]; ?></option>

                                            <option value="ND 1">ND 1</option>
                                                         <option value="ND 2">ND 2</option>
                                                         <option value="HND 1">HND 1</option>
                                                         <option value="HND 2">HND 2</option>
                                                </select>
                                            </div>
                                                <div class="form-group  col-md-6">
                                                <label for="" class="col-form-label">Department</label>

                                               <select name="department" class="form-control" id="input-select">
                                               <option value="<?php echo $row["department"]; ?>"><?php echo $row["department"]; ?></option>

                                                <?php 
                                                $loguser="SELECT * FROM departments";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($rows=$result->fetch_assoc()){?>
                                                <option value="<?php echo $rows["department"];?>"><?php echo $rows["department"];?></option>
                                                    <?php }}
                                              ?>
                                                </select>
                                            </div>
                                <div class="form-group  col-md-6">
                                                <label for="" class="col-form-label">Registered date</label>
                                                <input id="inputText4" type="text" name="email" value="<?php echo $row["date"]; ?>"  class="form-control" disabled>
                                            </div>
                                            <div class="form-group   col-md-12">
                                                <label for="exampleFormControlTextarea1">About (Must not be more than 500 characters)</label>
                                                <textarea class="form-control" name="about" id="exampleFormControlTextarea1" rows="3"> <?php echo $row["about"]; ?></textarea>
                                            </div>
                                              
                                          </div>
                                            <input type="submit" class="btn btn-block btn-primary" name="update"  value="Update"/>
                                        </form>
                                    </div>
                                            <?php
}}
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
