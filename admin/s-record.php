<?php 
include('header.php');
 ?>



<div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Student's record</h5>
                            <?php
                              if (isset($_GET['delete'])){
                            if (isset($_GET['matricno'])){
                            $gid=$_GET['matricno'];
                        }else{
                            $gid="";
                        }
                      

                            $sqldel="DELETE from students where matricno='$gid'"; 
                            if($conn->query($sqldel)===TRUE){

                               echo "Student's record deleted successfully";
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

                                                <th>Matric number</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>

                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                           
                                            
                                        <?php 
                                        $loguser="SELECT * FROM students";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){?>
                                       

                                        
 <td> <?php echo $row["id"]; ?></td>
                                                
                                                <td> <?php echo $row["matricno"]; ?></td>
                                                <td><?php echo $row["name"];?></td>
                                                <td><?php echo $row["phone"]; ?></td>
                                                <td><?php echo $row["email"]; ?></td>
                                                

                                                <td><a href="view-student.php?view&matricno=<?php echo $row["matricno"]; ?>"> <input type="submit" name="view" class="btn btn-space btn-success" value="View"/> </a> </td>
                                               
                                                <td> <a href="?delete&matricno=<?php echo $row["matricno"]; ?>"><input type="submit" name="delete" class="btn btn-space btn-secondary" value="Delete"/></a></td>

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