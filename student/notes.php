<?php
include("header.php");
$today=date("d-m-Y");

?>
<div class="row">
                <div class="col-md-11">
                  <!--   Kitchen Sink -->
                    <div class="card">
                        <div class="card-action">
                           Advise page
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Advise</th>
                                            <th>Adviser</th>
                                            <th>Department</th>
                                            <th>Time Posted</th>
                                            <th>File Attached</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $logexam="SELECT * FROM notes where designated='$department' OR designated='All'";
                                        $result=$conn->query($logexam);
                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){?>
                                        <tr>
                                        <li>
                                        <ol>
                                        <td><?php echo $row["id"]; ?></td>

                                            <td><?php echo $row["title"]; ?></td>
                                             <td><?php echo $row["note"]; ?></td>
                                            <td><?php echo $row["sender"]; ?></td>
                                             <td><?php echo $row["designated"]; ?></td>
                                              <td><?php echo $row["date"]; ?></td>
                                              <td><?php echo $row["file"]; ?></td>
                                  
                                    
                                        <td class="text-right">

                                            <a href="../admin/updates/<?php echo $row["file"]; ?>" class="waves-effect waves-light btn">Download</a>
                                        </td></ol></li>
                                        </tr>
                                       
                                    
                                         <?php 
// for serial number increment

}
} else{
  echo "No Exam for you at this momemt";
}?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                     
<?php
include("footer.php");
?>