<?php 
 session_start();
 include '../includes/config.php';
 
if (isset($_POST['userlogin'])){  

  $username = $_POST['username'];
  $password = $_POST['password'];

$userLoginCheckQuery = "SELECT * FROM tbluserregistration WHERE username = '$username' AND password = '$password'";
$userLoginCheckQueryRun = mysqli_query($conn, $userLoginCheckQuery);
$userLoginCheckNumRows = mysqli_num_rows($userLoginCheckQueryRun);

if ($userLoginCheckNumRows > 0){

  $userLoginCheckStoreResult = mysqli_fetch_assoc($userLoginCheckQueryRun);

  if ($userLoginCheckStoreResult['username'] === $username && $userLoginCheckStoreResult['password'] === $password)
{ 
  // storing user DB values as seesion variables
  $_SESSION['userid'] = $userLoginCheckStoreResult['userid'];
  $_SESSION['username'] = $userLoginCheckStoreResult['username'];
  $_SESSION['firstname'] = $userLoginCheckStoreResult['firstname'];
  $_SESSION['middlename'] = $userLoginCheckStoreResult['middlename'];
  $_SESSION['lastname'] = $userLoginCheckStoreResult['lastname'];
  $_SESSION['email'] = $userLoginCheckStoreResult['email'];
  $_SESSION['gender'] = $userLoginCheckStoreResult['gender'];
  $_SESSION['password'] = $userLoginCheckStoreResult['password'];
  $_SESSION['photo'] = $userLoginCheckStoreResult['photo'];

 //redirecting user to dashboard
 header("Location: ../main-dashboard.php");
 exit();
        
  }

   }else {
          echo "Invalid username or password";
          header("Location:../index.php");
          exit();
            }

        
        }



?>



