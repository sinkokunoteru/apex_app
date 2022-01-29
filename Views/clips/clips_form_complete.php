<?php
require_once(ROOT_PATH.'Controllers/apex_users_controller.php');
require_once(ROOT_PATH.'Controllers/clips_controller.php');
$clips = new clips_controller();
$database = new apex_users_controller();

//データベースに登録するデータのみセッションから取得
$clip_data = $clips->get_clips_regist_data();
//データベースにクリップを登録
$database->Clips_post($clip_data);

?>
<body>
 <header>
	 <?php   include(ROOT_PATH.'Views/design/header.php'); ?>
 </header>
 <h1>投稿が完了しました。</h1>
<a href="clips.php">投稿一覧へ戻る</a>
</body>
