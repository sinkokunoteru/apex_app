<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/clips.css">
	<title>apex_youtube_clips_form</title>
</head>

<body>
	<header>
		<?php   include(ROOT_PATH.'Views/design/header.php'); ?>
	</header>
	<article>
		<form action="clips_confirm.php" method="post">
			<p>Youtube URLを入力してください。（共有URLにも対応）</p>
			<input name="post_url" type="text" value="" placeholder=" URLを入力" style="width:90%;">
			<p>一言コメント</p>
			<input name ="comment" type = "textarea" value="" placeholder=" コメントを入力してください" row="10" style="width:90%;"><br>
			<input name="" type="submit">
		</form>
	</article>
</body>
</html>
