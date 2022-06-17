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
    require'header.php';?>
    <!-- //<h1>Hello, world!</h1> -->
    <?php
      
    require'data_link.php';
    // Good logic to store sent data by using this? to store using get that store in another variable.
    @$id=$_GET['catno'];
   // var_dump($id);
    $sql3="SELECT * FROM `discuss_display` WHERE `sn.no`='$id'";
    $query3=mysqli_query($link,$sql3);
    while($fetch=mysqli_fetch_assoc($query3))
    {
        //good logic to store fetch data in another variable to access further 
        // after closing of while loop.
    $Top=$fetch['Top'];
    $Des=$fetch['Description'];
    }
   // echo $Top;
    ?>
    <div class='container my-3'>
        <div class='jumbotron '>
            <h1 class='display-4'>Welcome to discussion forum of <?php echo  $Top ;?>!</h1>
            <p class='lead'>Pls read term and condition and follow the rule.</p>
            <hr class='my-4'>
            <p><?php echo $Des ;?></p>
            <a class='btn btn-primary btn-lg' href='#' role='button'>Learn more</a>
        </div>
    </div>

    <div class='container'>
        <h1 class='text-center text-color-primary py-2'>Discussion of <?php echo  $Top; ?></h1>
        <?php
        $check=true;
      $sql4="SELECT * FROM `question_ask`WHERE`Topic`='$Top'";
      $data4=mysqli_query($link,$sql4);
      while($fetch1=mysqli_fetch_assoc($data4))
      { $check=false;
        $top=$fetch1['Topic'];
        $nam=$fetch1['Name'];
        $ques=$fetch1['Question'];
        $ans=$fetch1['Answer'];
    echo "<div class='media my-4'>
    <!-- here we set width of image to look better -->
    <img src='img/User.png' width=35px; class='mr-3' alt='...'>
    <div class='media-body'>
        <h5 class='mt-0'>".$ques." </h5>
         ".$ans."
    </div>
</div>" ;
    }
     ?>
     <?php 
     if($check)
     {
        echo"<div class='jumbotron jumbotron-fluid'>
        <div class='container'>
          <p class='display-4'>No question found.</p>
          <p class='lead'>Be the first to ask the question.</p>
        </div>
      </div>";
      echo '
      <form action="insert.php?top='.$Top.'" method="POST">
      <div class="form-group">
      <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Enter your name">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Enter your question.</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="ques" rows="3"></textarea>
      </div><button class="btn btn-primary">Submit</button>
    </form>';}
    // Alwalys good logic to send data to one location to another location
    ?>
     </div>
<?php
// $sql5="INSERT INTO `question_ask` (`id`, `Name`, `Topic`, `Question`) VALUES (NULL, '$name', '$Top','$que')";
    //  $data5=mysqli_query($link,$sql5);
    //  if($data5)
    //  echo "inserted successfuly";
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
<?php 
require'footer.php';?>
</html>