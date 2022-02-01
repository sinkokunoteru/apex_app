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

}
?>
