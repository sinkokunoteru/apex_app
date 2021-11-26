<?php
  session_start();
  $_POST = $_SESSION;
  require_once(ROOT_PATH.'Controllers/apex_users_controller.php');
  $user = new apex_users_controller();
  $users = $user ->create_account();
 ?>
<!DOCTYPE html>
<html lang="ja">
 <head>
 <meta charset="utf-8">
 <title>apex_legends</title>
 <meta name="description" content="腕前が近い人間とマッチング">
 <meta name="keywords" content="apex,apex legends,fps,マッチング,アプリ">
 <link rel="stylesheet" href="index.css">

 <script src="sample.js"></script>
 </head>

 <body>
 <!----- ヘッダー ----->
 <header>ヘッダー</header>
 <nav>ナビ</nav>
 <!----- ヘッダー END ----->

 <!----- メインコンテンツ ----->
 <article>
 <h1>登録が完了しました。</h1>
 <section>
 <h2></h2>

<a href="login.php">ホームへ戻る</a>

 </section>
 </article>
 <!----- メインコンテンツ END ----->

 <!----- フッター ----->
 <footer>フッター</footer>
 <!----- フッター END ----->
 </body>
</html>
