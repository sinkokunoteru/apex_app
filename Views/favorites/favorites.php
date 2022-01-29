<?php
  require_once(ROOT_PATH.'Controllers/apex_users_controller.php');
  require_once(ROOT_PATH.'Scripts/apex_status.php');
  $con = new apex_users_controller();
  $scripts = new apex_status();
  $users = $con ->Find_all_users();
 ?>
<!DOCTYPE html>
<html lang="ja">
 <head>
   <meta charset="utf-8">
   <title>apex-legends_likes</title>
   <meta name="description" content="サイトキャプションを入力">
   <meta name="keywords" content="サイトキーワードを,で区切って入力">
   <link rel="stylesheet" href="../css/home.css">
 </head>

 <body>
   <!-- ヘッダー -->
   <header>
     <?php   include(ROOT_PATH.'Views/design/header.php'); ?>
   </header>
   <!-- ヘッダーここまで -->

   <div class="side_bar">
     <!-- twitterのサイドバーみたいなやつ実装予定 -->
   </div>
   <div class="likes-block">
   <!-- されたlike -->
   <?php if($likes == $likes): ?>
     <!-- foreach -->
     <a href="user_prof.php">
       <div class="likes_bar">
         <div class="user-top-img">
           <img href="user_prof.png">
        </div>
      </div>
    </a>
      <!-- /foreach -->
    <?php endif; ?>
 <!-- されたlikeここまで -->

<!-- したlike -->
<?php if($likes == $likes): ?>
  <!-- foreach -->
 <a href="user_prof.php">
   <div class="likes_bar">
     <div class="user-top-img">
       <img href="user_prof.png">
     </div>
   </div>
 </a>
   <!-- /foreach -->
<!-- したlike -->
 <?php endif; ?>
  </div>
 </body>

<!-- フッター -->
 <footer>
   <?php include(ROOT_PATH.'Views/design/footer.php'); ?>
 </footer>
 <!-- フッターここまで -->
 </body>
</html>
