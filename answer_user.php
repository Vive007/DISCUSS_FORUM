<?php
    session_start();
     if(isset($_SESSION['username']))
    require 'header2.php';
    else
    require 'header.php';?>
<?php
require "data_link.php";
//$usr=$_SESSION['username'];
$Top=$_GET['na'];
//$sql4a="SELECT * FROM `user_info`WHERE `user_id`='$usr'";

$sql4="SELECT * FROM `question_ask`WHERE`id`='$Top'";
$data4=mysqli_query($link,$sql4);
while($fetch1=mysqli_fetch_assoc($data4))
{ $check=false;
  $top=$fetch1['Topic'];
  $nam=$fetch1['Name'];
  $ques=$fetch1['Question'];
  $cmt=$fetch1['comment'];
 echo" <div class='container'>
<div class='jumbotron jumbotron-fluid'>
<div class='container'>
  <p class='display-4'>".$ques."</p>
  <p class='lead'>".$cmt."</p>
  <p><b>Asked by ".$nam."</b></p>
</div>
</div></div>";}

?>
<?php
if(isset($_SESSION['username']))
{echo '
<div class="container">
<form action=" '. $_SERVER['REQUEST_URI'].'" method="POST">
  <div class="form-group">
   <h5> <label for="exampleFormControlTextarea1">Answer here</label></h5>
    <textarea class="form-control" id="exampleFormControlTextarea1"name="solution" rows="3"></textarea>
  </div>
<button class="btn btn-primary">submit</button>
</form></div>';}
else
echo '
<div class="container text-center">
<h2><span class="badge badge-info">login to answer the question</span></h2></div>';?>
<?php
if(isset($_SESSION['username']))
{
  $usR=$_SESSION['username'];
 $method=$_SERVER['REQUEST_METHOD'];
 if($method=='POST')
 {
$soln=$_POST['solution'];
$soln=str_replace("<","&lt;",$soln);
$soln=str_replace(">","&gt;",$soln);

$sql7="INSERT INTO `community_professional` (`devloper_id`, `dev_name`, `Answer`,`user_id`) VALUES (NULL, '$usR', '$soln','$Top')";
$data7=mysqli_query($link,$sql7);}}
?>

<?php
$sql8="SELECT * FROM `community_professional`WHERE`user_id`='$Top'";
$data8=mysqli_query($link,$sql8);
while($info=mysqli_fetch_assoc($data8))
{
    $ansd=$info['Answer'];
    $devloper=$info['dev_name'];


echo "<div class='media my-4'>
<!-- here we set width of image to look better -->
<img src='img/User.png' width=35px; class='mr-3' alt='...'>
<div class='media-body'>
   <h5 class='mt-0'>".$ques." </h5>
  <p><b>Answer by:".$devloper."<br></b></p>
   ".$ansd." 
</div>
</div>";}

?>
<?php
session_reset();// it is use to reset the session with original.?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
</body>

</html>