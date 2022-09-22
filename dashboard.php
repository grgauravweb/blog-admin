<?php
!isset($_SESSION['_admin']) ? header("Location:"."/admin/") : '';
include_once("_include/_header.php");
?>
<div class="col-md-12 text-center">
  <h2 style="background:#ec3338;color: #fff;padding: 10px;font-weight: 900;">Welcome to  Digi IT Solutions</h2>  
  <img src="image/logo.png" width="100%">
</div>
<?php
include_once("_include/_footer.php");
?>