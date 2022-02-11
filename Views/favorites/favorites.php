<?php
  require_once(ROOT_PATH.'Controllers/apex_users_controller.php');
  $user= new apex_users_controller();
  $users = $user->Find_all_users();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>apex-legends_likes</title>
    <meta name="description" content="サイトキャプションを入力">
    <meta name="keywords" content="サイトキーワードを,で区切って入力">
    <link rel="stylesheet" href="../css/favorites.css">
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
      <?php if(0==0): ?>
      <!-- foreach -->
        <a href="user_prof.php">
          <div class="likes_bar">
            <div class="user-form">
              <div><img src="../img/design_img/test.jpg"></div>
              <div><p>コメントが入ります<p></div>
            </div>
          </div>
        </a>
      <!-- /foreach -->
    <!-- されたlikeここまで -->
    <?php elseif(null==null): ?>
      <!-- したlike出力部 -->
        <!-- foreach -->
        <a href="user_prof.php">
          <div class="likes_bar">
            <div class="user-form">
              <img href="user_prof.png">
            </div>
          </div>
        </a>
        <!-- /foreach -->
      <!-- したlikeここまで -->
    <?php endif;?>
    </div>
    <!-- フッター -->
    <footer>
      <?php include(ROOT_PATH.'Views/design/footer.php'); ?>
    </footer>
 <!-- フッターここまで -->
  </body>
</html>
