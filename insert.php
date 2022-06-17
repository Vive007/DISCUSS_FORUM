<?php
require'data_link.php';
@$name=$_POST['name'];
@$que=$_POST['ques'];
@$Top=$_GET['top'];
$sql5="INSERT INTO `question_ask` (`id`, `Name`, `Topic`, `Question`) VALUES (NULL, '$name', '$Top','$que')";
     $data5=mysqli_query($link,$sql5);
     header("location:idiscus.php");
     ?>