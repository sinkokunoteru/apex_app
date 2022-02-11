<?php
require_once(ROOT_PATH."/Controllers/origin_form_controller.php");
$res = new origin_form_controller();
$status = $res->get_apex_info();
$rank = $status['profile']["data"]["segments"][0]["stats"]["rankScore"]["value"];
$filename = $res->get_mostkiller($status['profile']);
$point = $res->calc_rankpoint($rank);
$rank_path = $res->get_rank($point);

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
              echo $status['profile']["data"]["platformInfo"]["platformUserId"];
              echo "<br>";
              echo "<img src =".$filename['fileroot'].">";
              echo "<br>";
              echo  $rank;
              echo "<img src =".$rank_path.">";
              echo "<br>";
              // echo "aaaaaaaaaaaaa";
              // echo "<pre>";
              // var_dump ($status['profile']);

            ?>
        </div>
    </body>
</html>
