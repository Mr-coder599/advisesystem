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
                        <div class="card-action">
                            Your Profile
                            </div>
                          
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                    

                                          <tr>   
                                       <th>Profile</th>
                                           </tr>   
                                            
                                        <?php 
                                          if (isset($matricno)){
                              	
                                        $loguser="SELECT * FROM students where matricno='$matricno'";
                                        $result=$conn->query($loguser);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){?>
                                            	<tr>  <td><img src="../admin/students/<?php echo $row["picture"]; ?>" width="300px"></td> </tr>
                                           
                                        <tr>
                                   

                                                <tr><th>Matric number</th> <td> <?php echo $row["matricno"]; ?></td></tr>
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
</div>
<?php 
include('footer.php');
 ?>
