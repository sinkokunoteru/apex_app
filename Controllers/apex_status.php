<?php
class apex_status{

  public function age_calculate($date) {
    //YYYYmmddから年齢を求める
    $age = (int)(((date("Ymd"))-(str_replace('-','',$date)))/10000);
    return $age; //年齢を返す
  }

}
 ?>
