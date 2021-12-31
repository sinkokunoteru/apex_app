<?php
  session_start();
  $error_message =[
    "ユーザーidは半角英数字で入力してください。",
    "正しいメールアドレスを入力してください",
    "パスワードは8文字以上半角英数字で入力してください"
  ];

    for($i=0; $i<3; $i++){
      if(!isset($_SESSION['error'][$i])){
        $_SESSION['error'][$i] = 0;
      }
    }
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
<form action = "sign_up_validate.php" method = "post">
  <p>ユーザid</p>
  <?php if($_SESSION['error'][0] == 1){ echo $error_message[0].'<br>';} ?>
  <input type="text" name="user_name">
  <p>生年月日</p>
  <input type="date" name="birth">
  <p>性別</p>
  <select name="gender">
      <option value=""></option>
      <option value="true">男</option>
      <option value="false">女</option>
  </select>
  <p>メールアドレス</p>
  <?php if($_SESSION['error'][1] == 1){ echo $error_message[1].'<br>';} ?>
  <input type="text" name="email">
  <p>パスワード</p>
  <?php if($_SESSION['error'][2] == 1){ echo $error_message[2].'<br>';} ?>
  <input type="text" name="password">
  <input type="submit"value="送信">
</form>

 </section>
 </article>
 <!----- メインコンテンツ END ----->

 <!----- フッター ----->
 <footer>フッター</footer>
 <!----- フッター END ----->
 </body>
</html>
