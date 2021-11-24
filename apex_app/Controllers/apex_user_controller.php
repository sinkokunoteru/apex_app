<?php
require_once(ROOT_PATH."/Models/apex_users.php");

class apex_users_controller{
  private $User;
  private $request;


  public function __construct(){
    $this->request['post'] = $_POST;
    $this->request['get'] = $_GET;
    $this->Refrigerator = new Refrigerator();
  }

  public function suggest_recipe():Array{
    $recipes = $this->Refrigerator->suggest_recipes($this->request['post']['id']);
    $params = [
      'recipes'=>$recipes
    ];
    return $params;
  }

  public function fridge_view(){
    $all = $this->Refrigerator->findFridge($this->request['get']);
    $params = [
      'forms'=>$all
    ];
    return $params;
  }
  public function made_recipe_view(){
    $all = $this->Refrigerator->find_made_recipes($this->request['get']);
    $params = [
      'forms'=>$all
    ];
    return $params;
  }
public function add_food(){
  $food = $this->Refrigerator->insert_food($this->request['post']['id'],$this->request['post']['childS']);
  $params = [
    'forms'=>$food
  ];
  return $params;
}
public function add_recipe(){
  $recipes = $this->Refrigerator->insert_recipe($this->request['post']['id'],$this->request['post']['recipe_genre'],$this->request['post']['image_name']);
  $params = [
    'forms'=>$recipes
  ];
  return $params;
}
public function foods_view(){
  $foods = $this->Refrigerator->findFood();
  $params = [
    'foods'=>$foods
  ];
  return $params;
}
public function recipes_list(){
  $recipes=$this->Refrigerator-> findRecipe();
  $params = [
    'recipes'=>$recipes
  ];
  return $params;
}
  public function login_check(){
    $account=$this->Refrigerator->login($this->request['post']['data'][0],$this->request['post']['data'][1]);
    $params=[
      'form'=>$account
    ];
    return $params;
  }

  public function email_exist(){
    $mail = $this->Refrigerator->email_exist_check($this->request['post'][3]);
    $params=[
      'mail'=>$mail
    ];
    return $params;
  }
  public function send(){
    $send = $this->Refrigerator->contents($this->request['post']);
    $params = [
      'form'=>$send
    ];
    return $params;
  }

  public function del_fridge(){
    $del=$this->Refrigerator->delete_fridge($this->request['get']['id']);
    $params = [
      'form'=>$del
    ];
    return $params;
  }
  public function del_made_recipe(){
    $del=$this->Refrigerator->delete_made_recipe($this->request['get']['id']);
    $params = [
      'form'=>$del
    ];
    return $params;
  }

  public function byid(){
    $form = $this->Refrigerator->findby($this->request['post']['id']);
    $params = [
      'form'=>$form
    ];
    return $params;
  }

  public function upd(){
    $form = $this->Refrigerator->update_form($this->request['get'],$this->request['post']);
    $params=[
      'form'=>$form
    ];
    return $params;
  }
  public function remember(){
    var_dump($this->request['post']['date']);
    $user = $this->Refrigerator->remember_password($this->request['post']['email'],$this->request['post']['date']);
    $params=[
      'id'=>$user
    ];
    return $params;
  }

  public function find_one_rec_name($recipe_id){
    $recipe = $this->Refrigerator->find_one_recipe_name($recipe_id);
    $params=[
      'one_food'=>$recipe
    ];
    return $params;
  }

  public function genre_recipe($genre_id){
    $genre = $this->Refrigerator->one_genre_recipes($genre_id);
    $params=[
      'one_genre'=>$genre
    ];
    return $genre;
  }
}
?>
