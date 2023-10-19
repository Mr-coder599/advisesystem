<?php 
include('header.php');
 ?>
  <!-- ============================================================== -->
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">New student registration</h3>
                                    <p>Make sure you enter correctly all required information about the new student.</p>
                                </div>
                                 <?php

if (isset($_POST["new"])){
	$image=$_FILES['image']['name'];
    $name=mysqli_real_escape_string($conn, $_POST["name"]);
    $phone=mysqli_real_escape_string($conn, $_POST["phone"]);
    $email=mysqli_real_escape_string($conn, $_POST["email"]);
    $target="images/".basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target);



     $error=array();
        $err=false;

        if(empty($name)){

        $error[]='Please enter your name';
$err=true;
        }
        if(empty($email)){

        $error[]='Please enter your email exam';
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

    $gid=$_GET["matricno"];
          if(isset($email)&&($name)&&($gid)&&($phone)){
       $sql = "UPDATE students SET name='$name',picture='$image',email='$email',phone='$phone' WHERE matricno='$gid'";
        if($conn->query($sql)===TRUE){


        $success='Success!  Student profile updated successfully';
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
                                        <h3 class="card-title">Student's file</h3>
                                        <p class="card-text"> 
                                        <form action="" method="get" role="form" >
                                        <div class="form-row"> 
                                        <input type="type" name="matricno" class="form-control" placeholder="Enter the student's matric number" >
                                       </p>
                                        <input type="submit" name="view" class="btn btn-primary" value="Find"> 
                                        </div>
                                        </form>
                                    </div>
                                     <?php 
                                          if (isset($_GET['view'])){
                                $matricno=$_GET["matricno"];
                                        $loguser="SELECT * FROM students where matricno='$matricno'";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){
                                                if ($row["picture"]==""){
                                                    $src="assets/images/avatar-1.jpg";
                                                }else{
                                                   $src="students/".$row["picture"];
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
                                                <label for="" class="col-form-label">Matric number</label>
                                                <input id="inputText4" type="text" name="matricno" value="<?php echo $row["matricno"]; ?>"  class="form-control" disabled>
                                            </div>
                                              <div class="form-group col-md-6">
                                                <label for="" class="col-form-label">Name</label>
                                                <input id="inputText4" type="text" name="name" value="<?php echo $row["name"]; ?>"  class="form-control">
                                            </div>
                                             <div class="form-group col-md-6">
                                                <label for="" class="col-form-label">Email</label>
                                                <input id="inputText4" type="text" name="email" value="<?php echo $row["email"]; ?>"  class="form-control">
                                            </div>

                                            <div class="form-group  col-md-6">
                                                <label for="" class="col-form-label">Phone</label>
                                                <input id="inputText4" type="phone" name="phone" value="<?php echo $row["phone"]; ?>"  class="form-control">
                                            </div>
                                
                                              
                                          </div>
                                            <input type="submit" class="btn btn-block btn-primary" name="new"  value="Update"/>
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
