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
    <!-- <h1>Hello, world!</h1> -->

   
<?php
      require'data_link.php';
$tab=false;
$btn=false;
// Taking data in signup form.
@$user_id=$_POST['userid'];
@$password=$_POST['password'];
@$cnpassword=$_POST['cnpassword'];

// inserting data into database by checking user is new user or not.
$data1="SELECT * FROM`user_info`WHERE`user_id` ='$user_id'";
$sql=mysqli_query($link,$data1);
$row=mysqli_num_rows($sql);
if($row)
$btn=true;
//echo $row;
if(($password==$cnpassword)&&(!$row))
$tab=true;
    //echo "user already register or<br>password not match with confirm password.<br>";

if($tab)
{ $encryption=password_hash($password,PASSWORD_DEFAULT);
    $data2="INSERT INTO `user_info` (`sn.no`,`user_id`, `password`, `dos`) VALUES (NULL,'$user_id', '$encryption', current_timestamp())";
    $sql2=mysqli_query($link,$data2);
    //var_dump($sql2);
    if($sql2)
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Registerd successfuly!</strong> Pls login again...
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
}
else
echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
<strong>Opps!</strong> It seems like user already register or password not match with confirm password.
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
</button>
</div>";

?>
<?php
require'idiscus.php';?>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</body>
</html>