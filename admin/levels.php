<?php 
include('header.php');
 ?>
<div class="row">

                            <div class="container h-100">
<div class="row h-100 justify-content-center align-items-center">
<div class="col-10 col-md-8 col-lg-6">

                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">New Class</h3>
                                        <p class="card-text"> 
                                        <form action="" method="post" role="form" >
                                        <div class="form-row"> 
                                        <input type="type" name="level" class="form-control" placeholder="Enter the class/level name " >
                                       </p>
                                        <input type="submit" name="view" class="btn btn-primary" value="Add"> 
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                            <th>SN</th>
                                                <th>Level</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                           
                                            
                                        <?php 
                                        $loguser="SELECT * FROM levels";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){?>
                                       

                                        
 <td> <?php echo $row["id"]; ?></td>
                                                
                                                <td> <?php echo $row["level"]; ?></td>
                                                
                                                

                                                <td><a href="view-teacher.php?view&identity=<?php echo $row["id"]; ?>"> <input type="submit" name="view" class="btn btn-space btn-success" value="View"/> </a> </td>
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
