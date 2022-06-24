<?php
if(($_SERVER['REQUEST_METHOD'])==("GET"))
  {  
    
    session_start();

   
     if(isset($_SESSION['username']))
    {$usr=$_SESSION['username'];
     require 'header2.php';}
    else
    require 'header.php';
$search=$_GET['search_query'];
// here we use get to referal page work same as another device.

// selecting from the database.
$sql3="SELECT * FROM `discuss_display` WHERE `Top`='$search'";
$query3=mysqli_query($link,$sql3);
$ck=false;
$check=true;
echo '<div class="container2">
<em><h2 class="text-center text-primary my-3"><span class="badge badge-success">iDiscuss-platform</span></h2></em>
<h2>search result for <em>"'.$search.'"</em>
<div class="row my-2">';
while($fetch=mysqli_fetch_assoc($query3))
{ $ck=true;
    //good logic to use ?catno=$fetch['sn.no']; that store in get variable.
    //to acces in referd site using href to access this.
echo "
<div class='col-md-4 my-3'>
<div class='card' style='width: 18rem;'>
    <img src='https://source.unsplash.com/random/1920x1080/?code,".$fetch['Top']." class='card-img-top' alt='...'>
    <div class='card-body'>
       <a href='card_insider.php?catno=".$fetch['sn.no']."'><button class='btn btn-secondry'> <h5 class='card-title'>".$fetch['Top']."</h5>
        <p class='card-text'>".substr($fetch['Description'],0,80)."</p>
        <button class='btn btn-success'> Go</button></button></a>
    </div>
</div>
</div> ";
//$i++;

}
echo '</div>
</div>';
// if($ck)
// {
//     echo '<style>
//     .row{
//         min-height:76vh;
//     }
//     </style>';
// }
//explanation of substr function();
//substr(string $string, int $offset, ?int $length = null): string
//$offset means kha se string read krna start krega.-ve means last se .
//$length means kitna string read krna hai.
//Returns the portion of string specified by the offset and length parameters.
 if(!$ck)
 {
$sql4="SELECT * FROM `question_ask`WHERE`Question`='$search'";
$data4=mysqli_query($link,$sql4);
while($fetch1=mysqli_fetch_assoc($data4))
{ $check=false;
  $top=$fetch1['Topic'];
  $nam=$fetch1['Name'];
  $ques=$fetch1['Question'];
  $Id=$fetch1['id'];
  $sn=$fetch1['cat_id'];
echo "<div class='media my-4'>
<!-- here we set width of image to look better -->
<img src='img/User.png' width=35px; class='mr-3' alt='...'>
<div class='media-body'>
<a  href='answer_user.php?na=".$Id." '> <h5 class='mt-0'>".$ques." </h5></a>
  
</div>
</div>" ;}}
if((!$ck)&&($check))
{
    echo '<div class="container1 my-0">
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4 text-danger text-center">Oops!</h1>
     <b><h3> <p class="lead text-center">Not such topic found,pls search another topic.</p></h3></b>
    </div>
  </div></div>';

}
}


?>
<style>
    .container1{
        min-height:78vh;
    }
    </style>
    
    

<?php 
if((!$ck)&&($check))
//include and require not reuires = sign.
include 'footer.php';
  ?>
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