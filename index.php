<?php 
//include conn.php
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TECHV PFR</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>TECHV Personal Finance Revolution</h1>
  <p>Your App for Personal Finance.</p> 
</div>
  
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-4">
      
    </div>
    <div class="col-sm-4">
      <form method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" aria-describedby="usernameHelp" name="uname">
          <div id="usernameHelp" class="form-text">Enter your username</div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="pwd">
        </div>
        <button name="loginBtn" type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
    <div class="col-sm-4">
      
</div>

</body>
</html>

<?php

function login()
{
  global $pdo;


  // SELECT statement using PDO
  $stmt = $pdo->prepare("SELECT * FROM users WHERE uname = :uname AND PWD = :pwd");
  $stmt->execute(['uname' => $_POST['uname'], 'pwd' => $_POST['pwd']]);
  
  // Check if a row was returned (user exists and password matches)
  if ($row = $stmt->fetch()) {
      // Username and password match, redirect to dashboard
      header('Location: main.php');
      echo 'Login Successful';
      exit;
  } else {
      // Username and password do not match, redirect back to login form
      header('Location: index.php?error=1');
      exit;
  }
}
if(isset($_POST['loginBtn']))
{
   login();
}



?>
