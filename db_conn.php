<?php
$servername="localhost";
$username="root";
$password="";
$dbname="dairy-billing";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
}
else{
    die("connection failed".mysqli_connect_error()."<br>");
}
?>