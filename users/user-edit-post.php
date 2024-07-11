
<?php include 'header.php';?>

<main class="container">
  <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
    <img class="me-3 rounded" src="../<?php echo $_SESSION['photo'];?>" alt="" width="48" height="38">
    <span class="lh-1">
      <h1 class="h6 mb-0 text-white lh-1 fw-bold"><?php echo $_SESSION['firstname'].' '.$_SESSION['lastname'];?>
        <span>
          <a href="#" class="text-decoration-none fw-bold btn btn-dark btn-sm">Remove Pinned</a>
          <a href="user-write-post.php" class="text-decoration-none fw-bold btn btn-success btn-sm">Create</a>
          </span>
      </h1>
      <small class="fw-bold"><?php echo $_SESSION['username'];?></small>
    </div>
  </div>
  <!-- Main Dashboard User-->
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><?php echo $_SESSION['updatemsg'];?></strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  <!-- Creating article section -->
  <div class="col-md-12">
<div class="p-3 mb-3 bg-light rounded">
 <div class="my-2 p-3 bg-body rounded shadow-lg">
<h6 class="border-bottom pb-2 mb-3 fst-italic fw-bold">Edit piece here...</h6>
 <form action="" method="POST" enctype="multipart/form-data">
 <div class="row mb-3">
<div class="col-md-6 mb-3">
<input type="hidden" class="form-control" name="postid" value ="<?= $_SESSION['postid'];?>">
<input type="file" class="form-control" name="image" value="">
</div>
<div class="col-md-6">
<input type="text" class="form-control fst-italic" name="post_title" value="<?= $_SESSION['title'];?>">
</div>
</div>
<div class="row">
<div class="col-md-6 mb-3">
<textarea class="form-control" name="post_body" value=""> <?= $_SESSION['body'];?></textarea>
</div>
<div class="col-md-6">
<div class="btn-group">
<button  class="btn btn-dark btn-sm fw-bold" name="resave">Re-Save</button>
<button  class="btn btn-success btn-sm fw-bold" name="updatepost">Re-Publish</button>
</div>
</div>
</div>

</form>

              </div>
            </div>
          </div>
          </div>


          <!-- My Article caterlog-->
<div class="row">
<div class="col-md-12">
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong><?php echo $_SESSION['deletemsg'];?></strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
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
                <a href="controller.php?deletepost=<?= $row['postid'];?>" class="text-decoration-none  fw-bold btn btn-danger btn-sm">Remove <i class="fas fa-trash"></i></a>
                </div>
              </div>
            </div>
          </div>
    <?php
      }
    }
    
    ?>
          </div>
        
</main>

<?php include 'footer.php';?>