<?php 
session_start();
// $page=$_SERVER["PHP_SELF"];
include("../config.php");
 $admission=$_SESSION['admission'];
$studentid=$_SESSION['studentid'];
$exam=$_SESSION['exam'];
$picture=$_SESSION['picture'];
$name=$_SESSION['name'];
if($_SESSION['studentid']==""){
   header("Location: ../login.php");
}
	$scoreexam="SELECT * FROM answers WHERE exam='$exam' AND studentid='$studentid' limit 1";
                           $result=$conn->query($scoreexam);
                           if($result->num_rows > 0){
                           	while($row=$result->fetch_assoc()){
                           		$year=substr($row['date'],0,4);
                           		$date=$row['date'];
                           		 }}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<div class="result" style="padding:50px;border:2;">
<header>
	<h1 align="center"><span style="font-size:50;padding:10;color:green;border:20;border-radius:30px;border-color:blue">HIS</span>HUBAYDAH ISLAMIC COLLEGE <br> <span style="font-size:20pt;">Ede, Osun State , Nigeria</span>	</h1>
<hr>
</header>
<p align="center" style="background:grey;font-size:15pt;">EXAM RESULT</p>
<table align="left">
	<tr> <th>Student ID</th><td><?php echo $studentid;?></td></tr>
	<tr> <th>Name</th><td><?php echo $name;?></td></tr>
	<tr> <th>Exam type</th><td><?php echo $exam;?></td></tr>
	<tr> <th>Exam year</th><td><?php echo $year;?></td></tr>
	<tr> <th>Exam day</th><td><?php echo $date;?></td></tr>
</table>
<img src="../admin/students/<?php echo $picture;?>" align="right" padding="50">

<table width="100%" border="2">
	<tr><th>S/N</th><th>Subject</th><th>Total</th><th>Score</th><th>Percentage</th><th>Remark</th></tr>
<?php
  $scoreexam="SELECT SUM(score) AS totalscore,SUM(total) AS totaltotal FROM results WHERE exam='$exam' AND studentid='$studentid' ORDER by sid asc";
                           $result=$conn->query($scoreexam);
                           if($result->num_rows > 0){
                           	while($row=$result->fetch_assoc()){
                           		$totalscore=$row['totalscore'];
                           		$totaltotal=$row['totaltotal'];
                           		 }}

	$scoreexam="SELECT * FROM results WHERE exam='$exam' AND studentid='$studentid' ORDER by sid asc";
                           $result=$conn->query($scoreexam);
                           if($result->num_rows > 0){
                           	while($row=$result->fetch_assoc()){
                           		?>
                        		
	<tr><td><?php echo $row['sid'];?></td><td><?php echo $row['subject'];?></td><td><?php echo $row['total'];?></td><td><?php echo $row['score'];?></td><td><?php echo $row['percentage'];?></td><td><?php echo $row['remark'];?></td></tr>
	<?php
 }}
$aggregriate=(($totalscore/$totaltotal)*(100/1));
 ?>
	<tr><td colspan="2"></td><td><b>Grand Total:   <?php echo $totaltotal;?></b></td><td><b>Total Score:   <?php echo $totalscore;?></b></td><td colspan="2"><b>Aggregriate Percentage:   <?php echo $aggregriate;?></b></td></tr>
   <tr><td colspan="6">Admission Status: <?php echo $admission;?></td></tr>
	<tr><td colspan="6"><center><button onclick="window.print()"> Print</button></center></td></tr>
</table></div>

   <?php 
   include 'footer.php'; ?>
