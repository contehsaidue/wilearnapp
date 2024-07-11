<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>wi-Learn</title>

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/offcanvas.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="css/index.css" rel="stylesheet">
   <!-- <link href="css/theme-1.css" rel="stylesheet">-->

<style>
.account-section{
  padding:.5rem;
  color:#fff;
}
</style>

<script src="js/all.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/offcanvas.css" rel="stylesheet">
  </head>
  <body class="bg-light"> 
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-purple" aria-label="Main navigation">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold fst-italic text-purple" href="#">wi-Learn</a>
    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active d-md-none" aria-current="page" href="../users/dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pinned</a>
        </li>
        <li class="nav-item">
    <a class="nav-link" href="user-topics.php">Topics
    <?php 
          include 'includes/config.php';
          $topicquery = "SELECT * FROM tbltopics";
          $runtopicquery = mysqli_query($conn,  $topicquery);
          $topicqueryrowcount = mysqli_num_rows($runtopicquery);
  
  ?>
      <span class="badge bg-dark text-light rounded-pill align-text-bottom"><?php echo $topicqueryrowcount;?></span>
    </a>
   </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Switch account</a>
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
        <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
      </ul>
    </div>
  </div>
    </div>
  </div>
</nav>

<div class="nav-scroller bg-body shadow-sm mb-5">
  <nav class="nav nav-underline" aria-label="Secondary navigation">
    <a class="nav-link active fw-bold" aria-current="page" href="../users/dashboard.php">Dashboard</a>
    <a class="nav-link" href="#">Groups
    <i class="fas fa-users"></i>
      <span class="badge bg-light text-dark rounded-pill align-text-bottom">27</span>
    </a>
    <a class="nav-link" href="#"><i class="fas fa-search"></i></a>
    <a class="nav-link" href="#">Suggestions</a>
    <a class="nav-link" href="#">Topics</a>
</div>
    
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>
  <body>
    
<div class="container">
 <!-- <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="link-secondary" href="#">Subscribe</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="#">Large</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="link-secondary" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
        <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
      </div>
    </div>
  </header> -->

<!--  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 link-secondary" href="#">World</a>
      <a class="p-2 link-secondary" href="#">U.S.</a>
      <a class="p-2 link-secondary" href="#">Technology</a>
      <a class="p-2 link-secondary" href="#">Design</a>
      <a class="p-2 link-secondary" href="#">Culture</a>
      <a class="p-2 link-secondary" href="#">Business</a>
      <a class="p-2 link-secondary" href="#">Politics</a>
      <a class="p-2 link-secondary" href="#">Opinion</a>
      <a class="p-2 link-secondary" href="#">Science</a>
      <a class="p-2 link-secondary" href="#">Health</a>
      <a class="p-2 link-secondary" href="#">Style</a>
      <a class="p-2 link-secondary" href="#">Travel</a>
    </nav>
  </div>-->
</div> 