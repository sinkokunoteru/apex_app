<?php
//ヘッダー
$header = array(
    "TRN-Api-Key:cc9907f4-0c7e-463e-9c8c-88a24b7ff42b"
);

if(isset($_POST["userid"])){
    //userid取得
    $userid = rawurlencode($_POST['userid']);
    //platform取得
    $platform = $_POST['platform'];
    //url
    $url = "https://public-api.tracker.gg/v2/apex/standard/profile/";
    $url .= $_POST['platform'].'/'.$_POST['userid'];

    //user情報取得
    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

    $response = curl_exec($ch);
    $profile = json_decode($response, true);
    $filename = "../img/オクタン.jpg";
    curl_close($ch);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>apexstats検索</title>
    </head>
    <body>
        <form action="" method="POST">
            <p>useridを入力してください</p>
            <input type="text" name="userid" placeholder="例:RuRey 0w0">
            <select name="platform">
                <option value=""></option>
                <option value="origin">PC</option>
                <option value="xbl">xbox</option>
                <option value="psn">PS4</option>
            </select>
            <input type="submit" value="送信">
        </form>
        <div>
            <?php
                echo $profile["data"]["metadata"]["activeLegendName"];
                echo "<img src =".$filename.">";
                echo "<br>";
                echo $profile["data"]["platformInfo"]["platformUserId"];
                echo "<br>";
                echo  $profile["data"]["segments"][0]["stats"]["rankScore"]["value"];
                echo "<pre>";
                var_dump ($profile);
                //出力
                // echo "name:";
                // echo $profile["data"]["platformInfo"]["platformUserId"];
                // echo "<br>";
                // echo "platform:";
                // echo $profile["data"]["platformInfo"]["platformSlug"];
                // echo "<br>";
                // echo "country:";
                // echo  $profile["data"]["userInfo"]["countryCode"];
                // echo "<br>";
                // echo "level:";
                // echo  $profile["data"]["segments"][0]["stats"]["level"]["displayValue"];
                // echo "<br>";
                // echo "rank:";
                // echo  $profile["data"]["segments"][0]["stats"]["rankScore"]["value"];
                // echo "<br>";
            ?>
        </div>
    </body>
</html>
