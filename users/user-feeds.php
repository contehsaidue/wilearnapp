
<?php include 'header.php';?>

<main class="container">

  <!-- Main Dashboard User-->
  <div class="row">
  <div class="col-md-12">
      <div class="p-3 mb-3 bg-light rounded">
        <div class="my-2 p-3 bg-body rounded shadow-lg">
<h6 class="border-bottom pb-2 mb-0 fw-bold">My Feeds</h6>
          <?php 
          include '../includes/config.php';
          $userid = $_SESSION['userid'];
          $feedsquery = "SELECT * FROM tblpostarticle WHERE userid = '$userid' ORDER BY postid DESC";
          $runfeedsquery = mysqli_query($conn, $feedsquery);
          $feedsqueryrowcount = mysqli_num_rows($runfeedsquery);
  
          if($feedsqueryrowcount > 0){
            while ($row = mysqli_fetch_assoc($runfeedsquery)){
  ?>
          <div class="d-flex text-muted pt-3">
              <img class="me-3 rounded" src="<?= $row['image'];?>" alt="" width="48" height="38">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
              <div class="d-flex justify-content-between">
                <strong class="text-gray-dark"><?= $row['title'];?></strong>
                <div class="btn-group">
                <a href="controller.php?editpost=<?= $row['postid'];?>" class="text-decoration-none  fw-bold btn btn-dark btn-sm">Edit <i class="fas fa-marker"></i></a>
                </div>
              </div>
            </div>
          </div>
    <?php
      }
    }
    
    ?>
          </div>

          <!-- Rrecent Feeds Section-->
<div class="row">
         <div class="col-md-12">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
              <h6 class="border-bottom pb-2 mb-0">Recent Feeds</h6>
              <div class="d-flex text-muted pt-3">
                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
                <p class="pb-3 mb-0 small lh-sm border-bottom">
                  <strong class="d-block text-gray-dark">@username</strong>
                  Some representative placeholder content, with some information about this user. Imagine this being some sort of status update, perhaps?
                </p>
              </div>
              <div class="d-flex text-muted pt-3">
                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"/><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>
          
                <p class="pb-3 mb-0 small lh-sm border-bottom">
                  <strong class="d-block text-gray-dark">@username</strong>
                  Some more representative placeholder content, related to this other user. Another status update, perhaps.
                </p>
              </div>
              <div class="d-flex text-muted pt-3">
                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#6f42c1"/><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text></svg>
          
                <p class="pb-3 mb-0 small lh-sm border-bottom">
                  <strong class="d-block text-gray-dark">@username</strong>
                  This user also gets some representative placeholder content. Maybe they did something interesting, and you really want to highlight this in the recent updates.
                </p>
              </div>
              <small class="d-block text-end mt-3">
                <a href="#" class="text-decoration-none fw-bold text-dark">All feeds</a>
              </small>
          </div>
        </div>
</div>

</main>
<?php include 'footer.php';?>
