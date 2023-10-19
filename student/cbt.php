
<?php 
include("head.php");
$today=date("d-m-Y");

if (isset($_GET['success'])) {
	$update="UPDATE answers SET complete='YES' WHERE studentid='$studentid' AND exam='$exam'";
	if ($conn->query($update)===TRUE) {
		echo("<script>alert('You have successfully completed your entrance exam');</script>");
		echo("<script>window.location.href='cbt.php'</script>");
	} else {
		echo("<scipt>alert('Exam answers not submitted, please try again or report this issue to school management');</scipt>");
		echo("<script>window.location.href='cbt.php'</script>");
	}
	
}
$chkresult="SELECT * FROM results where studentid='$studentid' AND exam='$exam'";
$result=$conn->query($chkresult);
if($result->num_rows > 0){
	echo("<script>alert('Exam result has already been processed');</script>");
}else{

 $todaysub="SELECT * FROM examdates where exam='$exam'";
$result=$conn->query($todaysub);
$allsubject=$result->num_rows;
$sub=$allsubject+1;
for ($i=1; $i < $sub; $i++) {
$scoreexam="SELECT * FROM examdates WHERE exam='$exam' AND sid='$i'";
                           $result=$conn->query($scoreexam);
                           if($result->num_rows > 0){
                           	while($row=$result->fetch_assoc()){
                           		$subjecto[$i]=$row['subject'];

                           		
                           		

 }}}

for ($j=1; $j < $sub; $j++) {
 $chktotal="SELECT * FROM exams where exam='$exam' AND subject='$subjecto[$j]'";
$resultt=$conn->query($chktotal);
$total=$resultt->num_rows;  

 $chkpass="SELECT * FROM answers where studentid='$studentid' AND exam='$exam' AND subject='$subjecto[$j]' AND complete='YES' AND status='T'";
$resultt=$conn->query($chkpass);
$pass=$resultt->num_rows;  
$score=$pass;
 $chkfail="SELECT * FROM answers where studentid='$studentid' AND exam='$exam' AND subject='$subjecto[$j]' AND complete='YES' AND status='F'";
$resultt=$conn->query($chkfail);
$fail=$resultt->num_rows;  
		
$percent=(($pass/$total)*(100/1));			 

 if($percent>=70){
	$grade="A";

$remark="Distinction";
}elseif($percent>=60){
	$grade="AB";

$remark="Upper";
}elseif($percent>=50){
	$grade="B";

$remark="Lower";
}elseif($percent>=40){
	$grade="D";

$remark="Pass";
}elseif($percent>=30){
	$grade="E";

$remark="Poor";
}elseif($percent<30){
	$grade="F";

$remark="Fail";
}
$insert="INSERT INTO results(subject,exam,score,fail,total,percentage,grade,remark,studentid,sid) VALUES('" . $subjecto[$j] . "','" . $exam . "','" . $score . "','" . $fail . "','" . $total . "','" . $percent . "','" . $grade . "','" . $remark . "','" . $studentid . "','" . $j . "')";
	if ($conn->query($insert)===TRUE) {
		echo("<script>alert('Result Calculated successfully');</script>");
		echo("<script>window.location.href='cbt.php'</script>");
	} else {
		echo("<scipt>alert('Error calculating this result');</scipt>");
		echo("<script>window.location.href='cbt.php'</script>");
	}
}
}

 ?>
	

<?php
$chksub="SELECT * FROM answers where studentid='$studentid' AND exam='$exam' AND complete='YES'";
$result=$conn->query($chksub);
if($result->num_rows > 0){
	echo("<script>alert('Exam answers submitted, you can check your result later');</script>");
}else{
$today=date("d-m-Y");
if (isset($_GET['id'])) {
	$no=$_GET['id'];
} else {
	$no=1;
}



?>


	
<div class="col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-action">
                       
                        </div>
                        <div class="card-content">
                           <div class="col">
                          


                           <?php
                           $logexam="SELECT * FROM examdates where day='$today' AND exam='$exam'";
                           $result=$conn->query($logexam);
                           if($result->num_rows > 0){
                           	while($row=$result->fetch_assoc()){
                           		?>
							 <a href="?subject=<?php echo $row['subject']; ?>"><input type="submit" value="<?php echo $row['subject']; ?>" class="btn btn-primary"></a>
							 <?php }}?> 
                           <div class="clearBoth"><br/></div>
                            </div></div></div> </div>
<div class="col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-action">
                         
                       
                           <style type="text/css">

.base-timer {
  position: relative;
  width: 150px;
  height: 150px;
}

.base-timer__svg {
  transform: scaleX(-1);
}

.base-timer__circle {
  fill: none;
  stroke: none;
}

.base-timer__path-elapsed {
  stroke-width: 7px;
  stroke: grey;
}

.base-timer__path-remaining {
  stroke-width: 7px;
  stroke-linecap: round;
  transform: rotate(90deg);
  transform-origin: center;
  transition: 1s linear all;
  fill-rule: nonzero;
  stroke: currentColor;
}

.base-timer__path-remaining.green {
  color: rgb(65, 184, 131);
}

.base-timer__path-remaining.orange {
  color: orange;
}

.base-timer__path-remaining.red {
  color: red;
}

.base-timer__label {
  position: absolute;
  width: 150px;
  height: 150px;
  top: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 30px;
}


</style>





<div id="app"></div>


<script type="text/javascript">
	


// Credit: Mateusz Rybczonec

const FULL_DASH_ARRAY = 283;
const WARNING_THRESHOLD = 10;
const ALERT_THRESHOLD = 5;

const COLOR_CODES = {
  info: {
    color: "green"
  },
  warning: {
    color: "orange",
    threshold: WARNING_THRESHOLD
  },
  alert: {
    color: "red",
    threshold: ALERT_THRESHOLD
  }
};

const TIME_LIMIT = 20;
let timePassed = 0;
let timeLeft = TIME_LIMIT;
let timerInterval = null;
let remainingPathColor = COLOR_CODES.info.color;

document.getElementById("app").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">${formatTime(
    timeLeft
  )}</span>
</div>
`;

startTimer();

function onTimesUp() {
  clearInterval(timerInterval);
}

function startTimer() {
  timerInterval = setInterval(() => {
    timePassed = timePassed += 1;
    timeLeft = TIME_LIMIT - timePassed;
    document.getElementById("base-timer-label").innerHTML = formatTime(
      timeLeft
    );
    setCircleDasharray();
    setRemainingPathColor(timeLeft);

    if (timeLeft === 0) {
      onTimesUp();
    }
  }, 1000);
}

function formatTime(time) {
  const minutes = Math.floor(time / 60);
  let seconds = time % 60;

  if (seconds < 10) {
    seconds = `0${seconds}`;
  }

  return `${minutes}:${seconds}`;
}

function setRemainingPathColor(timeLeft) {
  const { alert, warning, info } = COLOR_CODES;
  if (timeLeft <= alert.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(warning.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(alert.color);
  } else if (timeLeft <= warning.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(info.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(warning.color);
  }
}

function calculateTimeFraction() {
  const rawTimeFraction = timeLeft / TIME_LIMIT;
  return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
  const circleDasharray = `${(
    calculateTimeFraction() * FULL_DASH_ARRAY
  ).toFixed(0)} 283`;
  document
    .getElementById("base-timer-path-remaining")
    .setAttribute("stroke-dasharray", circleDasharray);
}



</script>
                       </div></div>

                       

<?php 
if (isset($_GET['subject'])) {
$gsubject=$_GET['subject'];
} else {

}


$chkexam="SELECT * FROM answers where no='$no' AND exam='$exam' AND subject='$gsubject'";
$result=$conn->query($chkexam);
if($result->num_rows > 0){
while($row=$result->fetch_assoc()){
$ans=$row['answer'];
$mode="update";
}
}else{
	$ans="";
	$mode="insert";

}

if ($ans=="A"){
		$chk1="checked";
		$chk2="";
		$chk3="";
		$chk4="";
	}elseif ($ans=="B"){
		$chk1="";
		$chk2="checked";
		$chk3="";
		$chk4="";
	}elseif ($ans=="C"){
		$chk1="";
		$chk2="";
		$chk3="checked";
		$chk4="";
	}elseif ($ans=="D"){
		$chk1="";
		$chk2="";
		$chk3="";
		$chk4="checked";
	}elseif ($ans==""){
		$chk1="";
		$chk2="";
		$chk3="";
		$chk4="";
	} ?>

<div class="container">
<div class="row">


		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<div class="CBT">

			<div class="panel panel-success"> <div class="panel-heading"> <h3 class="panel-title">Questions</div><div class="panel-body">
			<div class="container">
<div class="row">
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">

<?php 

 $todayexams="SELECT * FROM exams where subject='$gsubject' AND exam='$exam'";
$result=$conn->query($todayexams);
$allquestion=$result->num_rows;
 $todayanswers="SELECT * FROM answers where subject='$gsubject' AND exam='$exam' AND studentid='$studentid'";
$result=$conn->query($todayanswers);
$allanswer=$result->num_rows; 
?>

           <?php 
           if ($allquestion==$allanswer) {
           	$finish="Almost";
           }else{
           	$finish="NO";
           }
          
           if ($allquestions==$allans) {?>
           <right>	<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Submit Exam</button><!--Modal --><div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> <div class="modal-dialog"> 
 <div class="modal-content">
 <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 class="modal-title" id="myModalLabel">Hubaydah Islamic College CBT</h4></div><div class="modal-body">Click on cancel button to go back and check answers before submission.</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
 <button type="button" onclick="modal();" class="waves-effect waves-light btn">Submit Exam</button></div></div>
 </div><!--/.modal-dialog -->
 </div><!--/.modal -->

 <script>
function modal()
{ 
 		alert('Hey, You have successfully submitted your exam..');
 		window.location.href='cbt.php?success'
 	}


 		</script> </right>


                   <form method="post" action="cbt.php">

<input type="submit" name="next" value="save" value="Submit" class="waves-effect waves-light btn">
</form>
          <?php } else {
           	echo("");
           }?>
           

    
		
<form action="saveexam.php" method="post">
<?php

	
 $todayexam="SELECT * FROM exams where subject='$gsubject' AND exam='$exam' AND no='$no' ";
$result=$conn->query($todayexam);
if($result->num_rows > 0){
while($row=$result->fetch_assoc()){

	?>
	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                    <div class="card">
                        <div class="card-action">
<?php echo $row['no']; ?>.
<?php echo $row['question']; ?>                  </div>
                        <div class="card-content">
	</div>
	<input type="hidden" name="no" value="<?php echo $row['no']; ?>">
		<input type="hidden" name="question" value="<?php echo $row['question']; ?>">
		<input type="hidden" name="studentid" value="<?php echo $studentid; ?>">
		<input type="hidden" name="ans" value="<?php echo $row['answer']; ?>">
		<input type="hidden" name="subject" value="<?php echo $gsubject; ?>">
		<input type="hidden" name="exam" value="<?php echo $exam; ?>">
		<input type="hidden" name="mode" value="<?php echo $mode; ?>">
		<input type="hidden" name="finish" value="<?php echo $finish; ?>">
	
<ol type="A">
<li> <p><input type="radio" name="answer" value="A" id="test1" <?php echo $chk1; ?> /> 
<label for="test1"><?php echo $row['optionA']; ?></label></p></li>
<li><p><input type="radio" name="answer" value="B" id="test2" <?php echo $chk2; ?> /> 
<label for="test2"><?php echo $row['optionB'];?></label></p></li>
<li><p><input type="radio" name="answer" value="C" id="test3" <?php echo $chk3; ?> /> 
<label for="test3"><?php echo $row['optionC'];?></label></p></li>
<li><p><input type="radio" name="answer" value="D" id="test4" <?php echo $chk4; ?> /> 
<label for="test4"><?php echo $row['optionD'];?></label></p></li>

</ol>
					<table align="center"><tr>
<?php if ($no =="1") {
	$bclass="btn-flat disabled";
 }else{
 	$bclass="waves-effect waves-light btn";
 }

 if (($no ==$allquestion)||($allquestion==$allanswer) ) {
 	// $complete="YES";
	$bbclass="btn-flat disabled";
 }else{
 	$bbclass="waves-effect waves-light btn";
 }
?>
 <td><input type="submit" name="next" value="Previous" class="<?php echo $bclass; ?>"> </td>		<td><input type="submit" name="next" value="Next" class="<?php echo $bbclass; ?>"></td></tr></table>
 
	<center><ol class="pagination">

					<?php 
		$allq=$allquestion+1;
					for ($i=1; $i < $allq; $i++) { 
				
				if ($i==$no){
	$class="active";
}else{
$class="";	
}
					?>
						
<li class="<?php echo $class; ?>" > <a  href="cbt.php?id=<?php echo($i); ?>&subject=<?php echo $gsubject; ?>"><?php echo($i); ?></a></li>
					<?php }        
					?>
					
				</ol></center>
				<input type="submit" name="next" value="Save" class="waves-effect waves-light btn"></center>

				

				
			</div>
		</div>
	
</div>
</div>
</form>
	
						
									                             
                    
  </div>
            </div>  
            




<?php
}}

?>
</div>
</h3>
</div> 

              </div>
                    </div>
                </div>    </div> 
   <?php 
}
   include 'footer.php'; ?>
