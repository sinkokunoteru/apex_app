<?php
require_once(ROOT_PATH.'/Models/Db.php');

Class apex_users extends Db{

  public function __construct($dbh=null){
    parent::__construct($dbh);
  }

  public function login($data){
    $sql = ' SELECT password,id FROM users';
    $sql.=' WHERE email=:email';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':email',$data['email'],PDO::PARAM_STR);
    $sth->execute();
    $hash=$sth->fetch(PDO::FETCH_ASSOC);
    return $hash;
  }

  public function create_account($data){
    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
    $sql = ' INSERT INTO users(name,birth,gender,email,password)';
    $sql.= ' VALUES(:name,:birth,:gender,:email,:password)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':name',$data['user_name'],PDO::PARAM_STR);
    $sth->bindParam(':birth',$data['birth'],PDO::PARAM_STR);
    $sth->bindParam(':gender',$data['gender'],PDO::PARAM_STR);
    $sth->bindParam(':email',$data['email'],PDO::PARAM_STR);
    $sth->bindParam(':password',$data['password'],PDO::PARAM_STR);
    $sth->execute();
  }

  public function find_all_users():Array{
    $sql = 'SELECT * FROM users';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchALL(PDO::FETCH_ASSOC);
    return $result;
  }

}
?>
