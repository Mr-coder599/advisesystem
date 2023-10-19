<?php 
include('header.php');
 ?>



<div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Exam record</h5>
                            <?php
                              if (isset($_GET['delete'])){
                            if (isset($_GET['studentid'])){
                            $gid=$_GET['studentid'];
                        }else{
                            $gid="";
                        }
                      

                            $sqldel="DELETE from students where studentid='$gid'"; 
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
                                            <th>NO</th>

                                                <th>Student ID</th>
                                                <th>Subject</th>
                                                <th>Question</th>
                                                <th>System Answer</th>
                                                <th>User Answer</th>#
                                                <th>Exam tye</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Submitted</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                           
                                            
                                        <?php 
                                        $loguser="SELECT * FROM answers";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){?>
                                       

                                        
 <td> <?php echo $row["id"]; ?></td>
                                                
                                                <td> <?php echo $row["studentid"]; ?></td>
                                                <td><?php echo $row["subject"];?></td>
                                                <td><?php echo $row["question"]; ?></td>
                                                <td><?php echo $row["answer"]; ?></td>
                                                <td><?php echo $row["ans"]; ?></td>
                                                <td><?php echo $row["exam"]; ?></td>
                                                <td><?php echo $row["status"]; ?></td>
                                                <td><?php echo $row["date"]; ?></td>
                                                <td><?php echo $row["complete"]; ?></td>
                                                

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