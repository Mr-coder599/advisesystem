<?php 
include('header.php');
 ?>
   <?php

if (isset($_POST["new"])){
	$image=$_FILES['image']['name'];
    $title=mysqli_real_escape_string($conn, $_POST["title"]);
    $note=mysqli_real_escape_string($conn, $_POST["note"]);

    $sender=mysqli_real_escape_string($conn, $_POST["sender"]);
    $designated=mysqli_real_escape_string($conn, $_POST["designated"]);
    $target="updates/".basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target);



     $error=array();
        $err=false;
        if(empty($title)){

        $error[]='Please enter the update title';
$err=true;
        }else{
            $err=false;
        }
         if(empty($note)){

        $error[]='Please enter the update note';
$err=true;
        }else{
            $err=false;
        }
         if(empty($sender)){

        $error[]='Please login to become a sender';
$err=true;
        }else{
            $err=false;
        }
         if(empty($designated)){

        $error[]='Please select a designator';
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
           if(isset($title)&&($note)&&($image)){
        $sql="INSERT INTO notes(file,title,note,sender,designated) values('". $image . "','". $title . "','" . $note . "','" . $sender . "','" . $designated . "')";
        if($conn->query($sql)===TRUE){


        $success='Success!  Note created successfully';
}else{
    $success='';
    $error[]='Error creating update ,please try again later';
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
        $file=mysqli_real_escape_string($conn, $_POST["file"]);
	$image=$_FILES['image']['name'];
    if ($image=="") {
       $image=$file;
    } else {
       $image=$_FILES['image']['name'];
    }
    
    $title=mysqli_real_escape_string($conn, $_POST["title"]);
    $note=mysqli_real_escape_string($conn, $_POST["note"]);
    $sender=mysqli_real_escape_string($conn, $_POST["sender"]);
    $designated=mysqli_real_escape_string($conn, $_POST["designated"]);
    $target="updates/".basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target);



     $error=array();
        $err=false;
        if(empty($title)){

        $error[]='Please enter the update title';
$err=true;
        }else{
            $err=false;
        }
         if(empty($note)){

        $error[]='Please enter the update note';
$err=true;
        }else{
            $err=false;
        }
          if(empty($sender)){

        $error[]='Please login to become an sender';
$err=true;
        }else{
            $err=false;
        }
         if(empty($designated)){

        $error[]='Please enter the designator of note';
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
           if(isset($note)){
        $sql = "UPDATE notes SET title='$title',file='$image',note='$note',designated='$designated' WHERE id='$gid'";
        if($conn->query($sql)===TRUE){


        $success='Success!  Notice Edited successfully';
}else{
    $success='';
    $error[]='Error editing notice ,please try again later';
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
                                        $loguser="SELECT * FROM notes where id='$gid'";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){
                                                if ($row["file"]==""){
                                                    $src="assets/images/avatar-1.jpg";
                                                }else{
                                                   $src="images/".$row["file"];
                                                }
                                               $edit=$_GET['edit'];
                                               
                                                  		$fid=$row["id"]; 
                                                 $ftitle=$row["title"]; 
                                                  $fnote=$row["note"]; 
                                                   $ffile=$row["file"]; 
                                                 $fdesignated=$row["designated"]; 
                                                 




}}
}else{
	 	 $fid=""; 
                                                 $ftitle="";
                                                  $fnote="";
                                                    $ffile="";

                                                  $fdesignated="";
}
                                                 
                                                  
                                                 
?>
   <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">New Advise record</h3>
                                    <p>Make sure you enter correctly all required information about the new advise.</p>
                                </div>
                                <div class="card">
                                    <h5 class="card-header">New advise</h5>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data" role="form">
                                          <div class="form-row">
                                      
                                            <div class="form-group  col-md-8">
                                                <label for="" class="col-form-label">Title</label>
                                                <input id="inputText4" type="text" name="title" value="<?php echo $ftitle; ?>" class="form-control">
                                                <input id="inputText4" type="hidden" name="file" value="<?php echo $ffile; ?>" class="form-control">
                                            </div>
                                            <div class="form-group  col-md-8">
                                                <label for="" class="col-form-label">Department</label>
                                                <select id="inputText4" name="designated" class="form-control">
                                                <option value="<?php echo $fdesignated; ?>"><?php echo $fdesignated; ?></option>
                                                 <option value="Computer Science">Computer Science</option>
                            <option value="Maths and Statistics">Maths and Statistics</option>
                            <option value="Geology">Geology</option>
                            <option value="Nutrition and Dietetics">Nutrition and Dietetics</option>
                                <option value="HLTM">HLTM</option>
                                     
                                            
                                                  
                                                </select>

                                            </div>
                                            <div class="form-group  col-md-8">
                                                <label for="" class="col-form-label">Adviser</label>
                                                <input id="inputText4" type="text" value="<?php echo $name; ?>" class="form-control" disabled>
                                                <input type="hidden" name="sender" value="<?php echo $name; ?>">
                                                
                                            </div>
                                            <div class="form-group  col-md-8">
                                              <label for="" class="col-form-label">File</label>

                                              <input type="hidden" name="size" value="1000000">
                                               <input type="file" onchange="readURL(this);" name="image" class="form-control">
                                               </div>
                                            <div class="form-group  col-md-8">
                                                <label for="" class="col-form-label">Note</label>
                                                <textarea name="note" class="form-control"><?php echo $fnote; ?></textarea>
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
                            <h5 class="card-header">Notes : <?php echo ucwords($fdesignated); ?></h5>
                            <?php
                              if (isset($_GET['delete'])){
                            if (isset($_GET['id'])){
                            $gid=$_GET['id'];
                        }else{
                            $gid="";
                        }
                      

                            $sqldel="DELETE from notes where id='$gid'"; 
                            if($conn->query($sqldel)===TRUE){

                               echo "note deleted successfully";
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
                                                <th>Adviser</th>
                                                <th>Title</th>
                                                <th>Advise</th>
                                                <th>Department</th>
                                                <th>File</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                           
                                            
                                        <?php 

                                       if ($access=="staff") {
                                           $loguser="SELECT * FROM notes where designated !='Administrator'";
                                       }else{
                                           $loguser="SELECT * FROM notes";
                                       }
                                     
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){?>
                                                
                                                <td> <?php echo $row["id"]; ?></td>
                                               <td><?php echo $row["sender"]; ?></td>
                                               <td><?php echo $row["title"]; ?></td>
                                                <td><?php echo $row["note"]; ?></td>
                                                <td><?php echo $row["designated"]; ?></td>
                                                <td><?php echo $row["file"]; ?></td>
                                                 <td><?php echo $row["date"]; ?></td>
                                                

                                                <td><a href="updates/<?php echo $row["file"]; ?>"><input type="submit" name="edit" class="btn btn-space btn-success" value="Download"/> </a></a> </td>
                                                <?php

                                                     if ($name==$row["sender"]) {?>
                                    
                                                 <td><a href="?edit&id=<?php echo $row["id"]; ?>"> <input type="submit" name="edit" class="btn btn-space btn-success" value="Edit"/> </a> </td>


                                                <td> <a href="?delete&id=<?php echo $row["id"]; ?>"><input type="submit" name="delete" class="btn btn-space btn-secondary" value="Delete"/></a></td>
                                          <?php } ?>
                                            


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