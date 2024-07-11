
<?php include 'header.php';?>

<main class="container">
  <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
    <img class="me-3 rounded" src="../<?php echo $_SESSION['photo'];?>" alt="<?php echo $_SESSION['userid'];?>" width="48" height="38">
    <span class="lh-1">
      <h1 class="h6 mb-0 text-white lh-1 fw-bold"><?php echo $_SESSION['firstname'].' '.$_SESSION['lastname'];?>
        <span>
          <a href="#" class="text-decoration-none fw-bold btn btn-dark btn-sm">Pinned</a>
          <a href="#" class="text-decoration-none fw-bold btn btn-success btn-sm">View Draft</a>
          </span>
      </h1>
      <small class="fw-bold fst-italic"><?php echo $_SESSION['username'];?></small>
    </div>
  </div>
  <!-- Main Dashboard User-->
  <!-- Creating article section -->
  <div class="alert alert-success alert-dismissible fade show" role="alert">
<strong><?php echo $_SESSION['insertmsg'] ;?></strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

  <div class="col-md-12">
  <form action="" method="POST" enctype="multipart/form-data">
<div class="p-3 mb-3 bg-light rounded">
 <div class="my-2 p-3 bg-body rounded shadow-lg">
<h6 class="border-bottom pb-2 mb-3 fst-italic fw-bold">Write piece here...</h6>
 <div class="row mb-3">
<div class="col-md-6 mb-3">
<input type="hidden" class="form-control" name="userid" value="<?php echo $_SESSION['userid'];?>">
<input type="file" class="form-control" name="image">
</div>
<div class="col-md-6">
<input type="text" class="form-control fst-italic" name="post_title" placeholder="Article title here...">
</div>
</div>
<div class="row">
<div class="col-md-6 mb-3">
<textarea class="form-control" name="post_body">type article here... </textarea>
</div>
<div class="col-md-6">
<div class="btn-group">
<button class="btn btn-dark btn-sm" name="save">Save</button>
<button class="btn btn-success btn-sm" name="publish">Publish</button>
</div>
</div>
</div>


    </div>
    </div>
    </div>
    </form>
    </div>


<!-- My Article caterlog-->
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
