<?php
require_once(ROOT_PATH."/Models/apex_users.php");

class apex_users_controller {

  //POSTとGETを格納する変数
  private $request;
  private $User;

  public function __construct(){
    session_start();
    $this->User = $_SESSION['user_id'];
    //requestにPOSTとGETを格納
    $this->request['post'] = $_POST;
    $this->request['get'] = $_GET;
    //SQLデータベースを操作するクラスのインスタンス化
    $this->apex_users = new apex_users();
  }

  //ログイン認証
  public function Login(){
    $user = $this->apex_users->login($this->request['post']);
    return $user;
  }

  //フォームに入力された値をデータベースにインサート
  public function Create_account(){
    $this->apex_users->create_account($this->request['post']);
  }

  //すべてのユーザー情報を取得
  public function Find_all_users(){
    $user = $this->apex_users->find_all_users();
    return $user;
  }

  //プロフィール画像パス登録
  public function Set_user_prof_img() {
    $this->apex_user->set_user_prof_img();
  }

  //プロフィール画像パスを更新
  public function Update_user_prof_img() {
    $this->apex_user->set_user_prof_img();
  }

  //データベースにクリップURLを保存
  public function Clips_post($clip_data){
    $this->apex_users->clips_post($clip_data);
  }

  //データベースに登録されたクリップをすべて取得
  public function Get_all_clips(){
    $clips = $this->apex_users->get_all_clips();
    return $clips;
  }

  //ユーザーがいいねした投稿を取得
  public function Get_myself_favorites(){}

  public function Get_others_favorites(){
    $other_favorites = $this->apex_users->get_other_favorites();
    return $other_favorites;
  }
}
?>
