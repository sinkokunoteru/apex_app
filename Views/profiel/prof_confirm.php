<?php
  require_once(ROOT_PATH.'Controllers/image_controller.php');
  $img = new img_controller();
  $img_data = $img->img_send();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ファイルチェックページ</title>
  </head>
  <body>
    <?php if( $img_data['up_ok'] ): ?>
      <p>このファイルをアップロードしますか？ <img src="<?= $img_data['up_file'] ?>"> です。</p>
      <a href="prof_complete.php">
    <?php else: ?>
    <p>アップロードは失敗しました。</p>
      <a href="../">アップロードページへ戻る</a>
    <?php endif; ?></p>
 </body>
</html>
