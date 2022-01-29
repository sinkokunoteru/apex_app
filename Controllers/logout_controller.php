
<?php
class logout_controller {

  public function logout(){
    session_start();
    $_SESSION = array();  //セッション変数削除
    session_destroy();
    header("Location:../main/index.php");
  }
}
?>
