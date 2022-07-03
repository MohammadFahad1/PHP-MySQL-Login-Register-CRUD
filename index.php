<?php include 'inc/header.php'; 
session::checkSession();
  $loginmsg = session::get("loginmsg");  
  if(isset($loginmsg)){
    echo $loginmsg;
  }
  if(isset($_GET['delete']) && $_GET['delete'] !== ""  && $_GET['delete'] == session::get('id')){
      $deleteid = $_GET['delete'];
      $deleteUser = $user->deleteUser($deleteid);
      session::destroy();
      header("Location: login.php?dmsg=1");
  }elseif(isset($_GET['delete']) && $_GET['delete'] !== "" && $_GET['delete'] != session::get('id')){
    echo "<script>alert('অতি চালাকের গলায় দড়ি!');window.location = 'index.php'</script>";
  }elseif(isset($_GET['delete']) && $_GET['delete'] == ""){
    header("Location: index.php");
  }
  session::set("loginmsg", NULL);
?>
 <div class="panel panel-default">
   <div class="panel-heading">
     <h2>
       User list <span style="float: right;"><strong>Welcome! </strong> <?php
        $name = session::get("name"); 
        if(isset($name)){
          echo $name;
        }
        ?></span>
     </h2>
   </div>
 </div>
 <div class="panel_body">
   <table class="table table-striped table-bordered border-primary">
     <tr>
     <th width="10%">Serial</th>
     <th width="20%">Name</th>
     <th width="20%">Username</th>
     <th width="30%">Email Address</th>
     <th width="20%">Action</th>
     </tr>
<?php
  $userdata = $user->getUserData();
  $i = 0;
  foreach($userdata as $row){
    $i++;
?>
     <tr <?php if(session::get('id') == $row['id']){ echo 'class="bg-info"';} ?>>
       <td><?php echo $i; ?></td>
       <td><?php echo $row['name']; ?></td>
       <td><?php echo $row['username']; ?></td>
       <td><?php echo $row['email']; ?></td>
       <td><a href="profile.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View</a>
       <?php if(session::get('id') == $row['id']){ ?>
       <button class="btn btn-danger" onclick="confirmD()">Delete</button></td>
     </tr>
<?php }} ?>
   </table>
 </div>
 <script>
 function confirmD(){
  if(confirm("Are you sure you want to delete?")){
    window.location.replace("?delete=<?php echo session::get('id'); ?>");
  }else{
  window.location = "index.php";
  }
 }
 </script>
<?php include "inc/footer.php"; ?>