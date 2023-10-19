<?php 
include('header.php');
 ?>

<div class="row">

                            <div class="container h-100">
<div class="row h-100 justify-content-center align-items-center">
<div class="col-10 col-md-8 col-lg-6">

                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Student's file</h3>
                                        <p class="card-text"> 
                                        <form action="" method="get" role="form" >
                                        <div class="form-row"> 
                                        <input type="type" name="matricno" class="form-control" placeholder="Enter the Student's matric number" >
                                       </p>
                                        <input type="submit" name="view" class="btn btn-primary" value="Find"> 
                                        </div>
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

                                                
                                       
                                           
                                            
                                        <?php 
                                          if (isset($_GET['view'])){
                              	$matricno=$_GET["matricno"];
                                        $loguser="SELECT * FROM students where matricno='$matricno'";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){?>
                                            	<tr>  <td><img src="students/<?php echo $row["picture"]; ?>" width="300px"></td> </tr>
                                           
                                        <tr>
                                            <th>SN</th><td> <?php echo $row["id"]; ?></td></tr>

                                                <tr><th>matricno</th> <td> <?php echo $row["matricno"]; ?></td></tr>
                                                <tr><th>Name</th><td><?php echo $row["name"]; ?></td> </tr>

                                                <tr><th>Email</th> <td><?php echo $row["email"]; ?></td> </tr>
                                                <tr><th>Phone</th> <td><?php echo $row["phone"]; ?></td> </tr>
                             
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
<?php 
include('footer.php');
 ?>
