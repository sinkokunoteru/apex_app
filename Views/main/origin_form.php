<?php
require_once(ROOT_PATH."/Controllers/origin_form_controller.php");
$res = new origin_form_controller();
$status = $res->get_apex_info();
$rank = $status['profile']["data"]["segments"][0]["stats"]["rankScore"]["value"];
$filename = $res->get_mostkiller($status['profile']);

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
<<<<<<< HEAD
                echo $profile["data"]["metadata"]["activeLegendName"];
                echo "<img src =".$filename.">";
                echo "<br>";
                echo $profile["data"]["platformInfo"]["platformUserId"];
=======
                echo $filename['name'];
                // echo $status['profile']["data"]["metadata"]["activeLegendName"];
                echo "<img src =".$filename['fileroot'].">";
                echo "<br>";
                echo $status['profile']["data"]["platformInfo"]["platformUserId"];
>>>>>>> f-20220127_kawachi
                echo "<br>";
                echo  $rank;
                echo "<pre>";
                var_dump ($status['profile']);
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
