
<?php include 'header.php';
$inserttopicmsg = '';

if(isset($_POST['createtopic'])){
 include '../includes/config.php';

    $userid = $_POST['userid'];
    $topicname = $_POST['topicname'];
    $category = $_POST['category'];

    $insertopic = "INSERT INTO tbltopics (topiccreator, topicname, topiccategory) VALUES
    ('$userid','$topicname','$category')";
    $inserttopicrun = mysqli_query($conn, $insertopic);
    if ($inserttopicrun){
        $inserttopicmsg = 'Topic successfully created';
    }else{
        $inserttopicmsg = 'Failed to create topic!';
    }
}
?>


<main class="container mt-3">
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong><?php echo $inserttopicmsg;?></strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="row">
<!-- Topics -->
<div class="col-md-4 bg-body rounded shadow-lg py-3 my-3 g-3">
<div class="container">
    <h6 class="border-bottom pb-2 mb-0">Topics</h6>
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
            <button class="text-decoration-none text-light fw-bold btn btn-dark btn-sm" name = "friendrequest"> <i class="fas fa-plus"></i></button>
  </form>
          </div>
      </div>
    </div>
    <?php
     }     
  }
?>
    <small class="d-block text-end mt-3">
      <a href="#" class="text-decoration-none text-success fw-bold">All topics</a>
    </small>
</div>
</div> <!-- column 1 ends -->

<div class="col-md-8 rounded shadow-lg py-3 my-3">
<h6 class="border-bottom pb-2 mb-3">Create topic <i class="fas fa-plus"></i></h6>
<form action="" method="POST">
  <div class="row">
  <div class="col-md-6">
  <?php
    include '../includes/config.php';
    $userid = $_SESSION['userid'];

    $usersearchquery = "SELECT * FROM tbluserregistration WHERE userid = '$userid'";
    $usersearchqueryrun = mysqli_query($conn, $usersearchquery);
    $usersearchqueryresult = mysqli_fetch_assoc($usersearchqueryrun);
    ?>
      <input type="hidden" name="userid" value="<?php echo $usersearchqueryresult['userid'];?>">

      <div class="form-group mb-3">
          <input type="text" class="form-control fst-italic" name="topicname" placeholder="Create topic">
</div>
</div>
<div class="col-md-6">
<div class="form-group mb-3">
        <select class="form-select" name="category">
        <?php
    include '../includes/config.php';
    $categorysearchquery = "SELECT * FROM tblcategories";
    $categorysearchqueryrun = mysqli_query($conn, $categorysearchquery);
    $categorysearchqueryrowcount = mysqli_num_rows($categorysearchqueryrun);
    if($categorysearchqueryrowcount > 0){
        while ($row = mysqli_fetch_assoc($categorysearchqueryrun)) {
?>
        <option value="<?php echo $row['categoryid'];?>"><?php echo $row['categoryname'];?></option>
        <?php 
        }
    }?>
    </select>
</div>
<div class="btn-group">
    <button class="btn btn-dark btn-sm" name="createtopic">Create Topic</button>
</div>
</div>
</div>
</form>
    <small class="d-block text-end mt-3">
      <a href="#" class="text-decoration-none text-success fw-bold">All topics</a>
    </small>
  </div>

</div>
</div><!-- row ends -->
</main>




<?php include 'footer.php';?>
