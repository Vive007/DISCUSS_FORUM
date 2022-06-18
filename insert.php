<?php
require'data_link.php';
$name=$_POST['name'];
$que=$_POST['question'];
$Top=$_GET['top'];
$coment=$_POST['descr'];
$sql5="INSERT INTO `question_ask` (`id`, `Name`, `Topic`, `Question`,`comment`) VALUES (NULL, '$name', '$Top','$que','$coment')";
     $data5=mysqli_query($link,$sql5);
     header("location:idiscus.php");
     ?>