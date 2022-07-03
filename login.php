<?php include 'inc/header.php';
session::checkLogin();
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
  $userLogin = $user->userLogin($_POST);
}
if(isset($_GET['dmsg']) && $_GET['dmsg'] !== ""){
  echo "<div class='alert alert-success'><strong>Congratulations</strong>, Your account has been deleted successfully!</div>";
}
?>
   <br><br> 
   <div class="panel panel-default">
   <div class="panel-heading">
     <h2>
       User Login
     </h2>
     <?php
      if(isset($userLogin)){
        echo $userLogin;
      }
     ?>
   </div>
 </div>
   <div class="panel-body" style="max-width: 600px;margin: auto;">
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div><br>
            <input type="submit" value="Submit" class="btn btn-success" name="submit" id="submit">
        </form>
    </div>
<?php include "inc/footer.php"; ?>