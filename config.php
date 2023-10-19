<?php 
$servername="localhost";
$username="root";
$password="";
$database="advisesystem";
$conn=new mysqli($servername,$username,$password,$database);
if($conn->connect_errno){
	echo "Error : Cannot connect to database".$conn->connect_error;
	exit();

}?>