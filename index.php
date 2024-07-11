
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

<style>
html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
  border: 2px solid #0c1023;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  border:2px solid #0c1023;
}

</style>
 
  </head>
<body class="text-center">    
<main class="form-signin">
  <form action="users/userlogin-handler.php" method="POST"> 
    <img class="mb-4" src="assets/articleimages/logo.png" alt="" width="72" height="57">

    <div class="form-group mb-3">
      <input type="text" class="form-control" name="username" placeholder="@username">
    </div>
    <div class="form-group mb-3">
     <input type="password" class="form-control"  name="password" placeholder="Password">
    </div>


    <button class="w-100 btn btn-md btn-dark" name="userlogin">Sign in</button>
   <small>Don't have an account ? <a href="user-register.php" class="text-decoration-none text-success">Create one</a></small>
  </form>
</main>


<script src="js/bootstrap.bundle.min.js"></script>

<script src="js/jquery-3.3.0.min.js"></script>
</body>
</html>