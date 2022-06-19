<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <?php
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
if(isset($_SESSION['username']))
{require 'idiscus2.php';}
else
require 'idiscus.php';?>
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</body>
</html>