<?php 
include('header.php');
 ?>
<div class="row">

                            <div class="container h-100">
<div class="row h-100 justify-content-center align-items-center">
<div class="col-10 col-md-10 col-lg-10">

                               

             <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Your Profile</h5>
                            <?php
                              if (isset($_GET['delete'])){
                            if (isset($_GET['username'])){
                            $gid=$_GET['username'];
                        }else{
                            $gid="";
                        }
                      

                            $sqldel="DELETE from staffs where username='$gid'"; 
                            if($conn->query($sqldel)===TRUE){

                               echo "staffs's record deleted successfully";
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
                                    

                                                
                                       
                                           
                                            
                                        <?php 
                                          if (isset($username)){
                              	
                                        $loguser="SELECT * FROM staffs where username='$username'";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){?>
                                            	<tr>  <td><img src="staffs/<?php echo $row["image"]; ?>" width="300px"></td> </tr>
                                           
                                        <tr>
                                            <th>SN</th><td> <?php echo $row["id"]; ?></td></tr>

                                                <tr><th>username</th> <td> <?php echo $row["username"]; ?></td></tr>
                                                <tr><th>Name</th><td><?php echo $row['firstname']." ".$row['lastname']." ".$row['middlename']; ?></td> </tr>
                                                <tr><th>Gender</th> <td><?php echo $row["gender"]; ?></td> </tr>
                                                <tr><th>Email</th> <td><?php echo $row["email"]; ?></td> </tr>
                                                <tr><th>Phone</th> <td><?php echo $row["phone"]; ?></td> </tr>

                                                <tr><th>Access</th> <td><?php echo $row["access"]; ?></td> </tr>
                                                <tr><th>Verification</th> <td><?php echo $row["status"]; ?></td> </tr>
                                                <tr><th>Registration date</th> <td><?php echo $row["date"]; ?></td> </tr>
                                                
                                                
                                      

                                            
                                           
                          <?php
}}
}
  ?>                          
                                      
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div> 
</div>
<?php 
include('footer.php');
 ?>
