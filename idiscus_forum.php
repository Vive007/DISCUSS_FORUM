<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?php
//verification of login detail code start from here.
$alert=false;
require 'data_link.php';
@$usernam=$_POST['username'];
@$password=$_POST['password'];
$method=$_SERVER['REQUEST_METHOD'];
if($method=='POST')// it work only when we submitte form.at that time method is post.
{
$sql8="SELECT * FROM`user_info`WHERE`user_id` ='$usernam'";
$data8=mysqli_query($link,$sql8);
while($fetch2=mysqli_fetch_assoc($data8))
{
  $username=$fetch2['user_id'];
  $upassword=$fetch2['password'];

if($eco=password_verify($password,$upassword))
{
  $alert=true;
}}
if($alert)
{
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong> successfuly login!</strong> 
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
// starting the session.
session_start();
$_SESSION['username']=$username;

}
else 
echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
<strong>Oops!</strong> It seems like user not register or password is incorrect.
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
</button>
</div>";}
?>
    <?php 
    //session_start();
    if(isset($_SESSION['username']))
{include 'header2.php';
    //session_unset();
}
else
{require 'data_link.php';
include 'header.php';}?>
    <?php require 'idiscus.php';?>