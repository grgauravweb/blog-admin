<?php
//connection
require("./connection.php");
$db = new Db_connect();
$con = $db->_connect();
defined("_ACTIVE") or die("Access denied.");
//add blog
if(isset($_POST['addblog'])):
    
      $blog_title = isset($_POST['blog_title']) ? htmlspecialchars($_POST['blog_title']) : '';
      $_url = $db::slugify($blog_title,'blog');
      $blog_cover_img = "";
      
      if($db::is_url_exist($con, $_url)):
          $_url = empty($_POST['update']) ? $_url."-1" : $_url;
      endif;
    
      $blog_content = !empty($_POST['blog_content']) ? $_POST['blog_content'] : '';
      $blog_author = !empty($_POST['blog_author']) ? htmlspecialchars($_POST['blog_author']) : '_admin';
      $blog_meta_title = isset($_POST['blog_meta_title']) ? htmlspecialchars($_POST['blog_meta_title']) : '';
      $blog_meta_desc = isset($_POST['blog_meta_desc']) ? htmlspecialchars($_POST['blog_meta_desc']) : '';
      $blog_meta_keywords = isset($_POST['blog_meta_keywords']) ? htmlspecialchars($_POST['blog_meta_keywords']) : '';
      $blog_url = $_url;
      $updated_on = date("Y-m-d H:i:s");
      
      if(isset($_FILES['blog_cover_img']['name']) && !empty($_FILES['blog_cover_img']['name'])):
          $tdir = FCPATH."uploads/";
          $file = $_FILES['blog_cover_img']['name'];
          if(in_array(pathinfo($file, PATHINFO_EXTENSION), array("png","jpg","jpeg","gif"))):
            if(move_uploaded_file($_FILES['blog_cover_img']['tmp_name'], $tdir.$file)):
                $blog_cover_img = $file;
                if(file_exists(FCPATH."uploads/".$_POST['img_value']) && !is_dir(FCPATH."uploads/".$_POST['img_value'])):
                    unlink(FCPATH."uploads/".$_POST['img_value']);
                endif;
            endif;
          else:
            $_SESSION['error'] = "Please select image in png, jpg, jpeg, gif format.";
            header("Location:"._BURL."/admin/addblog");
          endif;
      else:
          $blog_cover_img = !empty($_POST['img_value']) ? $_POST['img_value'] : '';
      endif;
          
    
    if(isset($_POST['update']) && empty($_POST['update'])):
        $created_on = date("Y-m-d H:i:s");
        
        //query
        $_aq = "INSERT INTO `blogs`(
            blog_title,blog_content,blog_author,
            blog_meta_title,blog_meta_desc,blog_cover_img,blog_meta_keywords,
            blog_url, updated_on, created_on
            ) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $stmt = $con->prepare($_aq);
        $stmt->bind_param('ssssssssss',$blog_title,$blog_content,$blog_author,$blog_meta_title,$blog_meta_desc,$blog_cover_img,$blog_meta_keywords,$blog_url,$updated_on,$created_on);
        if($stmt->execute()):
            $_SESSION['success'] = "New Blog added successfully.";
            header("Location:"._BURL."/admin/allblogs");
        else:
            echo $con->error;
        endif;
    else:
        $_uq = "UPDATE `blogs` SET
            blog_title='".$blog_title."',blog_content='".$blog_content."',blog_author='".$blog_author."',
            blog_meta_title='".$blog_meta_title."',blog_meta_desc='".$blog_meta_desc."',blog_cover_img='".$blog_cover_img."',
            blog_meta_keywords='".$blog_meta_keywords."',
            blog_url='".$blog_url."', updated_on='".date("Y-m-d H:i:s")."'
            WHERE `blog_id`= ".$_POST['update'];
            
        if($con->query($_uq)):
            $_SESSION['success'] = "Blog updated successfully.";
            header("Location:"._BURL."/admin/allblogs");
        else:
            echo $con->error;
        endif;
        header("Location:"._BURL."/admin/allblogs");
    endif;
endif;

if(isset($_GET['delblog']) && !empty($_GET['delblog'])):
    //file
    $file = $db::get_value($con, 'blogs','blog_id',base64_decode($_GET['delblog']),'blog_cover_img');
    
    $_dq = "DELETE FROM `blogs` WHERE `blog_id`='".base64_decode($_GET['delblog'])."'";
    if($con->query($_dq)):
        if(file_exists(FCPATH."uploads/".$file) && !is_dir((FCPATH."uploads/".$file))):
            unlink(FCPATH."uploads/".$file);
        endif;
        $_SESSION['success'] = "Deleted Successfully.";
    else:
        $_SESSION['error'] = "Unable to delete it.";
    endif;
    header("Location:"._BURL."/admin/allblogs");
endif;

if(isset($_GET['delc']) && !empty($_GET['delc'])):
    
    $_dq = "DELETE FROM `comments` WHERE `comment_id`='".base64_decode($_GET['delc'])."'";
    if($con->query($_dq)):
        $_SESSION['success'] = "Deleted Successfully.";
    else:
        $_SESSION['error'] = "Unable to delete it.";
    endif;
    header("Location:".$_SERVER['HTTP_REFERER']);
    
endif;

if(isset($_GET['appc']) && !empty($_GET['appc'])):
    
    $_dq = "UPDATE `comments` SET `status` = '1' WHERE `comment_id`='".base64_decode($_GET['appc'])."'";
    if($con->query($_dq)):
        $_SESSION['success'] = "Approved Successfully.";
    else:
        $_SESSION['error'] = "Unable to approve it.";
    endif;
    header("Location:".$_SERVER['HTTP_REFERER']);
    
endif;

if(isset($_GET['disac']) && !empty($_GET['disac'])):
    
    $_dq = "UPDATE `comments` SET `status` = '0' WHERE `comment_id`='".base64_decode($_GET['disac'])."'";
    if($con->query($_dq)):
        $_SESSION['success'] = "Dis-approved Successfully.";
    else:
        $_SESSION['error'] = "Unable to dis-approve it.";
    endif;
    header("Location:".$_SERVER['HTTP_REFERER']);
    
endif;


?>