<?php
//connection
require("./connection.php");
$db = new Db_connect();
$con = $db->_connect();
defined("_ACTIVE") or die("Access denied.");

$comments = $db::get_all_commnets($con, base64_decode($_GET['blog']));

!isset($_SESSION['_admin']) ? header("Location:"."/admin/") : '';
include_once("_include/_header.php");
?>
<div class="col-md-9">
  <div class="container">
      <h2>Comments on <a href="<?=$db::get_value($con, 'blogs','blog_id',base64_decode($_GET['blog']),'blog_url')?>" target="_blank">
          <?=$db::get_value($con, 'blogs','blog_id',base64_decode($_GET['blog']),'blog_title')?></a></h2>
      <table class="table" id="blog">
          <thead>
              <tr>
                <th>Sr.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Comment</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <?php if(isset($comments) && !empty($comments)): ?>
              <?php $i=1; while($c = $comments->fetch_assoc()):?>
              <tr>
                  <td><?=$i?></td>
                  <td><?=$c['name']?></td>
                  <td><?=$c['email']?></td>
                  <td><?=$c['comment']?></td>
                  <td>
                      <?php if($c['status']==1): ?>
                      <a href="<?=_BURL?>/admin/action?disac=<?=base64_encode($c['comment_id'])?>" class="btn btn-sm btn-danger">DisApprove</a>
                      <?php else:?>
                      <a href="<?=_BURL?>/admin/action?appc=<?=base64_encode($c['comment_id'])?>" class="btn btn-sm btn-success">Approve</a>
                      <?php endif;?>
                      <a href="<?=_BURL?>/admin/action?delc=<?=base64_encode($c['comment_id'])?>" class="btn btn-sm btn-danger">Delete</a>
                  </td>
              </tr>
              <?php $i++; endwhile;?>
              <?php endif;?>
          </tbody>
      </table>
  </div>  
</div>
<?php
include_once("_include/_footer.php");
?>