<?php 
$today=date("d/m/Y");
session_start();
// $page=$_SERVER["PHP_SELF"];
include("../config.php");
$studentid=$_SESSION['studentid'];
$exam=$_SESSION['exam'];
$name=$_SESSION['name'];
$picture=$_SESSION['picture'];
if($_SESSION['studentid']==""){
   header("Location: ../login.php");
}

// if($page !=="/academy/student/course.php"){


// $loguser="SELECT * FROM students where studentid='$studentid'";
// $result=$conn->query($loguser);
// if($result->num_rows > 0){
// while($row=$result->fetch_assoc()){
// $exam=$row["exam"];
// }
// }
// $conn->close();


    
// }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hubaydah Islamic College :: Student Area</title> 
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
      <link href="css/style.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 
    <script type="text/javascript" src="js/modal.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

</head>

<body>
<!-- <header style="background:blue;color:white;font-size:20px;"><h1>HIS</h1></header>
<div class="menu">
    <a href="index.php">Home</a><a href="profile.php">Profile</a><a href="index.php">Result</a><a href="index.php">Logout</a>

</div> -->
<header>
<h1 style="color:brown;display:inline-block;padding:10px;">Hubaydah Islamic College</h1> 
<div class="row">
<div class="col-md-6 col-lg-4">
    <ul class="nav nav-pills">    <li class="active"><a href="index.php">Home</a></li>    <li><a href="profile.php">Profile</a></li>    <li><a href="result.php">Result</a></li>    <li><a href="logout.php">Logout</a></li>    <li><a href="help.php">Help</a></li><li></li></ul></div><div class="col-md-6 col-lg-8">
   <p>...............................................................................................................................................................<?php echo($today); ?>.........<?php echo date("g:i:s a"); ?></p> </div> </div> </header>
    <div class="page"> 
    <div class="container">
<div class="row">
<div class="col-md-6 col-lg-4">
  <div class="list-group">    <a href="#" class="list-group-item active">       <h4 class="list-group-item-heading">          Student Profile      </h4>    </a>    <a href="#" class="list-group-item">       <h5 class="list-group-item-heading">          <b>Candidate:    </b> <?php echo $name;?><br>

<b>Student ID:</b> <?php echo $studentid;?><br/>
<b>Exam type:</b> <?php echo $exam;?><br/>       </h5>          </a>    <a href="#" class="list-group-item">       <h4 class="list-group-item-heading">          <img src="../admin/students/<?php echo $picture;?>">     </h4>       <p class="list-group-item-text">               </p>    </a> </div> <div class="list-group">    <a href="#" class="list-group-item active">       <h4 class="list-group-item-heading">          Subject Details       </h4>    </a>    <a href="#" class="list-group-item">             <p class="list-group-item-text">         <?php 

$todayy=date("d-m-Y");
if (isset($_GET['subject'])) {
$gsubject=$_GET['subject'];
} else {
    $logexam="SELECT * FROM examdates where day='$todayy' AND exam='$exam' limit 1";
$result=$conn->query($logexam);
if($result->num_rows > 0){
while($row=$result->fetch_assoc()){
$gexam=$row['exam'];
$gsubject=$row['subject'];
$duration=$row['timer'];
}}

}

$logexam="SELECT * FROM examdates where day='$todayy' AND exam='$exam'";
$result=$conn->query($logexam);
$allque=$result->num_rows;
if($result->num_rows > 0){
while($row=$result->fetch_assoc()){
$rsubject=$row['subject'];

}}

$logexam="SELECT * FROM answers where studentid='$studentid' AND exam='$exam'";
$result=$conn->query($logexam);
$allans=$result->num_rows;
if($result->num_rows > 0){
while($row=$result->fetch_assoc()){
$rsubject=$row['subject'];
}}



    $logexam="SELECT * FROM examdates where day='$todayy' AND exam='$exam' limit 1";
$result=$conn->query($logexam);
if($result->num_rows > 0){
while($row=$result->fetch_assoc()){
$duration=$row['timer']/60;
}}
 $todayexamm="SELECT * FROM exams where subject='$gsubject' AND exam='$exam'";
$result=$conn->query($todayexamm);
$allquestion=$result->num_rows;
 $todayexamm="SELECT * FROM exams where exam='$exam'";
$result=$conn->query($todayexamm);
$allquestions=$result->num_rows;

 $todayanswers="SELECT * FROM answers where subject='$gsubject' AND exam='$exam' AND studentid='$studentid'";
$result=$conn->query($todayanswers);
$allanswer=$result->num_rows; 
?><b>Exam type:</b> <?php echo $exam;?><br/>  
<b>Subject:</b> <?php echo $gsubject;?><br/> 
<b>Questions:</b> <?php echo $allquestion;?><br/> 
<b>Answered question(s):</b> <?php echo $allanswer;?><br/> 
<b>Duration:</b> <?php echo $duration;?> minutes<br/> 
  </p>    </a> </div> 


  <div class="list-group">    <a href="#" class="list-group-item active">       <h4 class="list-group-item-heading">          Exam Details       </h4>    </a>    <a href="#" class="list-group-item">             <p class="list-group-item-text">         <?php 

$todayy=date("d-m-Y");
if (isset($_GET['subject'])) {
$gsubject=$_GET['subject'];
} else {
    $logexam="SELECT * FROM examdates where day='$todayy' AND exam='$exam' limit 1";
$result=$conn->query($logexam);
if($result->num_rows > 0){
while($row=$result->fetch_assoc()){
$gexam=$row['exam'];
$gsubject=$row['subject'];
}}

}
 $todayexamm="SELECT * FROM exams where subject='$gsubject' AND exam='$exam'";
$result=$conn->query($todayexamm);
$allquestion=$result->num_rows;

 $todayanswers="SELECT * FROM answers where subject='$gsubject' AND exam='$exam' AND studentid='$studentid'";
$result=$conn->query($todayanswers);
$allanswer=$result->num_rows; 
?><b>Total Subject(s):</b> <?php echo $allque;?><br/>  
<b>Total question:</b> <?php echo $allquestions;?><br/> 
<b>Answered question:</b> <?php echo $allans;?><br/> 
<b>Question(s) left:</b> <?php echo $allquestions-$allans;?><br/> 
  </p>    </a> </div> </div> 
  