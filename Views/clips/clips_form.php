
<?php
$youtube = $data = null;
if (isset($_REQUEST["text"]) == true)
{
	/** 入力内容を取得 */
	$data = $youtube_url = $youtube = $_REQUEST["text"];

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
	}

}
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
	padding-top: 40px;
}

</style>
</head>

<body>
<article>
<form action="clips_form_complete.php" method="post">
<p>共有するYoutube URLを入力してください。</p>
<input name="url" type="text" value="<?php echo $data; ?>" style="width:90%;">
<p>一言コメント</p>
<input name ="comment" type = "textarea" ><br><br>
<input name="" type="submit">
</form>

<div><?php echo $youtube; ?></div>

</article>
</body>
</html>
