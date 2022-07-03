<?php include 'inc/header.php'; 
session::checkSession();
if(isset($_GET['id']) && $_GET['id'] !== ""){
  $userid = (int)$_GET['id'];
}else{
  header("Location: index.php");
}
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit']) && $_GET['id'] == session::get('id')){
  $updateUser = $user->updateUser($userid, $_POST);
}elseif($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit']) && $_GET['id'] != session::get('id')){
  echo "<script>alert('অতি চালাকের গলায় দড়ি!');window.location = 'index.php'</script>";
}
$userdata = $user->getUserDataByID($userid);
if(isset($updateUser)){
  echo $updateUser;
}
$sesid = session::get('id');
?>
   <br><br> 
   <div class="panel panel-default">
   <div class="panel-heading">
     <h2>
       User Profile <span style="float: right;"><a href="index.php" class="btn btn-danger">Back</a></span>
     </h2>
   </div>
 </div>
   <div class="panel-body" style="max-width: 600px;margin: auto;"><?php if($userdata){ ?>
        <form action="" method="post">
        <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $userdata->name;?>" <?php if($userid != $sesid){echo 'disabled'; } ?> required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control" value="<?php echo $userdata->username; ?>" <?php if($userid != $sesid){echo 'disabled'; } ?> required>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $userdata->email; ?>" <?php if($userid != $sesid){echo 'disabled'; } ?> required>
            </div>
            <br>
            <?php
              if($userid == $sesid){
            ?>
            <input type="submit" value="Update" class="btn btn-success" name="submit" id="submit">
            <a href="changepassword.php?id=<?php echo $userid; ?>" class="btn btn-success">Change Password</a>
        </form><?php } } ?>
    </div>
<?php include "inc/footer.php"; ?>