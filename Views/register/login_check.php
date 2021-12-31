<?php
require_once(ROOT_PATH.'Controllers/apex_users_controller.php');
$user = new apex_users_controller();
$users = $user->Login();
$user_id    = filter_input(INPUT_POST, 'email');  // 入力されたユーザーID
$password   = filter_input(INPUT_POST, 'password'); // 入力されたパスワード
//入力されたユーザーIDをキーにして、データベースから取り出したパスワードハッシュ
$hash = $users['password'];

// パスワードの検証
if ( ! password_verify($password, $hash) ) {
  die('ユーザーIDまたはパスワードが間違っています');
  exit();
}

// ログイン認証成功の処理
session_start();
session_regenerate_id(true); // セッションIDをふりなおす
$_SESSION['user_id'] = $users['id']; // ユーザーIDをセッション変数にセット

header('Location: ../main/home.php') //ログイン成功したらホームへ
 ?>
