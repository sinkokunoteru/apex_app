<?php
  session_start();
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
 <h1>新規登録</h1>
 <section>
 <h2></h2>
 <p>ユーザーid</p>
<?= $_SESSION['user_name']?>
 <p>メールアドレス</p>
<?= $_SESSION['email']?>
 <p>パスワード</p>
<?= $_SESSION['password']?>
<br>
<a href="sign_up_complete.php">登録する</a>

 </section>
 </article>
 <!----- メインコンテンツ END ----->

 <!----- フッター ----->
 <footer>フッター</footer>
 <!----- フッター END ----->
 </body>
</html>
