<?php
//connection
require("./connection.php");
$db = new Db_connect();
$con = $db->_connect();
defined("_ACTIVE") or die("Access denied.");

$blogs = $db::get_blogs($con);

!isset($_SESSION['_admin']) ? header("Location:"."/admin/") : '';
include_once("_include/_header.php");
?>
<div class="content">
      <div class="card">
      <div class="card-body">
      <div class="step-app">
            
           <div class="row m-t-3">
        <div class="col-lg-12">
          <div class="card ">
            <div class="card-header bg-blue">
  <h5 class="text-white m-b-0">All Blog</h5>
            </div>
            <div class="card-body">
      <table class="table" id="blog">
          <thead>
              <tr>
                <th>Sr.</th>
                <th>Title</th>
                <th>Author</th>
                <th>Cover Image</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <?php if(isset($blogs) && !empty($blogs)): ?>
              <?php $i=1; while($b = $blogs->fetch_assoc()):?>
              <tr>
                  <td><?=$i?></td>
                  <td><?=$b['blog_title']?></td>
                  <td><?=$b['blog_author']?></td>
                  <td><img src="<?=_BURL?>/uploads/<?=$b['blog_cover_img']?>" height="30" /></td>
                  <td>
                      <a href="<?=_BURL?>/admin/addblog?editblog=<?=base64_encode($b['blog_id'])?>" class="btn btn-primary">Edit</a>
                      <a href="<?=_BURL?>/admin/comments?blog=<?=base64_encode($b['blog_id'])?>" class="btn btn-success">Comments</a>
                      <a href="<?=_BURL?>/admin/action?delblog=<?=base64_encode($b['blog_id'])?>" class="btn btn-danger">Delete</a>
                  </td>
              </tr>
              <?php $i++; endwhile;?>
              <?php endif;?>
          </tbody>
      </table>
    </div>
          </div>
        </div>
      </div> 
            
          </div>
          
          
        </div>
       
        
      </div></div>
<?php
include_once("_include/_footer.php");
?>