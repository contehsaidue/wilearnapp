
<?php include 'header.php';?>
<style>
/* Carousel base class */
.carousel {
  
}
/* Since positioning the image, we need to help out the caption */
.carousel-caption {
  bottom: 3rem;
  z-index: 10;
}

/* Declare heights because of positioning of img element */
.carousel-item {
  height: 20rem !important;
}
.carousel-item > img {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  height: 10rem !important;
}
</style>


<main class="container">
  <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
    <img class="me-3 rounded" src="../<?php echo $_SESSION['photo'];?>" alt="<?php echo $_SESSION['userid'];?>" width="48" height="38">
    <span class="lh-1">
      <h1 class="h6 mb-0 text-white lh-1 fw-bold"><?php echo $_SESSION['firstname'].' '.$_SESSION['lastname'];?>
        <span>
          <a href="user-write-post.php" class="text-decoration-none fw-bold btn btn-primary btn-sm">Create <i class="fas fa-plus-circle"></i></a>
          <a href="user-feeds.php" class="text-decoration-none fw-bold btn btn-dark btn-sm">View <i class="fas fa-eye"></i></a>
          </span>
      </h1>
      <small class="fw-bold fst-italic"><?php echo $_SESSION['username'];?></small>
    </div>
  </div>
  <!-- Main Dashboard User-->
<div class="row">
  <div class="col-md-12">
      <div class="p-3 mb-3 bg-light rounded">
        <div class="my-2 p-3 bg-body rounded shadow-lg">
          <h6 class="border-bottom pb-2 mb-0 fw-bold">Trending Feeds</h6>
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
 <div class="card card-sm">
       <img src="../assets/articleimages/bg-masthead.jpg">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
      
      </div>
      <div class="carousel-item">
      <div class="card">
         <img src="../assets/articleimages/2.jpg">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
      </div>
      <div class="carousel-item">
      <div class="card">
      <img src="../assets/articleimages/1.jpg">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
      </div>
      <div class="carousel-item">
      <div class="card">
      <img src="../assets/articleimages/3.jpg">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
      </div>
      <div class="carousel-item">
      <div class="card">
      <img src="../assets/articleimages/4.webp">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
    </div>
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
          </div>
          </div>

<!-- Rrecent Feeds Section-->
<div class="row">
         <div class="col-md-12">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
              <h6 class="border-bottom pb-2 mb-0">Friends Feeds</h6>
              <?php 
          include '../includes/config.php';
          $userid = $_SESSION['userid'];
          $feedsquery = "SELECT * FROM tblpostarticle 
          JOIN tbluserregistration ON  tblpostarticle.userid = tbluserregistration.userid
          WHERE tblpostarticle.userid != '$userid' ORDER BY postid DESC";
          $runfeedsquery = mysqli_query($conn, $feedsquery);
          $feedsqueryrowcount = mysqli_num_rows($runfeedsquery);
  
          if($feedsqueryrowcount > 0){
            while ($row = mysqli_fetch_assoc($runfeedsquery)){
  ?>
    <div class="d-flex text-muted pt-3">
    <img class="me-3 rounded" src="../<?php echo $row['photo'];?>" alt="<?php echo $row['userid'];?>" width="48" height="38">
      <div class="pb-1 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark"><?php echo $row['firstname'].' '.$row['lastname'];?></strong>
          <a href="../main-dashboard.php?viewfeed=<?php echo $row['postid'];?>" class="btn btn-dark btn-sm">view <i class="fas fa-eye"></i></a>
        </div>
        <span class="d-block"><?php echo $row['username'];?></span>
      </div>
    </div>
  
    <?php
      }
    }
    
    ?>
    <small class="d-block text-end mt-3">
      <a href="#">All suggestions</a>
    </small>


          </div>
</div>

<div class="row">
  <div class="col-md-12">
  <div class="my-3 p-3 bg-body rounded shadow-lg">
    <h6 class="border-bottom pb-2 mb-0">Suggestions</h6>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <small class="d-block text-end mt-3">
      <a href="#">All suggestions</a>
    </small>
  </div>
  </div>
  </div>
  </div>
</main>
<?php include 'footer.php';?>
