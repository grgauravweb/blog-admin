<?php
// session_start();
//connection
require("./connection.php");
$db = new Db_connect();
$con = $db->_connect();
defined("_ACTIVE") or die("Access denied.");

//login code
if(isset($_POST['submit'])):
    $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
    
    if($db::is_admin($con, $username, md5($password))):
      header("Location:"."/admin/dashboard");  
    else:
        echo '<script>alert("Username and password is not valid.")</script>';
    endif;
endif;

//ask for login if not logged in
if(isset($_SESSION['_admin']) && !empty($_SESSION['_admin'])):
    if(isset($_GET['action']) && $_GET['action']=='logout'):
        session_destroy();
        unset($_SESSION);
        header("Location:"."/admin");
    elseif(isset($uri[2]) && file_exists($uri[2].".php")):
        require_once($uri[2].".php");
    else:
    require_once("dashboard.php");
    endif;
else:
    require_once("login.php");
endif;


?>