
<?php include 'includes/header.php';
      include 'includes/second-header.php';
?>


  <!-- Start Page Header -->
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="fw-bold fst-italic">Latest posts</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page Header --> 


<!-- Main Article scroll area -->
 <div class="row">

 <div class="col-md-8">
   <section class="px-3 py-5 p-md-5">
		    <div class="container">
			    <div class="mb-5">
          <?php 
          include 'includes/config.php';
          $feedsquery = "SELECT * FROM tblpostarticle 
          JOIN tbluserregistration ON tblpostarticle.userid = tbluserregistration.userid
          ORDER BY postid DESC";
          $runfeedsquery = mysqli_query($conn, $feedsquery);
          $feedsqueryrowcount = mysqli_num_rows($runfeedsquery);
  
          if($feedsqueryrowcount > 0){
            while ($row = mysqli_fetch_assoc($runfeedsquery)){
  ?>
				    <div class="row g-3 g-xl-4">
                 <!-- Post Image -->
					    <div class="col-4 col-xl-3">
					        <img class="img-fluid rounded-2" src="../<?php echo $row['photo'];?>" alt="image">
					    </div>
					    <div class="col">
                <!-- Post Title -->
						    <h3 class="mb-1"><a class="text-link text-decoration-none" href="users/user-continue-reading.php?userid=<?php echo $row['userid'];?>&postid=<?php echo $row['postid'];?>"><?php echo $row['title'];?></a></h3>
						    <div class="meta mb-1 text-success fst-italic">
                <span class="me-2 fw-bold">
                <a href="users/friend-profile.php?viewfriendprofile=<?php echo $row['userid'];?>" class="text-decoration-none text-dark"><?php echo $row['username'];?></a></span>
                <span class="me-2 fw-bold">5 min read</span>
                <a class="text-link text-decoration-none" href="#"><i class="fas fa-comments text-dark"></i>
                <?php 
          include 'includes/config.php';
          $postid = $row['postid'];
          $feedsquery = "SELECT * FROM tblcomments 
          JOIN tblpostarticle ON tblcomments.postid = tblpostarticle.postid WHERE tblcomments.postid = '$postid'"; 
          $queryrun = mysqli_query($conn, $feedsquery);
          $queryrowcount = mysqli_num_rows($queryrun);
          ?>
                 <span class="badge bg-success text-light rounded-pill align-text-bottom"><?php echo $queryrowcount ;?></span>
                 </a>
                 </div>
						    <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
						    <a class="text-link text-decoration-none btn btn-success btn-sm" href="users/user-continue-reading.php?userid=<?php echo $row['userid'];?>&postid=<?php echo $row['postid'];?>">Read more &rarr;</a>
              </div><!--//col-->
              <?php

}
}
?>
				    </div><!--//row-->
			    </div><!--//item-->

			  
			    <nav class="blog-nav nav nav-justified my-5 bg-success">
				  <a class="nav-link-prev nav-item nav-link rounded-left" href="#"> <i class="fas fa-long-arrow-alt-left"></i> Previous</a>
				  <a class="nav-link-next nav-item nav-link rounded" href="#">Next <i class="fas fa-long-arrow-alt-right"></i></a>
				</nav>
				
		    </div>
      </section>
     
</div><!-- column 1 end -->
 
    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <div class="my-3 p-3 bg-body rounded shadow-lg">
            <h6 class="border-bottom pb-2 mb-0">Active Friends</h6>
            <?php 

include 'includes/config.php';
$userid = $_SESSION['userid'];

$friendviewquery = "SELECT * FROM tblfriendrequest JOIN tbluserregistration ON 
tblfriendrequest.incomingreceiverid = tbluserregistration.userid WHERE 
outgoingsenderid = '$userid'";

$friendviewqueryrun = mysqli_query($conn, $friendviewquery);
$friendviewqueryqueryrowcount = mysqli_num_rows($friendviewqueryrun);
if ($friendviewqueryqueryrowcount > 0) {

while ($friendviewquerystoreresult = mysqli_fetch_assoc($friendviewqueryrun))
{ ?>
     
     <div class="d-flex text-muted pt-3">
                <img class="me-3 rounded" src="../<?php echo $friendviewquerystoreresult['photo'];?>" alt="<?php echo $friendviewquerystoreresult['incomingreceiverid'];?>" width="48" height="38">
              <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
               <strong> <?php echo $friendviewquerystoreresult['firstname'].' '.$friendviewquerystoreresult['lastname'];?></strong>
                  <a href="#" class="text-decoration-none  fw-bold btn btn-primary btn-sm">Chat</a>
                </div>
                <span class="d-block"><?php echo $friendviewquerystoreresult['username'];?></span>
              </div>
            </div>
            <?php
   }
}?>

           
            <small class="d-block text-end mt-3">
              <a href="#" class="text-decoration-none text-success fw-bold">More</a>
            </small>
          </div>

<!-- Friend Suggestion Area -->
    <div class="my-3 p-3 bg-body rounded shadow-lg">
      <h6 class="border-bottom pb-2 mb-0">Suggestions</h6>
      <?php 

include 'includes/config.php';
$userid = $_SESSION['userid'];

$suggestionquery = "SELECT * FROM tbluserregistration WHERE userid != '$userid'";
$suggestionqueryrun = mysqli_query($conn, $suggestionquery);
$suggestionqueryrowcount = mysqli_num_rows($suggestionqueryrun);
if ($suggestionqueryrowcount > 0) {

while ($suggestionquerystoreresult = mysqli_fetch_assoc($suggestionqueryrun))
{ ?>
<div class="d-flex text-muted pt-3">
        <img class="me-3 rounded" src="../<?php echo $suggestionquerystoreresult['photo'];?>" alt="<?php echo $suggestionquerystoreresult['userid'];?>" width="48" height="38">
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark"><?php echo $suggestionquerystoreresult['firstname'].' '.$suggestionquerystoreresult['lastname'];?></strong>
          <form action = "" method ="POST">
            <input type = "hidden" value = "<?php echo $_SESSION['userid'];?>" name="outgoingsenderid">
            <input type = "hidden" value = "<?php echo $suggestionquerystoreresult['userid'];?>" name="incomingreceiverid">
            <button class="text-decoration-none text-light fw-bold btn btn-success btn-sm" name = "friendrequest">Follow <i class="fas fa-plus"></i></button>
  </form>
          </div>
        <span class="d-block"><?php echo $suggestionquerystoreresult['username'];?></span>
      </div>
    </div>
    <?php
     }     
  }
?>
     
      <small class="d-block text-end mt-3">
        <a href="#" class="text-decoration-none text-success fw-bold">All suggestions</a>
      </small>
 
  </div>
</div>
</main>
<?php include 'includes/footer.php';?>
