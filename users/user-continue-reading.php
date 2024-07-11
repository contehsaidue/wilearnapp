
<?php include 'header.php';
$commentmsg = '';

if(isset($_POST['postcomment'])){
include '../includes/config.php';
  $postid = $_POST['postid'];
  $visitorid = $_POST['visitorid'];
  $comment = $_POST['comment'];
  $date_commented = date("Y-m-d");

  $commentinsertquery = "INSERT INTO tblcomments (postid,visitorid, comment, date_commented) VALUES ('$postid','$visitorid','$comment','$date_commented')";
  $commentinsertqueryrun = mysqli_query($conn, $commentinsertquery);

  if($commentinsertqueryrun){
    $commentmsg = "Comment submitted successfully";
  }else{
    $commentmsg = "Failed to submit comment!";
  }




}








?>

 <!-- Main Dashboard User-->
<main class="container">
<?php
  include '../includes/config.php';
  if(isset($_GET['userid'])){
    $userid = $_GET['userid'];
    $userquery = "SELECT * FROM tblpostarticle 
    JOIN tbluserregistration ON tblpostarticle.userid = tbluserregistration.userid
     WHERE tbluserregistration.userid = '$userid'";
    $userqueryrun = mysqli_query($conn, $userquery);
    $userqueryresult = mysqli_fetch_assoc($userqueryrun);
  }

?>
  <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
    <img class="me-3 rounded" src="../<?php echo $userqueryresult['photo'];?>" alt="" width="48" height="38">
    <span class="lh-1">
      <h1 class="h6 mb-0 text-white lh-1 fw-bold"><?php echo $userqueryresult['firstname'].' '.$userqueryresult['lastname'];?>
        <span>
          <a href="user-write-post.php" class="text-decoration-none fw-bold btn btn-dark btn-sm">Pinned Post <i class="fas fa-plus-circle"></i></a>
          </span>
      </h1>
      <small class="fw-bold fst-italic"><?php echo $userqueryresult['username'];?></small>
    </div>
  </div>
  
  <!-- More Read-->
  <div class="row">

<!--Blog Section-->

  <!-- Page Content -->
  <section>
  <div class="container">

<div class="row">
<div class="col-md-3 mb-3 g-1">
<?php
  include '../includes/config.php';
  if(isset($_GET['postid'])){
    $postid = $_GET['postid'];
    $postquery = "SELECT * FROM tblpostarticle where postid = '$postid'";
    $postqueryrun = mysqli_query($conn, $postquery);
    $row = mysqli_fetch_assoc($postqueryrun);

  }
    ?>
<!-- Preview Image -->
<img class="img-fluid me-0 rounded" src="../<?php echo $row['image'];?>" alt="<?php echo $row['postid'];?>">
</div>
<div class="col-md-3 mb-3 g-1">
<img class="img-fluid rounded" src="../<?php echo $row['image'];?>" alt="<?php echo $row['postid'];?>">
</div>
<!-- Post Content Column -->
<div class="col-md-6">
<!-- Author -->
<h6 class="lead">
<a href="friend-profile.php?viewfriendprofile=<?php echo $userqueryresult['userid'];?>" class="text-success text-decoration-none fw-bold"><?php echo $userqueryresult['username'];?></a>
    <a href="https://www.facebook.com/emmanuels.conteh.9"><i class="fab fa-fw fa-facebook-f text-primary"></i></a>
            <a href="#!"><i class="fab fa-fw fa-instagram text-primary"></i></a>
            <a href="#!"><i class="fab fa-fw fa-whatsapp text-primary"></i></a>
</h6>
<!-- Title -->
<h5 class="mt-4 post-title"><strong><?php echo $row['title'];?></strong></h5>

<hr>

<!-- Date/Time -->
<p> on <?php echo $row['date_published'];?></p>
<!-- Post Content -->
<p class="post-text small"> <?php echo $row['body'];?>
</p>
 </div>
</div>
    
<!--Comment Section Starts-->
 <div class="row mt-3">
 <div class="col-md-6">
 <form action="" method="POST">
 <?php
  include '../includes/config.php';
  if(isset($_GET['postid'])){
    $postid = $_GET['postid'];
    $postquery = "SELECT * FROM tblpostarticle where postid = '$postid'";
    $postqueryrun = mysqli_query($conn, $postquery);
    $row = mysqli_fetch_assoc($postqueryrun);

  }
    ?>
 <input type="hidden" name="postid" value="<?php echo $row['postid'];?>">
 <input type="hidden" name="visitorid" value="<?php echo $_SESSION['userid'];?>">
 <div class="form-group mb-3">
     <textarea name="comment" class="form-control fst-italic rounded fw-bold" placeholder="say something here..." required>
</textarea>
</div>
<div class="form-group">
<button type="submit" name="postcomment" class="btn btn-dark btn-sm rounded-2">Send <i class="fas fa-comments"></i></button>
<h6 class="float-right lead text-success p-1"><?php echo  $commentmsg ;?></h6>
</div>
 </form>
 </div>
</div>
<div class="row">
 <div class="col-md-12">
 <!--Comment Show Section-->

<a class="nav-link fw-bold text-dark" href="javascript:;" class="dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#comments">
<i class="fa fa-fw fa-caret-down"></i> comments <i class="fas fa-comments text-success"></i></a>
<ul id="comments" class="collapse list-unstyled">
<div class="my-1 p-3 bg-body rounded shadow-lg">
<h6 class="border-bottom pb-2 mb-0">comments <i class="fas fa-comments"></i></h6>

<?php
include '../includes/config.php';
 if(isset($_GET['postid'])){
$postid = $_GET['postid'];

$commentshowquery = "SELECT * FROM tblcomments 
JOIN tbluserregistration ON tblcomments.visitorid = tbluserregistration.userid
JOIN tblpostarticle ON tblcomments.postid = tblpostarticle.postid WHERE tblcomments.postid = '$postid' ORDER BY commentid DESC";
$commentshowqueryrun = mysqli_query($conn, $commentshowquery);
$commentshowrowcount = mysqli_num_rows($commentshowqueryrun);
if ($commentshowrowcount  > 0){
while ($row = mysqli_fetch_assoc($commentshowqueryrun)){

?>
<div class="d-flex pt-3 border-bottom">
<img  width="32" height="32" class="rounded-circle me-2" src="../<?php echo $row['photo'] ;?>" alt="<?php echo $userqueryresult['username'];?>">
   <div class="">
    <p class="pb-3 mb-0 small lh-sm fw-bold">
        <strong class="d-block text-success fw-bold"><a href="friend-profile.php?viewfriendprofile=<?php echo $row['userid'] ;?>" class="text-decoration-none"><?php echo $row['username'] ;?></a></strong>
        <?php echo $row['comment']; ?> </p> 
        <div class="float-end">
    <a href="action.php?del=<?php echo $row['commentid']; ?>" class="text-danger mr-2" onclick="return confirm('Do you want to delete this comment?')";
    title="Delete"><i class="fas fa-trash"></i></a>
<a href="blog.php?edit=<?php echo $row['commentid']; ?>" class="text-dark" title="Edit"><i class="fas fa-edit"></i></a>
    </div>
    </div>

    </div>
    <?php
}
  }
}
   ?>
    <small class="d-block text-end mt-3">
    <a href="#" class="text-decoration-none fw-bold text-dark">All comments <i class="fas fa-comments"></i></a>
    </small>
          </div>
   
           
</ul>
</div>
</div>

<!--Comment Section Ends-->

  
  <!--Blog Post Section Ends-->
          

  <!-- Rrecent Feeds Section-->
<div class="row">
<div class="col-md-12">
<div class="my-3 p-3 bg-body rounded shadow-lg">
    <h6 class="border-bottom pb-2 mb-0">More Feeds</h6>
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
