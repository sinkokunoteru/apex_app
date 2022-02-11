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
      <p>この画像に変更しますか？ <img src="<?='../img/'.basename($img_data['up_file']); ?>"></p>
      <a href="profiel_complete.php">アップロード</a>
    <?php else: ?>
    <p>アップロードは失敗しました。</p>
      <a href="../">アップロードページへ戻る</a>
    <?php endif; ?></p>
 </body>
</html>
