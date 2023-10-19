<?php 
include('header.php');
 ?>



<div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Lecturer's record</h5>
                            <?php
                              if (isset($_GET['delete'])){
                            if (isset($_GET['id'])){
                            $gid=$_GET['id'];
                        }else{
                            $gid="";
                        }
                      

                            $sqldel="DELETE from staffs where id='$gid'"; 
                            if($conn->query($sqldel)===TRUE){

                               echo "Lecturer's record deleted successfully";
                            }
                            else{
                                echo "Error: Something went wrong";
                                $conn->error;
                            }
                         }

                                if (isset($_GET['verify'])){
                            if (isset($_GET['username'])){
                            $gid=$_GET['username'];
                        }else{
                            $gid="";
                        }
                      

                            $sqlverify="UPDATE staffs SET status='active' where username='$gid'"; 
                            if($conn->query($sqlverify)===TRUE){

                               echo "Lecturer has been activated successfully";
                            }
                            else{
                                echo "Error: Something went wrong";
                                $conn->error;
                            }
                         }
                         if (isset($_GET['verifyno'])){
                            if (isset($_GET['username'])){
                            $gid=$_GET['username'];
                        }else{
                            $gid="";
                        }
                      

                            $sqlverify="UPDATE staffs SET status='inactive' where username='$gid'"; 
                            if($conn->query($sqlverify)===TRUE){

                               echo "Lecturer has been deactivated successfully";
                            }
                            else{
                                echo "Error: Something went wrong";
                                $conn->error;
                            }
                         }
                               if (isset($_GET['makeadmin'])){
                            if (isset($_GET['username'])){
                            $gid=$_GET['username'];
                        }else{
                            $gid="";
                        }
                      

                            $sqlverifya="UPDATE staffs SET access='admin' where username='$gid'"; 
                            if($conn->query($sqlverifya)===TRUE){

                               echo "This staff has been made as an Administrator";
                            }
                            else{
                                echo "Error: Something went wrong";
                                $conn->error;
                            }
                         }

                                  if (isset($_GET['removeadmin'])){
                            if (isset($_GET['username'])){
                            $gid=$_GET['username'];
                        }else{
                            $gid="";
                        }
                      

                            $sqlverifyb="UPDATE staffs SET access='staff' where username='$gid'"; 
                            if($conn->query($sqlverifyb)===TRUE){

                               echo "This staff has been removed as an Administrator";
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
                                            <th>SN</th>

                                                <th>username</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Phone</th>
                                                <th>Access</th>
                                                <th>Verification</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                           
                                            
                                        <?php 
                                        $loguser="SELECT * FROM staffs";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){?>
                                       

                                        
 <td> <?php echo $row["id"]; ?></td>
                                                
                                                <td> <?php echo $row["username"]; ?></td>
                                                <td><?php echo $row["firstname"]." ".$row["lastname"]." ".$row["middlename"];?></td>
                                                <td><?php echo $row["gender"]; ?></td>
                                                <td><?php echo $row["phone"]; ?></td>
                                                <td><?php echo $row["access"]; ?></td>
                                                <td><?php echo $row["status"]; ?></td>

                                                <td><a href="view-Lecturer.php?view&username=<?php echo $row["username"]; ?>"> <input type="submit" name="view" class="btn btn-space btn-success" value="View"/> </a> </td>
                                                <?php 
                                                if (($row["status"]=="inactive")&&($row["access"]=="staff")) {?>
                                                     <td><a href="?verify&username=<?php echo $row["username"]; ?>"> <input type="submit" name="view" class="btn btn-space btn-primary" value="Activate"/> </a> </td>
                                                    <?php 
                                                    

                                                } elseif (($row["status"]=="active")&&($row["access"]=="staff")){?>
                                                    <td><a href="view-Lecturer.php?verifyno&username=<?php echo $row["username"]; ?>"> <input type="submit" name="view" class="btn btn-space btn-primary" value="Deactivate"/> </a> </td>
                                                   
                                                      <?php 
                                                }
                                                

                                                ?>
                                                  <?php 
                                                if (($row["status"]=="active")&&($row["access"]=="staff")) {?>
                                                     <td><a href="?makeadmin&username=<?php echo $row["username"]; ?>"> <input type="submit" name="view" class="btn btn-space btn-info" value="Make Admin"/> </a> </td>
                                                    <?php 
                                                    

                                                } elseif (($row["status"]=="active")&&($row["access"]=="admin")){?>
                                                    <td><a href="?removeadmin&username=<?php echo $row["username"]; ?>"> <input type="submit" name="view" class="btn btn-space btn-info" value="Remove as admin"/> </a> </td>
                                                   
                                                      <?php 
                                                }
                                                

                                                ?>
                                               
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