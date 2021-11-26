<!DOCTYPE html>
<html lang="ja">
 <head>
 <meta charset="utf-8">
 <title>サイトタイトル</title>
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
<form action="login_check.php" method="post">
  <p>メールアドレス</p>
  <input type = "text" name = "email">
  <p>パスワード</p>
  <input type = "text" name = "password">
 <!----- メインコンテンツ END ----->
  <input type = "submit" value ="ログイン">
</form>
 <!----- フッター ----->
 <footer>フッター</footer>
 <!----- フッター END ----->
 </body>
</html>
