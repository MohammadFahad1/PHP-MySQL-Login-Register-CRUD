<?php include "lib/user.php";
$currenturl = $_SERVER['PHP_SELF'];
$chkifthisfile = strpos($currenturl, "header.php");
if($chkifthisfile > 0){
    header("Location: ../login.php");
}
session::init();
if(isset($_GET['action']) && $_GET['action'] == 'logout'){
  session::destroy();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <title>PDO CRUD Application Project</title>
  </head>
  <body>
      <!-- All code goes bellow here -->

      <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Login & Register System using PDO</a>
    <button class="navbar-toggler pull-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
      <?php
        $loggedin = session::get("login");
        $id = session::get("id");
        if($loggedin == true){
      ?>
        <li class="nav-item"><a class="nav-link" href="profile.php?id=<?php echo $id; ?>">Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="?action=logout">Logout</a></li>
        <?php }else{ ?>
        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
<div class="content">