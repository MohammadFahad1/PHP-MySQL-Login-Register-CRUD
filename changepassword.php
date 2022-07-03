<?php include 'inc/header.php'; session::checkSession(); ?>
   <br><br> 
   <?php
    if(isset($_GET['id']) && $_GET['id'] !== "" && $_GET['id'] == session::get('id')){
      $userid = $_GET['id'];
    }else{
      header("Location: index.php");
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" &&  isset($_POST['submit']) && $_GET['id'] == session::get('id')){
      $changePassword = $user->changePassword($userid, $_POST);
    }elseif($_SERVER['REQUEST_METHOD'] == "POST" &&  isset($_POST['submit']) && $_GET['id'] !== session::get('id')){
      header("Location: index.php");
    }
   ?>
   <div class="panel panel-default">
   <div class="panel-heading">
     <h2>
       Change Password <span style="float: right;"><a href="profile.php" class="btn btn-danger">Back</a></span>
     </h2>
   </div>
 </div><?php if(isset($changePassword)){ echo $changePassword; } ?>
   <div class="panel-body" style="max-width: 600px;margin: auto;">
        <form action="" method="post">
        <div class="form-group">
                <label for="oldpassword">Old Password:</label>
                <input type="password" name="oldpassword" id="oldpassword" class="form-control">
            </div>
            <div class="form-group">
                <label for="npassword">New Password:</label>
                <input type="password" name="npassword" id="npassword" class="form-control">
            </div>
            <div class="form-group">
                <label for="cnpassword">Confirm New Password:</label>
                <input type="password" name="cnpassword" id="cnpassword" class="form-control">
            </div>
            <br>
            <input type="submit" value="Update" class="btn btn-success" name="submit" id="submit">
        </form>
    </div>
<?php include "inc/footer.php"; ?>