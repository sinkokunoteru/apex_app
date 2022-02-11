<?php
// require_once(ROOT_PATH."/Views/main/origin_form.php");

class origin_form_controller{
  // private $headr = "TRN-Api-Key:cc9907f4-0c7e-463e-9c8c-88a24b7ff42b";
  // private $url = "https://public-api.tracker.gg/v2/apex/standard/profile/";


  public function get_apex_info(){

    $header = array("TRN-Api-Key:cc9907f4-0c7e-463e-9c8c-88a24b7ff42b");
    $url = "https://public-api.tracker.gg/v2/apex/standard/profile/";

    if(isset($_POST["userid"])){
        //userid取得
        $userid = rawurlencode($_POST['userid']);
        //platform取得
        $platform = $_POST['platform'];
        //url
        // $url = "https://public-api.tracker.gg/v2/apex/standard/profile/";
        $url .= $_POST['platform'].'/'.$_POST['userid'];

        //user情報取得
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $status['response'] = curl_exec($ch);
        $status['profile'] = json_decode($status['response'], true);
        curl_close($ch);

        return $status;
    }
  }

  public function get_agent_status($str){
    $legends = array("Wraith"=>"../img/character/レイス.jpg","Bangalore"=>"../img/character/バンガロール.jpg","Caustic"=>"../img/character/コースティック.jpg",
                      "Mirage"=>"../img/character/ミラージュ.jpg","Bloodhound"=>"../img/character/ブラッドハウンド.jpg","Gibraltar"=>"../img/character/ジブラルタル.jpg",
                      "Lifeline"=>"../img/character/ライフライン.jpg","Pathfinder"=>"../img/character/パスファインダー.jpg","Octane"=>"../img/character/オクタン.jpg",
                      "Wattson"=>"../img/character/ワットソン.jpg","Crypto"=>"../img/character/クリプト.jpg","Revenant"=>"../img/character/レヴナント.jpg",
                      "Loba"=>"../img/character/ローバ.jpg","Rampart"=>"../img/character/ランパート.jpg","Horizon"=>"../img/character/ホライゾン.jpg",
                      "Fuse"=>"../img/character/.jpg","Valkyrie"=>"../img/character/ヴァルキリー.jpg","Seer"=>"../img/character/シーア.jpg","Ash"=>"../img/character/アッシュ.jpg"
                     );
    return $legends["$str"];
  }

  public function get_mostkiller($array){
    $max = 0;
    unset($array["data"]["segments"][0]);
    foreach($array["data"]["segments"] as $str){
      if(isset($str["stats"]["kills"]["value"])){
        if($max < $str["stats"]["kills"]["value"]){
          $max = $str["stats"]["kills"]["value"];
          $legendsname = $str["metadata"]["name"];
        }
      }
    }
    $mostkiller['fileroot'] = $this->get_agent_status($legendsname);
    $mostkiller['name'] = $legendsname;
    return $mostkiller;
  }

  public function get_rank($str){
    $rank = array("bronze1"=>"../img/ranklogs/bronze1.png","bronze2"=>"../img/ranklogs/bronze2.png","bronze3"=>"../img/ranklogs/bronze3.png",
                  "bronze4"=>"../img/ranklogs/bronze4.png","silver1"=>"../img/ranklogs/silver1.png","silver2"=>"../img/ranklogs/silver2.png",
                  "silver3"=>"../img/ranklogs/silver3.png","silver4"=>"../img/ranklogs/silver4.png","gold1"=>"../img/ranklogs/gold1.png",
                  "gold2"=>"../img/ranklogs/gold2.png","gold3"=>"../img/ranklogs/gold3.png","gold4"=>"../img/ranklogs/gold4.png",
                  "pratium1"=>"../img/ranklogs/pratium1.png","pratium2"=>"../img/ranklogs/pratium2.png","pratium3"=>"../img/ranklogs/pratium3.png",
                  "pratium3"=>"../img/ranklogs/pratium3.png","pratium4"=>"../img/ranklogs/pratium4.png","dyamond1"=>"../img/ranklogs/dyamond1.png",
                  "dyamond2"=>"../img/ranklogs/dyamond2.png","dyamond3"=>"../img/ranklogs/dyamond3.png","dyamond4"=>"../img/ranklogs/dyamond4.png",
                  "master"=>"../img/ranklogs/master.png","predetor"=>"../img/ranklogs/predetor.png");
    return $rank["$str"];
  }

  public function calc_rankpoint($point){

    $rank_str = array("b3"=>"bronze3","b2"=>"bronze2","b1"=>"bronze1",
                      "s4"=>"silver4","s3"=>"silver3","s2"=>"silver2","s1"=>"silver1",
                      "g4"=>"gold4","g3"=>"gold3","g2"=>"gold2","g1"=>"gold1",
                      "p4"=>"pratium4","p3"=>"pratium3","p2"=>"pratium2","p1"=>"pratium1",
                      "d4"=>"dyamond4","d3"=>"dyamond3","d2"=>"dyamond2","d1"=>"dyamond1","m"=>"master");
    $b3=300;$b2=600;$b1=900;
    $s4=1200;$s3=1600;$s2=2000;$s1=2400;
    $g4=2800;$g3=3300;$g2=3800;$g1=4300;
    $p4=4800;$p3=5400;$p2=6000;$p1=6600;
    $d4=7200;$d3=7900;$d2=8600;$d1=9300;$m=10000;
    $rank_point = array($b3,$b2,$b1,$s4,$s3,$s2,$s1,$g4,$g3,$g2,$g1,$p4,$p3,$p2,$p1,$d4,$d3,$d2,$d1,$m);
    $rank_point_str = array("b3","b2","b1","s4","s3","s2","s1","g4","g3","g2","g1","p4","p3","p2","p1","d4","d3","d2","d1","m");
    $i = 0;
    foreach($rank_point as $str){
      if(isset($str)){
        if($point < $b3){
          $get_rank = "bronze4";
        }
        if($point>$str){
          $get_rank = $rank_str[$rank_point_str["$i"]];
          break;
        }
      }
      $i ++;
    }
    return $get_rank;
  }


}
?>
