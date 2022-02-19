<?php
  require_once(ROOT_PATH.'Controllers/image_controller.php');
  $img = new img_controller();
  if(isset($_POST['img_path'])){
    $img->img_delete($_POST['img_path']);
  }
?>
<!DOCTYPE html>
<html lang="ja">
 <head>
   <meta charset="utf-8">
   <title>apex_legends</title>
   <meta name="description" content="腕前が近い人間とマッチング">
   <meta name="keywords" content="apex,apex legends,fps,マッチング,アプリ">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
   <script src="../js/img_preview.js"></script>
 </head>
 <body>
  <header>
    <?php   include(ROOT_PATH.'Views/design/header.php'); ?>
  </header>
  <article>
    <form class="view_box" method="post" action="prof_confirm.php" enctype="multipart/form-data">
      <input type="file" name="up" class="file">
      <input type="submit"value="アップロード">
    </form>
  </article>
  <footer>
    <?php include(ROOT_PATH.'Views/design/footer.php'); ?>
  </footer>
 </body>
</html>
