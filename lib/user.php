<?php
include_once "database.php";
include_once "session.php";
$currenturl = $_SERVER['PHP_SELF'];
$chkifthisfile = strpos($currenturl, "user.php");
if($chkifthisfile > 0){
    header("Location: ../login.php");
}
class user{
    private $db;
    public function __construct(){
        $this->db = new database();
    }
    public function userReg($data){
        $name = $data['name'];
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        
        $chk_email = $this->emailCheck($email);
        $chk_username = $this->checkUserName($username);

        if(empty($name) || empty($username) || empty($email) || empty($password)){
            $msg = "<div class='alert alert-danger'>Fields must not be empty!</div>";
            return $msg;
        }
        if(strlen($username) < 3){
            $msg = "<div class='alert alert-danger'>Username is too short!</div>";
            return $msg;
        }elseif($chk_username === true){
            $msg = "<div class='alert alert-danger'>Sorry, this is Username is not available!</div>";
            return $msg;
        }elseif(preg_match('/[^a-z0-9_-]+/i', $username)){
            $msg = "<div class='alert alert-danger'>Username can only contain Alphanumarical values dashes & underscores!</div>";
            return $msg;
        }
        if(strlen($password) < 6){
            $msg = "<div class='alert alert-danger'>Password is too short!</div>";
            return $msg;
        }
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE){
            $msg = "<div class='alert alert-danger'>Please enter a valid email address!</div>";
            return $msg;
        }
        if($chk_email == true){
            $msg = "<div class='alert alert-danger'>Sorry, the email address already exist!</div>";
            return $msg;
        }
        $passmd5 = md5($password);
        $sql = "INSERT INTO tbl_user(name,username,email,password) VALUES(:name,:username,:email,:password)";
        $query = $this->db->pdo->prepare($sql);
        $query->bindParam(':name', $name);
        $query->bindParam(':username', $username);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $passmd5);
        $query->execute();
        $msg = "<div class='alert alert-success'>Congratulation, You've successfully registered!</div>";
            return $msg;
    }
    public function emailCheck($email){
        $sql = "SELECT email FROM tbl_user WHERE email = :email";
        $query = $this->db->pdo->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        if($query->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function checkUserName($username){
        $sql = "SELECT username FROM tbl_user WHERE username = :username";
        $query = $this->db->pdo->prepare($sql);
        $query->bindParam(":username", $username);
        $query->execute();
        if($query->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function getLoginUser($email, $password){
        $sql = "SELECT * FROM tbl_user WHERE email = :email AND password = :password";
        $query = $this->db->pdo->prepare($sql);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function userLogin($data){
        $email = $data['email'];
        $password = md5($data['password']);
        
        $chk_email = $this->emailCheck($email);

        if(empty($email) || empty($password)){
            $msg = "<div class='alert alert-danger'>Fields must not be empty!</div>";
            return $msg;
        }elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE){
            $msg = "<div class='alert alert-danger'>Please enter a valid email address!</div>";
            return $msg;
        }elseif(strlen($password) < 6){
            $msg = "<div class='alert alert-danger'>Password is too short!</div>";
            return $msg;
        }elseif($chk_email == false){
            $msg = "<div class='alert alert-danger'>Sorry, Email couldn't found!</div>";
            return $msg;
        }else{
            $result = $this->getLoginUser($email, $password);
        if($result){
            session::init();
            session::set("login", true);
            session::set("id", $result->id);
            session::set("name", $result->name);
            session::set("username", $result->username);
            session::set("email", $result->email);
            session::set("loginmsg", "<div class='alert alert-success'>Congratulations, You've successfully logged in!</div>");
            header("Location: index.php");
        }else{
            $msg = "<div class='alert alert-danger'>Sorry, Please enter correct login details & try again!</div>";
            return $msg;
        }
        }
    }
    public function getUserData(){
        $sql = "SELECT * FROM tbl_user ORDER BY id ASC";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getUserDataByID($userid){
        $sql = "SELECT * FROM tbl_user WHERE id = :id";
        $query = $this->db->pdo->prepare($sql);
        $query->bindParam(':id', $userid);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function updateUser($id, $data){
        $name = $data['name'];
        $username = $data['username'];
        $email = $data['email'];

        $chk_email = $this->emailCheck($email);
        $chk_username = $this->checkUserName($username);

        if(empty($name) || empty($username) || empty($email)){
            $msg = "<div class='alert alert-danger'>Fields must not be empty!</div>";
            return $msg;
        }elseif(strtolower($email) != strtolower(session::get('email')) && $chk_email === true){
            $msg = "<div class='alert alert-danger'>Sorry, This email is already been used by another account!</div>";
            return $msg;
        }elseif(strlen($username) < 3){
            $msg = "<div class='alert alert-danger'>Username is too short!</div>";
            return $msg;
        }elseif(strtolower($username) !== strtolower(session::get('username')) && $chk_username === true){
            $msg = "<div class='alert alert-danger'>Sorry, This Username is already been used by another account!</div>";
            return $msg;
        }elseif(preg_match('/[^a-z0-9_-]+/i', $username)){
            $msg = "<div class='alert alert-danger'>Username can only contain Alphanumarical values dashes & underscores!</div>";
            return $msg;
        }elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE){
            $msg = "<div class='alert alert-danger'>Please enter a valid email address!</div>";
            return $msg;
        }else{
        $sql = "UPDATE tbl_user SET name = :name, username = :username, email = :email WHERE id = :id";
        $query = $this->db->pdo->prepare($sql);
        $query->bindParam(":name", $name);
        $query->bindParam(":email", $email);
        $query->bindParam(":username", $username);        
        $query->bindParam(":id", $id);
        $result = $query->execute();
        if($result){
            $msg = "<div class='alert alert-success'><strong>Congratulations</strong>, Your profile has been updated successfully!</div>";
				session::set("name", $name);
				session::set("username", $username);
				session::set("email", $email);					
            return $msg;
        }else{
            $msg = "<div class='alert alert-danger'>Sorry, something went wrong! Please try again.</div>";
            return $msg;
        }
    }
    }
    public function deleteUser($userid){
        $sql = "DELETE FROM tbl_user WHERE id = :id";
        $query = $this->db->pdo->prepare($sql);
        $query->bindParam(":id", $userid);
        $result = $query->execute();
    }
    public function checkOldPass($userid, $oldpass){
        $sql = "SELECT password FROM tbl_user WHERE id = :id AND password = :password";
        $query = $this->db->pdo->prepare($sql);
        $query->bindParam(":id", $userid);
        $query->bindParam(":password", $oldpass);
        $query->execute();
        if($query->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function changePassword($userid, $data){
        $oldpass = $data['oldpassword'];
        $newpass = $data['npassword'];
        $cnpass = $data['cnpassword'];
        
        if(empty($oldpass) || empty($newpass) || empty($cnpass)){
            $msg = "<div class='alert alert-danger'>Fields must not be empty.</div>";
            return $msg;
        }
        $oldpassword = md5($oldpass);
        $chk_oldpass = $this->checkOldPass($userid, $oldpassword);
        if($chk_oldpass === false){
            $msg = "<div class='alert alert-danger'>Old password did not matched.</div>";
            return $msg;
        }
        if(strlen($newpass) < 6){
            $msg = "<div class='alert alert-danger'>New password is too short.</div>";
            return $msg;
        }
        if($newpass !== $cnpass){
            $msg = "<div class='alert alert-danger'>Confirm password did not matched with the New password.</div>";
            return $msg;
        }
        if($newpass == $cnpass && $chk_oldpass == true && $newpass == $oldpass){
            $msg = "<div class='alert alert-danger'>Sorry, we found this password as your current password!</div>";
            return $msg;
        }
            $password = md5($newpass);
            $sql = "UPDATE tbl_user SET password = :password WHERE id = :id";
            $query = $this->db->pdo->prepare($sql);
            $query->bindParam(":password", $password);
            $query->bindParam(":id", $userid);
            $result = $query->execute();
            if($result){
                $msg = "<div class='alert alert-success'>Congratulations your password has been changed successfully.</div>";
            return $msg;
            }else{
                $msg = "<div class='alert alert-danger'>Sorry, Something went wrong while updating your password!</div>";
            return $msg;
            }        
    }
}

$user = new user();

?>