<?php
class clips_controller {

  public function clips_main() {
    $this->get_post_url();
    $this->get_post_comment();
    $this->html_entities();
    $this->generate_view_url();
    $this->post_into_session();
  }

  //確認画面用のデータを配列で返す
  public function return_clips_confirm_data(){
    $this->get_youtube_url();
    $this->get_form_url();
    $this->get_form_comment();
    $data['display_url'] = $this->display_youtube_url;
    $data['post_url'] = $this->display_youtube_url;
    $data['post_comment'] = $this->comment;

    return $data;
  }
  //POSTされたURLを取得
  public function get_post_url() {
    if(isset($_POST['post_url'])){ //urlチェック実装予定
      $this->post_url = $_POST['post_url'];
    }else{
      exit("URLを入力してください".'<a href="clips_form.php">戻る</a>');
    }
  }

  //POSTされたコメントを取得
  public function get_post_comment() {
    if(isset($_POST['comment'])){
      $this->comment = $_POST['comment'];
    }
  }

  //HTMLコードをエンティティ
  public function html_entities() {
    $this->entities_data = htmlspecialchars($this->post_url, ENT_QUOTES);
  }

  public function generate_view_url() {
    $youtube_url = $this->post_url;
    if (strpos($youtube_url, "iframe") != true) {
      if (strpos($youtube_url, "watch") != false)	{
        /** コード変換 */
        $youtube_url = substr($youtube_url, (strpos($youtube_url, "=")+1));
      }else{
        /** 短縮URL用に変換 */
        $youtube_url = substr($youtube_url, (strpos($youtube_url, "youtu.be/")+9));
      }
      /** youtube 表示状態に変換 */
      $youtube = "<iframe width=\"100%\" height=\"400\" src=\"https://www.youtube.com/embed/${youtube_url}\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";
    }
    $this->display_youtube_url = $youtube;
  }

  //表示用youtubeURL返却
  public function get_youtube_url() {
    return $this->display_youtube_url;
  }

  //入力されたURLを出力
  public function get_form_url() {
    return $this->post_url;
  }

  //入力されたコメントを出力
  public function get_form_comment(){
    if(isset($this->comment)){
      return $this->comment;
    }else{
      return null;
    }
  }

  //セッションにデータを登録
  public function post_into_session(){
    session_start();
    $data = $this->return_clips_confirm_data();
    $_SESSION['display_url'] = $data['display_url'];
    $_SESSION['post_comment'] = $data['post_comment'];
  }

  //セッションに入っているデータ・ベースに登録する値を返す
  public function get_clips_regist_data(){
    session_start();
    $clips_regist_data['user_id'] = $_SESSION['user_id'];
    $clips_regist_data['display_data'] = $_SESSION['display_url'];
    $clips_regist_data['post_comment'] = $_SESSION['post_comment'];
    return $clips_regist_data;
  }

}

?>
