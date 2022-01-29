<?php
require_once(ROOT_PATH.'Controllers/clips_controller.php');
$clips = new clips_controller();
$clips->clips_main();
$ary_datas= $clips->return_clips_confirm_data();
?>

<!doctype html>
<html>
<head>
	<meta charset="shift_jis">
	<title>apex_clips_confirm</title>
	<link rel="stylesheet" href="../css/clips.css">
</head>
<body>
	<header>
		<?php   include(ROOT_PATH.'Views/design/header.php'); ?>
	</header>
	<article>
		<form action="clips_form_complete.php" method="post">
			<p>この内容で投稿してよろし？</p><br>
			<!-- URLと動画を出力 -->
			<p><?php echo $_POST['post_url']?></p><br>
			<div><?php echo $ary_datas['display_url'];?></div>
			<!-- URLと動画ここまで -->
			<!-- コメントの出力 -->
			<?php
			if($ary_datas["post_comment"] != null) {
				echo '<p>一言コメント</p><br>';
				echo '<p>'.$ary_datas["post_comment"].'</p><br>';
			}else if($ary_datas["post_comment"] == null) {
				echo '<p>コメントは空です</p>';
			}
			?>
			<!-- コメント出力ここまで -->
			<input name="" type="submit">
		</form>
	</article>
</body>
</html>
