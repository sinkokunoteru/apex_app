<?php
require_once(ROOT_PATH.'/Models/Db.php');

Class apex_users extends Db{

  public function __construct($dbh=null){
    parent::__construct($dbh);
  }

  public function login($email=0,$password=0):Array{
    $error='';
    $sql = ' SELECT password FROM user_table';
    $sql.=' WHERE email=:email';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':email',$email,PDO::PARAM_STR);
    $sth->execute();
    $hash=$sth->fetch(PDO::FETCH_ASSOC);
    if($hash==false){
      echo 'メールアドレスが違います。';
      exit();
    }
    if(password_verify($password,$hash['password'])){
      $sql= 'SELECT id';
      $sql .=' FROM user_table WHERE email=:email';
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam(':email',$email,PDO::PARAM_STR);
      $sth->execute();
      $result=$sth->fetch(PDO::FETCH_ASSOC);
    }else{
      echo 'パスワードが違います。';
      exit();
    }
    if(!empty($result['id'])){
      return $result;
    }
  }

  public function email_exist_check($email=0):Array{
    $sql = 'SELECT email FROM user_table WHERE email=:email';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':email',$email,PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    if(!empty($result)){
      return $result;
    }else{
      $result['email'] = 0;
      return $result;
    }
  }

  public function remember_password($email=0,$birth=0):Array{
    var_dump($birth);
    $sql = 'SELECT id FROM user_table WHERE email = :email AND birth = :birth';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':email',$email,PDO::PARAM_STR);
    $sth->bindParam(':birth',$birth,PDO::PARAM_STR);
    if(!empty($result)){
      $result = $sth->fetch(PDO::FETCH_ASSOC);
    }else{
      echo "一致しません";
      exit();
    }
    return $result;
  }
  public function findFood():Array{
    $sql = 'SELECT foods.id as food_id,foods.name as food_name,foods_category.name as category_name,category_id From foods';
    $sql.= ' INNER JOIN foods_category ON category_id = foods_category.id';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function suggest_recipes($id=0):Array{//最終部分
    $sql = 'SELECT recipe_id,genre_id,food_id';
    $sql.=' FROM pairings';
    $sql.=' INNER JOIN recipes on recipes.id = pairings.recipe_id';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function find_made_recipes($id=0):Array{
    $sql = 'SELECT recipes_made.id as made_id,recipes_id,date,recipes.name as recipe_name';
    $sql .=' FROM recipes_made';
    $sql .=' INNER JOIN recipes on recipes_id = recipes.id';
    $sql .=' WHERE user_id = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id',$id['id'],PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function findRecipe():Array{
    $sql = 'SELECT recipes.name as recipe_name,recipes.id as recipe_id,recipes.genre_id as genre_id  From recipes';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function insert_food($id=0,$food_id=0){
    $sql = 'INSERT INTO refrigerator(refrigerator_user,foods_id)';
    $sql.= ' VALUES(:user_id,:food_id)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':user_id',$id,PDO::PARAM_INT);
    $sth->bindParam(':food_id',$food_id,PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function insert_recipe($id=0,$recipe_id=0,$cook_image=0){
    $sql = 'INSERT INTO recipes_made(user_id,recipes_id,cook_image)';
    $sql.= ' VALUES(:user_id,:recipe_id,:cook_image)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':user_id',$id,PDO::PARAM_INT);
    $sth->bindParam(':recipe_id',$recipe_id,PDO::PARAM_INT);
    $sth->bindParam(':cook_image',$cook_image,PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function findFridge($id=0):Array{
    $sql = 'SELECT refrigerator_user,foods.name as foods_name,foods_id,date,refrigerator.id as refregerator_id';
    $sql .=' FROM refrigerator';
    $sql .=' INNER JOIN foods on foods_id= foods.id';
    $sql .=' WHERE refrigerator_user = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id',$id['id'],PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
  public function findby($id = 0):Array{
    $sql = 'SELECT * FROM contacts';
    $sql .=' WHERE id = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id',$id,PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
  public function countAll():Int{
    $sql = 'SELECT count(*) as count FROM contacts';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $count = $sth->fetchColumn();
    return $count;
  }

  public function contents($user=0):Array{
    $sql = 'INSERT INTO user_table(name,birth,gender,email,password)';
    $sql.= ' VALUES(:name,:birth,:gender,:email,:password)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':name',$user[0],PDO::PARAM_STR);
    $sth->bindParam(':birth',$user[1],PDO::PARAM_STR);
    $sth->bindParam(':gender',$user[2],PDO::PARAM_INT);
    $sth->bindParam('email',$user[3],PDO::PARAM_STR);
    $sth->bindParam(':password',password_hash($user[4],PASSWORD_DEFAULT),PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetchALL(PDO::FETCH_ASSOC);
    return $result;
  }

  public function delete_fridge($id = 0):Array{
    $sql = 'DELETE FROM refrigerator WHERE id = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id',$id,PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchALL(PDO::FETCH_ASSOC);
    return $result;
  }
  public function delete_made_recipe($id = 0):Array{
    $sql = 'DELETE FROM recipes_made WHERE id = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id',$id,PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchALL(PDO::FETCH_ASSOC);
    return $result;
  }
  public function find_one_recipe_name($id = 0):Array{
    $sql = 'SELECT name FROM recipes WHERE id=:id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id',$id,PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchALL(PDO::FETCH_ASSOC);
    return $result;
  }
  public function one_genre_recipes($genre_id=0):Array{
    $sql = 'SELECT name,id FROM recipes WHERE genre_id = :genre_id';
    $sth =$this->dbh->prepare($sql);
    $sth->bindParam(':genre_id',$genre_id,PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchALL(PDO::FETCH_ASSOC);
    return $result;
  }
  public function update_form($id = 0,$data = 0):Array{
    $sql = 'UPDATE contacts';
    $sql .= ' SET name=:name,kana=:kana,tel=:tel,email=:email,body=:body';
    $sql .=' WHERE id = :id';
    $sth=$this ->dbh->prepare($sql);
    $sth->bindParam(':id',$id,PDO::PARAM_INT);
    $sth->bindParam(':name',$data[0],PDO::PARAM_STR);
    $sth->bindParam(':kana',$data[1],PDO::PARAM_STR);
    $sth->bindParam(':tel',$data[2],PDO::PARAM_INT);
    $sth->bindParam(':email',$data[3],PDO::PARAM_STR);
    $sth->bindParam(':body',$data[4],PDO::PARAM_STR);
      var_dump($id);
    $sth->execute();
    $result = $sth->fetchALL(PDO::FETCH_ASSOC);
    return $result;
  }
}
?>
