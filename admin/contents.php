<?php 
include('header.php');
 ?>
   <?php

if (isset($_POST["new"])){
  $image=$_FILES['image']['name'];
    $title=mysqli_real_escape_string($conn, $_POST["title"]);
    $content=mysqli_real_escape_string($conn, $_POST["content"]);
    $type=mysqli_real_escape_string($conn, $_GET["type"]);
    $author=mysqli_real_escape_string($conn, $_POST["author"]);
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
         if(empty($content)){

        $error[]='Please enter the update content';
$err=true;
        }else{
            $err=false;
        }
         if(empty($author)){

        $error[]='Please login to become an author';
$err=true;
        }else{
            $err=false;
        }
         if(empty($type)){

        $error[]='Please enter the type of content';
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
           if(isset($title)&&($content)&&($image)&&($type)){
        $sql="INSERT INTO contents(picture,title,content,type,author) values('". $image . "','". $title . "','" . $content . "','" . $type . "','" . $author . "')";
        if($conn->query($sql)===TRUE){


        $success='Success!  Content created successfully';
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
  $image=$_FILES['image']['name'];
    $title=mysqli_real_escape_string($conn, $_POST["title"]);
    $content=mysqli_real_escape_string($conn, $_POST["content"]);
    $type=mysqli_real_escape_string($conn, $_GET["type"]);
    $author=mysqli_real_escape_string($conn, $_POST["author"]);
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
         if(empty($content)){

        $error[]='Please enter the update content';
$err=true;
        }else{
            $err=false;
        }
          if(empty($author)){

        $error[]='Please login to become an author';
$err=true;
        }else{
            $err=false;
        }
         if(empty($type)){

        $error[]='Please enter the type of content';
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
           if(isset($content)){
        $sql = "UPDATE contents SET title='$title',picture='$image',content='$content' WHERE id='$gid'";
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
                                        $loguser="SELECT * FROM contents where id='$gid'";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){
                                                if ($row["picture"]==""){
                                                    $src="assets/images/avatar-1.jpg";
                                                }else{
                                                   $src="images/".$row["picture"];
                                                }
                                               $edit=$_GET['edit'];
                                               
                                                      $fid=$row["id"]; 
                                                 $ftitle=$row["title"]; 
                                                  $fcontent=$row["content"]; 
                                                 $ftype=$row["type"]; 
                                                 




}}
}else{
     $fid=""; 
                                                 $ftitle="";
                                                  $fcontent="";

                                                  $ftype=$_GET["type"];
}
                                                 
                                                  
                                                 
?>
   <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">New Content update</h3>
                                    <p>Make sure you enter correctly all required information about the new update.</p>
                                </div>
                                <div class="card">
                                    <h5 class="card-header">New Content</h5>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data" role="form">
                                          <div class="form-row">
                                      
                                            <div class="form-group  col-md-8">
                                                <label for="" class="col-form-label">Title</label>
                                                <input id="inputText4" type="text" name="title" value="<?php echo $ftitle; ?>" class="form-control">
                                            </div>
                                            <div class="form-group  col-md-8">
                                                <label for="" class="col-form-label">Type</label>
                                                <input id="inputText4" type="text" name="type" value="<?php echo $ftype; ?>" class="form-control" disabled>
                                            </div>
                                            <div class="form-group  col-md-8">
                                                <label for="" class="col-form-label">Author</label>
                                                <input id="inputText4" type="text" value="<?php echo $name; ?>" class="form-control" disabled>
                                                <input type="hidden" name="author" value="<?php echo $name; ?>">
                                                
                                            </div>
                                            <div class="form-group  col-md-8">
                                              <label for="" class="col-form-label">Image</label>

                                              <input type="hidden" name="size" value="1000000">
                                               <input type="file" onchange="readURL(this);" name="image" class="form-control">
                                               </div>
                                            <div class="form-group  col-md-8">
                                                <label for="" class="col-form-label">Content</label>
                                                <textarea name="content" class="form-control"><?php echo $fcontent; ?></textarea>
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
                            <h5 class="card-header">Contents : <?php echo ucwords($ftype); ?></h5>
                            <?php
                              if (isset($_GET['delete'])){
                            if (isset($_GET['id'])){
                            $gid=$_GET['id'];
                        }else{
                            $gid="";
                        }
                      

                            $sqldel="DELETE from contents where id='$gid'"; 
                            if($conn->query($sqldel)===TRUE){

                               echo "Content deleted successfully";
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
                                                <th>Author</th>
                                                <th>Title</th>
                                                <th>Post</th>
                                                <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                           
                                            
                                        <?php 

                                        $gtype=$_GET['type'];
                                        $loguser="SELECT * FROM contents where type='$gtype'";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){?>
                                                
                                                <td> <?php echo $row["id"]; ?></td>
                                               <td><?php echo $row["author"]; ?></td>
                                               <td><?php echo $row["title"]; ?></td>
                                                <td><?php echo $row["content"]; ?></td>
                                                <td><?php echo $row["picture"]; ?></td>
                                                

                                                <td><a href="contents.php?view&id=<?php echo $row["id"]; ?>&type=<?php echo $row["type"]; ?>"> <input type="submit" name="view" class="btn btn-space btn-primary" value="View"/> </a> </td>
                                                 <td><a href="?edit&id=<?php echo $row["id"]; ?>&type=<?php echo $row["type"]; ?>"> <input type="submit" name="edit" class="btn btn-space btn-success" value="Edit"/> </a> </td>
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