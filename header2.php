<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>DISCUS</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="idiscus_forum.php?ref=1">i-Discus</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="idiscus_forum.php?ref=1">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="question.php">Ask.question</a>
                </li>
                <li class="nav-item dropdown">
                    <?php
      echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Top_Category
        </a><div class="dropdown-menu" aria-labelledby="navbarDropdown">';
        
        require 'data_link.php';
        // fetching from database.
        $id=1;
        $sql9="SELECT *FROM `discuss_display` limit 4";
        $data9=mysqli_query($link,$sql9);
        while($fetch9=mysqli_fetch_assoc($data9))
        {
       echo ' 
          <a class="dropdown-item" href="card_insider.php?catno='.$fetch9["sn.no"].'">'.$fetch9["Top"].'</a>  ';
        }
        
        ?>
        </div>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Contact-me</a>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="search.php"method="GET">
            <input class="form-control mr-sm-2" type="search"name="search_query" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        </div>
        <?php
  //session_start();?>
        </div>
        <button type="button" class="btn btn-primary mx-2"><?php echo"welcome ". $_SESSION['username']."";?> </button>
        <a href="logout.php" class="text-success"><button type="button"
                class="btn btn-outline-success">Logout</button></a>
    </nav>

    <!-- // here it search for data target :#loginmodal. -->