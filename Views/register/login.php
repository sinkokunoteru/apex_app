<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>login_form</title>
    <meta name="description" content="サイトキャプションを入力">
    <meta name="keywords" content="サイトキーワードを,で区切って入力">
    <link rel="stylesheet" href="../css/login.css">
    <script src="sample.js"></script>
  </head>
  <body>
    <form action="login_check.php" method="post">
      <div class="input_form">
        <p>メールアドレス</p>
        <input type="text" name="email" placeholder="xxxxx@ijohoa.com">
        <p>パスワード</p>
        <input type="text" name="password" placeholder="xxxxxxxxxxxxx"><br>
        <input type="submit" value="ログイン">
      </div>
    </form>
    <footer>フッター</footer>
  </body>
</html>
