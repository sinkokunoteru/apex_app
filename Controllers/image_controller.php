<?php
class img_controller {
  //関数が冗長化してるから分ける
  public function img_send(){
    //ファイルネームを変数に格納
    $ary_data['up_file'] = "";
    $ary_data['up_ok'] = false;
    $ary_data['tmp_file'] = isset($_FILES["up"]["tmp_name"]) ? $_FILES["up"]["tmp_name"] : "";
    $ary_data['org_file'] = isset($_FILES["up"]["name"])     ? $_FILES["up"]["name"]     : "";

    //ファイルが正しくアップロードされたものかチェック
    if( $ary_data['tmp_file'] != "" && is_uploaded_file($ary_data['tmp_file'])) {
      $split = explode('.', $ary_data['org_file']);
      //拡張子を分解
      $ext = end($split);
      //拡張子が空でない 且つ 元ファイル名が拡張子名でない
      if( $ext != "" && $ext != $ary_data['org_file']) {
        //ファイルパスの生成（同名による保存回避のため乱数を付与）もしかしたらあとでハッシュ化するかも
        $ary_data['up_file'] = ROOT_PATH."public/img/". date("Ymd_His.") . mt_rand(1000,9999) . ".$ext";
        $ary_data['up_ok'] = move_uploaded_file( $ary_data['tmp_file'], $ary_data['up_file']);
      }else{
        //エラー処理を追加予定
        echo "error";
      }
    }else{
      echo 'アップロードによるもの以外のファイルが送信されました';
      exit;
    }
    return $ary_data;
  }

  public function img_validate(){
        /* 必須項目チェック */
    if( !empty($_POST['name'])
        && !empty($_POST['body'])
        ){

      /* 拡張子情報の取得・セット */
      $imginfo = getimagesize($_FILES['file1']['tmp_name']);
      if($imginfo['mime'] == 'image/jpeg'){ $extension = ".jpg"; }
      if($imginfo['mime'] == 'image/png'){ $extension = ".png"; }
      if($imginfo['mime'] == 'image/gif'){ $extension = ".gif"; }

      /* 拡張子存在チェック */
      if(!empty($extension)){

        /* 画像登録処理 */
        $file_tmp = $_FILES['file1']['tmp_name'];
        $file_name = "sample" . $extension; // アップロード時のファイル名を設定
        $file_save = "./images/" . $file_name; // アップロード対象のディレクトリを指定
        move_uploaded_file($file_tmp, $file_save); // アップロード処理
        echo "success"; // jquery側にレスポンス
      } else {
        echo "fail"; // jquery側にレスポンス
      }
    }
  }
}
?>
