<?php 
include('header.php');
 ?>
   <?php

if (isset($_POST["new"])){
    $subject=mysqli_real_escape_string($conn, $_POST["subject"]);
    $exam=mysqli_real_escape_string($conn, $_POST["exam"]);


     $error=array();
        $err=false;
        if(empty($subject)){

        $error[]='Please enter the update subject';
$err=true;
        }else{
            $err=false;
        }
         if(empty($exam)){

        $error[]='Please enter the update exam';
$err=true;
        }else{
            $err=false;
        }

        
        if($err=true){
            $gerror="YES";
        }else{
            $gerror="NO";
        }

        foreach ($error as $key => $verror) {
        } 
           if(isset($exam)){
        $sql="INSERT INTO subjects(subject,exam) values('". $subject . "','" . $exam . "')";
        if($conn->query($sql)===TRUE){


        $success='Success!  subject created successfully';
}else{
    $success='';
    $error[]='Error creating subject ,please try again later';
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

if (isset($_POST["edit"])){
    $subject=mysqli_real_escape_string($conn, $_POST["subject"]);
    $exam=mysqli_real_escape_string($conn, $_POST["exam"]);


     $error=array();
        $err=false;
        if(empty($subject)){

        $error[]='Please enter the update subject';
$err=true;
        }else{
            $err=false;
        }
         if(empty($exam)){

        $error[]='Please enter the update exam';
$err=true;
        }else{
            $err=false;
        }

        
        if($err=true){
            $gerror="YES";
        }else{
            $gerror="NO";
        }

        foreach ($error as $key => $verror) {
        } 
              $gid=$_GET["id"];                                                          
           if(isset($exam)){
        $sql = "UPDATE subjects SET subject='$subject',exam='$exam' WHERE id='$gid'";
        if($conn->query($sql)===TRUE){


        $success='Success!  Update Edited successfully';
}else{
    $success='';
    $error[]='Error editing update ,please try again later';
}
}else{
$success='';    
}


}

?>

<fieldset>

<?php
if (isset($_POST["edit"])&& ($success)){?>
    <div class="alert alert-success"><?php echo $success; ?></div>
    <?php

if (isset($_POST["edit"])&&($error)){?>
    
    <?php
    foreach ($error as $key => $value) {
            
        ?>

<div class="alert alert-danger">Error! <?php echo $value; ?></div>
<?php
}}}
     if (isset($_GET['edit'])){
                                $gid=$_GET["id"];
                                        $loguser="SELECT * FROM subjects where id='$gid'";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){
                                             
                                               $edit=$_GET['edit'];
                                               
                                                  		$fid=$row["id"]; 
                                                 $fsubject=$row["subject"]; 
                                                  $fexam=$row["exam"]; 

 

}}
}else{
	 	 $fid=""; 
                                                 $fsubject="";
                                                  $fexam="";

                                              }
                                                 
                                                  
                                                 
?>
   <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-subject">New exam update</h3>
                                    <p>Make sure you enter correctly all required information about the new update.</p>
                                </div>
                                <div class="card">
                                    <h5 class="card-header">New Subject</h5>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data" role="form">
                                          <div class="form-row">
                                      
                                            <div class="form-group  col-md-8">
                                                <label for="" class="col-form-label">subject</label>
                                                <input id="inputText4" type="text" name="subject" value="<?php echo $fsubject; ?>" class="form-control">
                                            </div>
                                  
                                           
                                            <div class="form-group  col-md-8">
                                                <label for="" class="col-form-label">exam</label>
                                  
                                                <select name="exam" class="form-control" id="input-select">
                                                
                                                <option value="<?php echo $fexam; ?>"><?php echo $fexam; ?></option>
                                                         <option value="JSS">Junior Secondary School</option><option value="SSS">Senior Secondary School</option>
                                                </select>
                                            </div>
                                            
                                            
                                        
                                          
                                          <div class="form-group  col-md-8">
                                          <?php 
                                          if (isset($_GET['edit'])) {?>
                                          	<input type="submit" class="btn btn-block btn-primary" name="edit"  value="Edit"/>
                                         <?php 
                                          } else {?>
                                          <input type="submit" class="btn btn-block btn-primary" name="new"  value="Submit"/>
                                          <?php }
                                          

                                           ?>
                                            
                                            </div></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

<div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">exams</h5>
                            <?php
                              if (isset($_GET['delete'])){
                            if (isset($_GET['id'])){
                            $gid=$_GET['id'];
                        }else{
                            $gid="";
                        }
                      

                            $sqldel="DELETE from exams where id='$gid'"; 
                            if($conn->query($sqldel)===TRUE){

                               echo "exam deleted successfully";
                            }
                            else{
                                echo "Error: Something went wrong";
                                $conn->error;
                            }
                         }

                             ?>
                            <p></p>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                            

                                                <th>Id</th>
                                                <th>Subject</th>
                                                <th>Exam</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                           
                                            
                                        <?php 
                                    

                                        
                                        $loguser="SELECT * FROM subjects";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){?>
                                                
                                                <td> <?php echo $row["id"]; ?></td>
                                               <td><?php echo $row["subject"]; ?></td>
                                               <td><?php echo $row["exam"]; ?></td>
                                          
                                                

                                              
                                                 <td><a href="?edit&id=<?php echo $row["id"]; ?>"> <input type="submit" name="edit" class="btn btn-space btn-success" value="Edit"/> </a> </td>
                                                <td> <a href="?delete&id=<?php echo $row["id"]; ?>"><input type="submit" name="delete" class="btn btn-space btn-secondary" value="Delete"/></a></td>

                                            </tr>
                          <?php
}
}
  ?>                           </tbody>
                                      
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>
 <?php 
include('footer.php');
 ?>