<?php
  require_once(ROOT_PATH.'Controllers/apex_users_controller.php');
  $con = new apex_users_controller();
  $users = $con ->Find_all_users();
 ?>
<!DOCTYPE html>
<html lang="ja">
 <head>
 <meta charset="utf-8">
 <title>login_form</title>
 <meta name="description" content="サイトキャプションを入力">
 <meta name="keywords" content="サイトキーワードを,で区切って入力">
 <link rel="stylesheet" href="sample.css">

 <script src="sample.js"></script>
 </head>

 <body>
 <!----- ヘッダー ----->
 <header>ヘッダー</header>
 <nav>ナビ</nav>
 <!----- ヘッダー END ----->

 <!----- メインコンテンツ ----->
<?php foreach($users as $user): ?>
  <p><?= $user['name'] ?></p>
<?php endforeach; ?>
<a href="">
 <!----- フッター ----->
 <footer>フッター</footer>
 <!----- フッター END ----->
 </body>
</html>
