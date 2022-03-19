<?php
  require_once(ROOT_PATH.'Controllers/apex_users_controller.php');
  require_once(ROOT_PATH.'Controllers/clips_controller.php');
  $con = new apex_users_controller();
  $user_clips=$con->Get_all_clips();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>apex-legends_clips</title>
    <meta name="description" content="サイトキャプションを入力">
    <meta name="keywords" content="サイトキーワードを,で区切って入力">
    <link rel="stylesheet" href="../css/clips.css">
  </head>
  <body>
    <header>
      <?php   include(ROOT_PATH.'Views/design/header.php'); ?>
    </header>
    <div class="view_clips_block">
      <?php foreach($user_clips as $clips):?>
        <div class="contribute">
          <div class="clips_header">
            <div class="contribute_user">
              <img src="../img/design_img/test.jpg">
              <div class="name_and_comment">
                <p class="contributer_name">sinkokunoteru</p>
                <p class="contributer_name"><?= $clips['comment']?></p>
              </div>
            </div>

          </div>
          <div class="contribute_movie">
            <?= $clips['video_name']?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="like-button">

    </div>
    <div class="page_num">
      <?php include(ROOT_PATH.'Views/design/page_count.php'); ?>
    </div>
    <footer>
      <?php include(ROOT_PATH.'Views/design/footer.php'); ?>
    </footer>
  </body>
</html>
