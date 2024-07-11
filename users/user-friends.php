
<?php include 'header.php';?>


<main class="container mt-3">
<div class="row">
<!-- Suggestions-->

<div class="col-md-12">
<div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <div class="my-3 p-3 bg-body rounded shadow-lg">
            <h6 class="border-bottom pb-2 mb-0">Active Friends</h6>
            <?php 

include '../includes/config.php';
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
               <strong> <a href="friend-profile.php?viewfriendprofile=<?php echo $friendviewquerystoreresult['userid'];?>" class="text-decoration-none"><?php echo $friendviewquerystoreresult['firstname'].' '.$friendviewquerystoreresult['lastname'];?></a></strong>
                  <a href="#" class="text-decoration-none  fw-bold btn btn-primary btn-sm">Chat</a>
                </div>
                <span class="d-block"><?php echo $friendviewquerystoreresult['username'];?></span>
              </div>
            </div>
            <?php
   }
}?>

  </div>
</div>
</main>
<?php include 'footer.php';?>
