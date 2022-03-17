<?php
  require_once(ROOT_PATH.'Controllers/apex_users_controller.php');
  $user = new apex_users_controller();
  $img_path = $user->Get_user_prof_img();
 ?>
<!DOCTYPE html>
<html lang="ja">
 <head>
   <meta charset="utf-8">
   <title>apex_legends</title>
   <meta name="description" content="腕前が近い人間とマッチング">
   <meta name="keywords" content="apex,apex legends,fps,マッチング,アプリ">
 </head>

 <body>
  <header>
    <?php   include(ROOT_PATH.'Views/design/header.php'); ?>
  </header>
  <div class="prof_block">
    <div class="prof_img">
      <img class="profiel_img" src="<?=$img_path ?>">
    </div>
  </div>
  <a href="prof_img_form.php">プロフィール画像の変更</a>
  <p>@user_id</p>



  <footer>
   <?php include(ROOT_PATH.'Views/design/footer.php'); ?>
  </footer>

 </body>
</html>
