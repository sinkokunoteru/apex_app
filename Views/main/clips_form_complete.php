<?php
$youtube = $data = null;
if (isset($_POST['url']) == true)
{
	/** 入力内容を取得 */
	$data = $youtube_url = $youtube = $_POST['url'];

	/** ＨＴＭＬコードをエンティ */
	$data = htmlspecialchars($data, ENT_QUOTES);

	if (strpos($youtube_url, "iframe") != true)	/* フレームでない ? */
	{
		if (strpos($youtube_url, "watch") != false)	/* ページURL ? */
		{
			/** コード変換 */
			$youtube_url = substr($youtube_url, (strpos($youtube_url, "=")+1));
		}
		else
		{
			/** 短縮URL用に変換 */
			$youtube_url = substr($youtube_url, (strpos($youtube_url, "youtu.be/")+9));
		}

		/** youtube 表示状態に変換 */
		$youtube = "<iframe width=\"100%\" height=\"400\" src=\"https://www.youtube.com/embed/${youtube_url}\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";
    $_POST['url'] = $youtube;  
	}

}
session_start();
  require_once(ROOT_PATH.'Controllers/apex_users_controller.php');
  $_POST['user_id'] = $_SESSION['user_id'];
  var_dump($_POST);
  $clips = new apex_users_controller();
  $users = $clips ->Clips_post();
 ?>
 <h1>投稿が完了しました。</h1>
<a href="clips.php">投稿一覧へ戻る</a>
