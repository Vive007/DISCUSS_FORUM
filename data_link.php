<?php
// connecting to data base
$server_name="localhost";
$user_name="root";
$password="";
$database="discuss_forum#95";

$link=mysqli_connect($server_name,$user_name,$password,$database);
if(!$link)
die("we facing some isse".mysqli_connect_error());



?>
