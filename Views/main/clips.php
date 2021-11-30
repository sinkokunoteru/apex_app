<?php
require_once(ROOT_PATH.'Controllers/apex_users_controller.php');
$con = new apex_users_controller();
$clips = $con->Get_all_clips();

?>
<!doctype html>
<html>
<head>
<meta charset="shift_jis">
<title>テスト</title>
<style type="text/css">
article
{
	width: 600px;
	margin-top: 100px;
	margin-right: auto;
	margin-left: auto;
	border: 1px solid #CCC;
	text-align: center;
	padding: 30px;
	border-radius: 6px;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;

}
div
{
	text-align: center;
}

</style>
</head>

<body>
	<a href="clips_form.php">動画を投稿</a>
<article>
<?php foreach($clips as $youtube):  ?>
	<div><?php echo $youtube['video_name']; ?></div>
<?php endforeach; ?>
</article>
</body>
</html>
