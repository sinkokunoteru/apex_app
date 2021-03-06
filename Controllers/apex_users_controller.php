<?php
require_once(ROOT_PATH."/Models/apex_users.php");

class apex_users_controller {
  private $User;
  private $request;


  public function __construct(){
    $this->request['post'] = $_POST;
    $this->request['get'] = $_GET;
    $this->apex_users = new apex_users();
  }

  public function suggest_recipe():Array{
    $recipes = $this->Refrigerator->suggest_recipes($this->request['post']['id']);
    $params = [
      'recipes'=>$recipes
    ];
    return $params;
  }

  public function Create_account(){
    $user = $this->apex_users->create_account($this->request['post']);
  }

  public function Login(){
    $user = $this->apex_users->login($this->request['post']);
    return $user;
  }

  public function Find_all_users(){
    $user = $this->apex_users->find_all_users();
    return $user;
  }

  public function Clips_post($clip_data){
    $this->apex_users->clips_post($clip_data);
  }

  public function Get_all_clips(){
    $clips = $this->apex_users->get_all_clips();
    return $clips;
  }

  public function Get_myself_favorites(){}

  public function Get_others_favorites(){
    $other_favorites = $this->apex_users->get_other_favorites();
    return $other_favorites;
  }
}
?>
