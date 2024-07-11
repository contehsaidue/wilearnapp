<?php include 'header.php';?>

<main class="container">
    <?php
    include '../includes/config.php';

if(isset($_GET['viewfriendprofile'])){
    $userid = $_GET['viewfriendprofile'];
    $friendprofilequery = "SELECT * FROM tbluserregistration WHERE userid = '$userid'";
    $friendprofilequeryrun = mysqli_query($conn, $friendprofilequery);
    $friendprofilequeryresult = mysqli_fetch_assoc($friendprofilequeryrun);


?>
  <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
  <img src="../<?php echo  $friendprofilequeryresult['photo'];?>" alt="<?php echo  $friendprofilequeryresult['userid'];?>" width="48" height="38" class="me-2">
    <div class="lh-1">
      <h1 class="h6 mb-0 text-white fw-bold lh-1"><?php echo  $friendprofilequeryresult['firstname'].' '.$friendprofilequeryresult['lastname'];?>
      <span>
          <a href="#" class="text-decoration-none fw-bold btn btn-dark btn-sm">Unfollow <i class="fas fa-marker"></i></a>
          </span>
</h1>
      <small class="fw-bold fst-italic"><?php echo  $friendprofilequeryresult['username'];?></small>
    </div>
  </div>

  <div class="my-3 p-3 bg-body rounded shadow-lg">
    <h6 class="border-bottom pb-2 mb-0"></h6>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <p class="pb-3 mb-0 small lh-sm border-bottom">
        <strong class="d-block text-gray-dark">Short Bio</strong>
        Some representative placeholder content, with some information about this user. Imagine this being some sort of status update, perhaps?
      </p>
    </div>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"/><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>

      <p class="pb-3 mb-0 small lh-sm border-bottom">
        <strong class="d-block text-gray-dark"><?php echo  $friendprofilequeryresult['username'];?></strong>
      </p>
    </div>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#6f42c1"/><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text></svg>

      <p class="pb-3 mb-0 small lh-sm border-bottom">
        <strong class="d-block text-gray-dark">Education</strong>
        This user also gets some representative placeholder content. Maybe they did something interesting, and you really want to highlight this in the recent updates.
      </p>
    </div>
    <div class="d-flex text-muted pt-3">
        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#6f42c1"/><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text></svg>
  
        <p class="pb-3 mb-0 small lh-sm border-bottom">
        <?php 
          include '../includes/config.php';
          $userid = $_GET['viewfriendprofile'];
          $feedsquery = "SELECT * FROM tblpostarticle WHERE userid = '$userid' ORDER BY postid DESC";
          $runfeedsquery = mysqli_query($conn, $feedsquery);
          $feedsqueryrowcount = mysqli_num_rows($runfeedsquery);
  
  ?>
          <strong class="d-block text-gray-dark">Feeds Created
          <span class="badge bg-success text-light rounded-pill align-text-bottom"><?php echo $feedsqueryrowcount;?></span>
          </strong>
        </p>
      </div>
      <div class="d-flex text-muted pt-3">
        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#6f42c1"/><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text></svg>
  
        <p class="pb-3 mb-0 small lh-sm border-bottom">
          <strong class="d-block text-gray-dark">Contributions per forum</strong>
          This user also gets some representative placeholder content. Maybe they did something interesting, and you really want to highlight this in the recent updates.
        </p>
      </div>
<?php  }?>
    <small class="d-block text-end mt-3">
      <a href="user-friends.php" class="text-decoration-none text-dark fw-bold">Back</a>
    </small>
  </div>


</main>
<?php include 'footer.php';?>