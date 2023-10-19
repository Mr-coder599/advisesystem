<?php 
include('header.php');
$allnotes="SELECT * FROM notes WHERE designated='All'";
                           $result=$conn->query($allnotes);
                           $allnotec=$result->num_rows;
$allnotestuds="SELECT * FROM notes WHERE designated='Staffs'";
                           $result=$conn->query($allnotestuds);
                           $allnotestudc=$result->num_rows;
$allnotestafs="SELECT * FROM notes WHERE designated='Students'";
                           $result=$conn->query($allnotestafs);
                           $allnotestafc=$result->num_rows;
   $allstudents="SELECT * FROM students";
                           $result=$conn->query($allstudents);
                           $allstudentc=$result->num_rows;
$allstaffs="SELECT * FROM staffs";
                           $result=$conn->query($allstaffs);
                           $allstaffc=$result->num_rows;
$allstaffins="SELECT * FROM staffs WHERE status='inactive'";
                           $result=$conn->query($allstaffins);
                           $allstaffinc=$result->num_rows;     
$allstaffins="SELECT * FROM staffs WHERE status='inactive'";
                           $result=$conn->query($allstaffins);
                           $allstaffinc=$result->num_rows; 



 ?>
 <div class="row">
                        <!-- ============================================================== -->
                        <!-- contectual list  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Total Notice posted</h5>
                                <div class="card-body">
                                    <ul class="list-group">
                                        
                                     
                                        <li class="list-group-item list-group-item-info">This is the total numbers of notice posted</li>
                                      
                                        <li class="list-group-item list-group-item-dark"> <?php echo($allnotec); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end contectual list  -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- contectual list  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Total registered students</h5>
                                <div class="card-body">
                                    <ul class="list-group">
                                   
                                        <li class="list-group-item list-group-item-dark"><?php echo($allstudentc); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end contectual list  -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- contectual list  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Total registered Staffs</h5>
                                <div class="card-body">
                                    <ul class="list-group">
                                   
                                        <li class="list-group-item list-group-item-dark"><?php echo($allstaffc); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end contectual list  -->
                            <!-- ============================================================== -->
                        </div>
                        <div class="row">
                        <!-- ============================================================== -->
                        <!-- contectual list  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Inactive Staffs</h5>
                                <div class="card-body">
                                    <ul class="list-group">
                                        
                                     
                                        <li class="list-group-item list-group-item-info">This is the number staff(s) waiting for activatation</li>
                                      
                                        <li class="list-group-item list-group-item-dark"> <?php echo($allstaffinc); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end contectual list  -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- contectual list  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Total Notice for students</h5>
                                <div class="card-body">
                                    <ul class="list-group">
                                   
                                        <li class="list-group-item list-group-item-dark"><?php echo($allnotestudc); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end contectual list  -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- contectual list  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Total Notice for staff</h5>
                                <div class="card-body">
                                    <ul class="list-group">
                                   
                                        <li class="list-group-item list-group-item-dark"><?php echo($allnotestafc); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end contectual list  -->
                            <!-- ============================================================== -->
                        </div>
 <?php 
include('footer.php');
 ?>