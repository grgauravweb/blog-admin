<?php
//connection
require("./connection.php");
$db = new Db_connect();
$con = $db->_connect();
defined("_ACTIVE") or die("Access denied.");

$blog = $db::get_single_blog($con, isset($_GET['editblog'])?$_GET['editblog']:'');

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
  <h5 class="text-white m-b-0">Add Blog</h5>
            </div>
            <div class="card-body">
   
        <form action="action" method="POST" enctype="multipart/form-data">
           
            <input type="hidden" name="update" value="<?php echo isset($blog['blog_id']) ? $blog['blog_id'] :'' ?>" />
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Blog Title</label>
                    <input type="text" class="form-control" name="blog_title"
                    value="<?php echo isset($blog['blog_title']) ? $blog['blog_title'] :'' ?>"
                    required/>
                </div>
                <div class="form-group col-md-6">
                    <label>Blog Cover Image</label>
                    <?php
                    if(isset($blog['blog_cover_img']) && !empty($blog['blog_cover_img'])):
                    ?>
                    <img src="<?=_BURL?>/uploads/<?=$blog['blog_cover_img']?>"
                    style="position:absolute;right:15px;"
                    height="50" alt="preview"/>
                    <?php endif;?>
                    <input type="hidden" name="img_value" value="<?php echo isset($blog['blog_cover_img']) ? $blog['blog_cover_img'] :'' ?>" />
                    <input type="file" class="form-control" name="blog_cover_img"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Blog Content</label>
                    <textarea type="text" class="form-control" id="blog_content" name="blog_content"><?php echo isset($blog['blog_content']) ? $blog['blog_content'] :'' ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Meta Title</label>
                    <input type="text" class="form-control"
                    value="<?php echo isset($blog['blog_meta_title']) ? $blog['blog_meta_title'] :'' ?>"
                    name="blog_meta_title"/>
                </div>
                <div class="form-group col-md-6">
                    <label>Blog Author</label>
                    <input type="text" class="form-control" 
                    value="<?php echo isset($blog['blog_author']) ? $blog['blog_author'] :'' ?>"
                    name="blog_author"/>
                </div>
                <div class="form-group col-md-12">
                    <label>Meta Keywords</label>
                    <input type="text" class="form-control" 
                    value="<?php echo isset($blog['blog_meta_keywords']) ? $blog['blog_meta_keywords'] :'' ?>"
                    name="blog_meta_keywords"/>
                </div>
                <div class="form-group col-md-12">
                    <label>Meta Description </label>
                    <input type="text" class="form-control" 
                    value="<?php echo isset($blog['blog_meta_desc']) ? $blog['blog_meta_desc'] :'' ?>"
                    name="blog_meta_desc"/>
                </div>
                <div class="form-group col-md-12">
                    <input type="submit" class="btn btn-primary" style="float:right;" name="addblog" value="Submit"/>
                </div>
            </div>
        </form>
    
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