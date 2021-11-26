<?php
session_start();
$_SESSION[]=array();
$_SESSION = $_POST;

 if(!preg_match("/^[a-zA-Z0-9]+$/", $_POST["user_name"]) || strlen($_POST["user_name"]) > 16) {
    $_SESSION['error'][0] = 1;
 }

 if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
   $_SESSION['error'][1] = 1;
 }

 if(mb_strlen($_POST["password"]) < 8) {
   $_SESSION['error'][2] = 1;
 }
 echo mb_strlen($_POST["password"]);
for($i=0; $i<3; $i++){
  if(isset($_SESSION['error'][$i])){
    if($_SESSION['error'][$i] == 1){
      header('Location: sign_up.php');
      exit();
    }
  }
}

header('Location: sign_up_confirm.php');
 ?>
