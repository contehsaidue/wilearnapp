<?php 
 
 include 'includes/config.php';
 $msg = '';
 
if (isset($_POST['userregister'])){  

  
  // capturing values from registration form to variables
  $username = $_POST['username'];
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $dateofbirth = $_POST['dateofbirth'];
  $password = $_POST['password'];

  $photoname = $_FILES['photo']['name'];
  $tempname = $_FILES['photo']['tmp_name'];
  $folder = "assets/userregisteruploads/".$photoname; // storing image path to folder in root directory
  $folderdb = "assets/userregisteruploads/".$photoname; // storing image path into database
  $phone = $_POST['phone'];

  move_uploaded_file($tempname, $folder);

// query to insert new student to system database
$sql = "INSERT INTO tbluserregistration 
        (username, firstname, middlename, lastname,email,gender,dateofbirth,password,photo)
        VALUES ('$username', '$firstname', '$middlename' ,'$lastname','$email','$gender','$dateofbirth' ,'$password', '$folderdb')";

if (mysqli_query($conn, $sql)) {
    $msg = "Successfully registered!";
  header ('Location: index.php');    
}else {
    $msg = "Registration failed!";
    header ('Location: user-register.php'); 
 } 

}



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Saidu E Conteh, Chasey Chase">
    <meta name="generator" content="Hugo 0.83.1">
    <title>wi-Learn</title>

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome icons (free version)-->
  <script src="js/all.js"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text">

  </head>
  <body>
  
<!-- User Registration Portal -->
  <div class="container col-xl-10 col-xxl-8 px-4 py-3">
  <div class="alert alert-success alert-dismissible fade show" role="alert">
<strong><?php echo $msg;?></strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  <img class="mb-4 align-items-center" src="assets/articleimages/logo.png" alt="" width="72" height="57">
      <h3 class="fst-italic mb-2 text-center">User Registeration Portal</h3>
    <div class="row align-items-center g-lg-5 py-3 mb-5">
      <form action="" method="POST" enctype="multipart/form-data">
     <div class="row"> <!-- row starts -->
     <div class="col-md-6"> <!-- column 1 starts -->
     <div class="form-group mb-3">
       <input type="text" class="form-control"  name="username" placeholder="Username" required>
     </div>
    
     <div class="form-group mb-3">
       <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
     </div>
     
     <div class="form-group mb-3">
       <input type="text" class="form-control"  name="middlename" placeholder="Middle Name">
     </div>
     
     <div class="form-group mb-3">
       <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
     </div>
     <div class="form-group mb-3">
     <input type="email" class="form-control"  name="email" placeholder="E-mail">
     </div>
     </div> <!-- column 1 ends -->
     <div class="col-md-6"> <!-- column 2 starts -->
     <div class="form-group mb-3">
     <select name="gender"  class="form-select" required>
     <option selected>Gender</option>
     <option value="Male">Male</option>
     <option value="Female">Female</option>
     </select>
     </div>
     <div class="form-group mb-3">
     <input type="date" class="form-control"  name="dateofbirth" placeholder="Date of Birth">
     </div>
     <div class="form-group mb-3">
       <input type="password" class="form-control"  name="password" placeholder="Password">
     </div>
   
     <div class="form-group mb-3">
       <input type="file" class="form-control"  name="photo" placeholder="Photo" required>
     </div>
    
     <div class="btn-group fst-italic">
<button class="btn btn-md btn-dark" type="submit" name="userregister">
  <i class="fas fa-plus-circle"></i> Register</button>
     </div>
     </div> <!-- column 2 ends -->
 </div> <!--row ends --->
     </form>
  
    </div>
  </div>


  
  <?php require 'includes/footer.php';?>