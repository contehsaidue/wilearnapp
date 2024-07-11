
<?php include 'header.php';
$message ='';

if(isset($_POST['friendrequest'])){

  // checking to see if the users are already friends
  
  $outgoingsenderid = $_POST['outgoingsenderid'];
  $incomingreceiverid = $_POST['incomingreceiverid'];

  $usersrelationcheck ="SELECT * FROM tblfriendrequest";
  $usersrelationcheckrun = mysqli_query($conn,  $usersrelationcheck);
  $usersrelationcheckresult = mysqli_fetch_assoc($usersrelationcheckrun);

if ($usersrelationcheckresult['outgoingsenderid'] === $outgoingsenderid && $usersrelationcheckresult['incomingreceiverid'] === $incomingreceiverid)
{
  $message = 'You are already friends with this user';
 exit();
}else{

  $friendrequestinsertquery = "INSERT INTO tblfriendrequest (outgoingsenderid ,incomingreceiverid) VALUES ('$outgoingsenderid','$incomingreceiverid')";
  $friendrequestqueryrun = mysqli_query($conn, $friendrequestinsertquery);
  if($friendrequestqueryrun){
    $message = 'Friend request sent';
  }else {
    $message = 'Failed to add friend!';
  }

  }
}


?>


<main class="container mt-3">

<div class="row">
<!-- Suggestions-->

<div class="col-md-6">
  <div class="my-3 p-3 bg-body rounded shadow-lg">
    <h6 class="border-bottom pb-2 mb-0">Suggestions</h6>
    <?php 

include '../includes/config.php';
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
<?php include 'footer.php';?>
