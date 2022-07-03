<?php 
include 'inc/header.php'; 
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
  $userReg = $user->userReg($_POST);
}
session::checkLogin();
?>
   <br><br> 
   <div class="panel panel-default">
   <div class="panel-heading">
     <h2>
       User Registration
     </h2>
     <?php if(isset($userReg)){
       echo $userReg;
     } ?>
   </div>
 </div>
   <div class="panel-body" style="max-width: 600px;margin: auto;">
        <form action="" method="post">
        <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <br>
            <input type="submit" value="Submit" class="btn btn-success" name="submit" id="submit">
        </form>
    </div>
<?php include "inc/footer.php"; ?>