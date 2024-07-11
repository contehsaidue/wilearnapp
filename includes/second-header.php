<main>
<div id="myCarousel" class="carousel slide mb-2 rounded-2" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
       <img src="assets/articleimages/bg-masthead.jpg">

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Example headline.</h1>
            <p>Some representative placeholder content for the first slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
          </div>
        </div>
      </div>
      <?php 
      include 'includes/config.php';
          $feedsquery = "SELECT * FROM tblpostarticle JOIN tbluserregistration 
          ON tblpostarticle.userid = tbluserregistration.userid ORDER BY postid DESC";
          $runfeedsquery = mysqli_query($conn, $feedsquery);
          $feedsqueryrowcount = mysqli_num_rows($runfeedsquery);
  
          if($feedsqueryrowcount > 0){
            while ($row = mysqli_fetch_assoc($runfeedsquery)){
  ?>
      <div class="carousel-item">
    <img src="<?= $row['image'];?>" >
        <div class="container">
          <div class="carousel-caption">
            <h1 class="fw-bold"><?= $row['title'];?></h1>
            <p class="fw-bold fst-italic"><?= $row['username'];?></p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
   </div>

      </div>
      
      <div class="carousel-item">
      <img src="assets/articleimages/1.jpg">

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>One more for good measure.</h1>
            <p>Some representative placeholder content for the third slide of this carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img src="assets/articleimages/3.jpg">

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>One more for good measure.</h1>
            <p>Some representative placeholder content for the fourth slide of this carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img src="assets/articleimages/4.webp">

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Ready.</h1>
            <p>Some representative placeholder content for the fifth slide of this carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <?php
      }
    }
    
    ?>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
    
   
  </div>
<!-- Carousel ends -->
<div class="container">
  <div class="row mb-2">
  <?php 
          include 'includes/config.php';
          $feedsquery = "SELECT * FROM tblpostarticle 
          JOIN tbluserregistration ON tblpostarticle.userid = tbluserregistration.userid 
          JOIN tblcomments ON tblcomments.visitorid = tblpostarticle.userid LIMIT 2";
          $runfeedsquery = mysqli_query($conn, $feedsquery);
          $runfeedsqueryrowcount = mysqli_num_rows($runfeedsquery);
          if($runfeedsqueryrowcount > 0){
              while ($feedsqueryresult = mysqli_fetch_assoc($runfeedsquery)){

              
?>
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-280 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary fw-bolf fst-italic"><?php echo $feedsqueryresult['username'];?></strong>
          <h3 class="mb-0"><?php echo $feedsqueryresult['title'];?></h3>
          <div class="mb-1 text-muted"><?php echo $feedsqueryresult['date_published'];?></div>
          <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="text-decoration-none fw-bold btn btn-success btn-sm">Continue reading</a>
        </div>
        <div class="col-auto">
          <img class="bd-placeholder-img" width="200"  width="100%" height="100%" src="../<?php echo $feedsqueryresult['image'];?>">
        </div>
      </div>
    </div>
   <?php
              }
            }
   ?>
  </div>

<div class="border-bottom mb-3"></div>