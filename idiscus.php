<!-- crousel slider code start from here -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://source.unsplash.com/random/1920x500/?code,programing" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/random/1920x500/?code,structure" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/random/1920x500/?code,algorithm" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- card code start from here we fetch card using php and loop -->
<div class="container">
    <h2 class="text-center text-primary my-3">iDiscuss-platform</h2>
    <div class='row my-2'>
        <?php
      
      // $i=1;
    $sql3="SELECT * FROM `discuss_display`";
    $query3=mysqli_query($link,$sql3);
    while($fetch=mysqli_fetch_assoc($query3))
    {
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
    //explanation of substr function();
    //substr(string $string, int $offset, ?int $length = null): string
    //$offset means kha se string read krna start krega.-ve means last se .
    //$length means kitna string read krna hai.
//Returns the portion of string specified by the offset and length parameters.
    ?>
    </div>
</div>

<?php 
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