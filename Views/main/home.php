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
 <title>apex-legends_home</title>
 <meta name="description" content="サイトキャプションを入力">
 <meta name="keywords" content="サイトキーワードを,で区切って入力">
 <link rel="stylesheet" href="sample.css">

 <script src="sample.js"></script>
 </head>

 <body>
 <header>
   <?php   include(ROOT_PATH.'Views/design/header.php'); ?>
 </header>
 <nav>ナビ</nav>

<?php foreach($users as $user): ?>
  <p><?= $user['name'] ?></p>
  <p><?= $scripts->age_calculate($user['birth']) ?></p>
<?php endforeach; ?>
<a href=""></a>
 <!----- フッター ----->
 <footer>
   <?php include(ROOT_PATH.'Views/design/footer.php'); ?>
 </footer>
 <!----- フッター END ----->
 </body>
</html>
