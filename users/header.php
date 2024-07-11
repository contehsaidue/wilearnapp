<?php
 require 'controller.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>User Dashboard</title>

    <!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/offcanvas.css" rel="stylesheet">

    <style>
  .account-section{
  padding:.5rem;
  color:#fff;
}
    </style>

      <!-- Font Awesome icons (free version)-->
  <script src="../js/all.js"></script>
    <!-- Custom styles for this template -->
    <link href="../js/offcanvas.css" rel="stylesheet">
  </head>
  <body class="bg-light">
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-purple" aria-label="Main navigation">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold fst-italic text-purple" href="#">wi-Learn</a>
    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold">
        <li class="nav-item">
          <a class="nav-link" href="user-profile.php"><i class="fas fa-user"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> <i class="fas fa-bell"></i></a>
        </li>
        <li class="nav-item">
        <?php 
          include '../includes/config.php';
          $userid = $_SESSION['userid'];
          $feedsquery = "SELECT * FROM tblpostarticle WHERE userid = '$userid' ORDER BY postid DESC";
          $runfeedsquery = mysqli_query($conn, $feedsquery);
          $feedsqueryrowcount = mysqli_num_rows($runfeedsquery);
  
  ?>
        <a class="nav-link" href="user-feeds.php">
      My Feeds
      <span class="badge bg-success text-light rounded-pill align-text-bottom"><?php echo $feedsqueryrowcount;?></span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="">Groups <i class="fas fa-users"></i></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="suggestions.php">Suggestions</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="user-topics.php">Topics
      <span class="badge bg-dark text-light rounded-pill align-text-bottom">15</span>
    </a>
</li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown01">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <a class="nav-link" href="#"><i class="fas fa-search text-white"></i></a>
      <div class="dropdown bg-success account-section rounded">
      <a href="#" class="d-flex align-items-center link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="../<?php echo $_SESSION['photo'];?>" alt="<?php echo $_SESSION['userid'];?>" width="32" height="32" class="rounded-circle me-2">
        <strong class="text-white"><?php echo $_SESSION['firstname'].' '.$_SESSION['lastname'];?></strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="#">New Topic</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="../users/user-profile.php">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
    </div>
  </div>
</nav>
<!-- Secondary Navigation -->

<div class="nav-scroller bg-body shadow-lg">
  <nav class="nav nav-underline" aria-label="Secondary navigation">
    <a class="nav-link active fw-bold fst-italic" aria-current="page" href="../main-dashboard.php">Feed View</a>
    <a class="nav-link" href="dashboard.php">
     <i class="fas fa-home"></i>
    </a>
    <a class="nav-link" href="user-friends.php">
       <i class="fas fa-users"></i>
       <?php 
          include '../includes/config.php';
          $userid = $_SESSION['userid'];
          $friendsquery = "SELECT * FROM tblfriendrequest WHERE outgoingsenderid = '$userid'";
          $runfriendsquery = mysqli_query($conn,  $friendsquery);
          $friendsqueryrowcount = mysqli_num_rows($runfriendsquery);
  
  ?>
      <span class="badge bg-purple text-light rounded-pill align-text-bottom"><?php echo $friendsqueryrowcount ;?></span>
    </a>
    <a class="nav-link" href="#"><i class="fas fa-comments"></i>
      <span class="badge bg-dark text-light rounded-pill align-text-bottom">3</span>
    </a>
    <a class="nav-link" href="#"> <i class="fas fa-microscope"></i></a>
</nav>
</div>