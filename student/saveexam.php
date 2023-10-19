<?php 
include("../config.php");

if (isset($_POST['next'])) {
$next=$_POST['next'];
$finish=$_POST['finish'];
$subject=$_POST['subject'];
$exam=$_POST['exam'];
$no=$_POST['no'];
$question=$_POST['question'];
if (isset($_POST['answer'])) {
$answer=$_POST['answer'];
} else {
$answer="";
}


$ans=$_POST['ans'];
$mode=$_POST['mode'];
$studentid=$_POST['studentid'];
if ($ans==$answer) {
	$status="T";
} else {
	$status="F";
}
if (($next=="Previous")&&($finish=="NO")) {
	$gno=$no-1;
} elseif (($next=="Next")&&($finish=="NO")) {
	$gno=$no+1;
} elseif (($next=="Save")&&($finish=="NO")) {
	$gno=$no;
}
if ($mode=="insert") {
	$insert="INSERT INTO answers(subject,exam,no,question,answer,ans,status,studentid) VALUES('" . $subject . "','" . $exam . "','" . $no . "','" . $question . "','" . $answer . "','" . $ans . "','" . $status . "','" . $studentid . "')";
	if ($conn->query($insert)===TRUE) {
		echo("<script>alert('Answer Saved');</script>");
		echo("<script>window.location.href='cbt.php?id=$gno&subject=$subject'</script>");
	} else {
		echo("<scipt>alert('Answer not Saved');</scipt>");
		echo("<script>window.location.href='cbt.php?id=$no&subject=$subject'</script>");
	}

	}elseif ($mode=="update") {

		$update="UPDATE answers SET question='$question',answer='$answer',ans='$ans' WHERE studentid='$studentid' AND no='$no' AND subject='$subject' AND exam='$exam'";
	if ($conn->query($update)===TRUE) {
		echo("<script>alert('Answer RESaved');</script>");
		echo("<script>window.location.href='cbt.php?id=$gno&subject=$subject'</script>");
	} else {
		echo("<scipt>alert('Answer not RESaved');</scipt>");
		echo("<script>window.location.href='cbt.php?id=$no&subject=$subject'</script>");
	}
}
	
}
 ?>