<?php 
include('header.php');
 ?>
<div class="col-md-10 col-sm-10">
                    <div class="card">
                        <div class="card-action">
                            Tabs
                        </div>
                        <div class="card-content">
                           <div class="col">
                           <?php
                           $logexam="SELECT * FROM examdates where exam='JSS'";
                           $result=$conn->query($logexam);
                           if($result->num_rows > 0){
                           	while($row=$result->fetch_assoc()){
                           		?>
							 <a href="?<?php echo $row['subject']; ?>"><input type="submit" value="<?php echo $row['subject']; ?>" class="btn btn-primary"></a>
							 <?php }}?> 
                           <div class="clearBoth"><br/></div>
                            </div>
                        </div>
                    </div>
                </div> 
 <?php 
include('footer.php');
 ?>