<?php

namespace APP\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

class ListupHelper extends Helper {
  public $helpers = ['Html', 'Url'];
  // private $viewer = "";

  private $prefNumber = array(
    'Hokkaido'=>'0', 'Aomori-ken'=>'1', 'Iwate'=>'2', 'Miyagi-ken'=>'3','Akita-ken'=>'4',
    'Yamagata-ken'=>'5',  'Fukushima-ken'=>'6', 'Ibaraki'=>'7', 'Tochigi-ken'=>'8', 
    'Gunma-ken'=>'9', 'Saitama-ken'=>'10',  'Chiba-ken'=>'11', 'Tokyo'=>'12',
    'Kanagawa'=>'13', 'Niigata-ken'=>'14', 'Toyama-ken'=>'15', 'Ishikawa-ken'=>'16',
    'Fukui-ken'=>'17', 'Yamanashi-ken'=>'18', 'Nagano-ken'=>'19', 'Gifu-ken'=>'20',
    'Shizuoka-ken'=>'21', 'Aichi-ken'=>'22', 'Mie-ken'=>'23', 'Shiga-ken'=>'24', 'KyotoXPrefecture,JP'=>'25', 
    'Osaka-fu'=>'26', 'Hyogo'=>'27', 'Nara-ken'=>'28', 'Wakayama-ken'=>'29', 'Tottori-ken'=>'30',
    'Shimane-ken' =>'31', 'Okayama-ken'=>'32', 'Hiroshima-ken'=>'33', 'Yamaguchi-ken'=>'34',
    'Tokushima-ken'=>'35', 'Kagawa-ken'=>'36', 'Ehime-ken'=>'37', 'KochiXPrefecture'=>'38',
    'FukuokaXPrefecture'=>'39', 'Saga-ken'=>'40', 'NagasakiXPrefecture'=>'41', 'Kumamoto-ken'=>'42',
    'OitaXPrefecture'=>'43', 'Miyazaki-ken'=>'44', 'Kagoshima-ken'=>'45', 'Okinawa-ken'=>'46');
      
  //------------- weather main page --------------
  // main page 
  public function getWeahterNews($data, $pref, $local, $pref_city) {
    $newsData = $data;

    $viewer = "";     // return data
    $printDate = [];  // 表示する日付
    

    // title -- 地名
    $areaname = $this->changeName($pref, $local, $pref_city);

    // 現在の天気情報
    $nowWeatherIcon = $this->changePicture($newsData['oneday']['weather'][0]['id']);
    $nowWeahterTemp = $this->tempformat($newsData['oneday']['main']['temp']);

    // 基準時間の設定(現在の時刻)
    $nowDate = date('Y-m-d');
    array_push($printDate, $nowDate);

   
    $viewer .= '<p class = "category" id = "weather"><span>天気予報</span></p>' . "\n" .
                           '<div class="col-sm-6">' . "\n" .
                           ' <p class="text-center">'. $this->formatdate($nowDate) . $areaname . 'の天気</p>' . "\n" .
                           ' <p class="text-center" >' . $this->Html->image($nowWeatherIcon, ['class' => 'nowWeather']) . '</p>' . "\n" .
                           ' <p class="text-center">' . $nowWeahterTemp . ' ℃</p>' . "\n" .
                           '</div>' . "\n" .
                           '<div class="col-sm-6">' . "\n" .
                           ' <table class="table">' . "\n" .
                           '  <tbody class="table table-striped">' . "\n";


          for ($i=0; $i < 4; $i++) {
            $viewer .= '   <tr>
                            <td class="align-middle">' . $this->formatTime($newsData['fivedays']['list'][$i]['dt_txt']) . '</td>
                            <td>' . $this->Html->image($this->changePicture($newsData['fivedays']['list'][$i]['weather'][0]['id']), ['class' => 'mainpageWeathericon']) .'</td>
                            <td class="align-middle">' . $this->tempformat($newsData['fivedays']['list'][$i]['main']['temp']) . '℃</td>
                          </tr>' . "\n";
          }

          $viewer .= '  </tbody>' . "\n".
                           ' </table>' . "\n".
                           '</div>';
          $link = $this->Html->link('もっと見る', ['controller' => 'News-users', 'action' => 'weatherDetail', $pref, $local]);
          $viewer .= '<p>' . $link . '</p>' . "\n";
  
    return $viewer;
  }
// -------- Weather main pgae 終わり ---------------

//---------weatherDetail function------------------
// WeatherDetail page
  public function weatherDetail($data) {
    $weatherData = $data;     // データの日時を日本時間に修正
    // var_dump($weatherData);
    // date_default_timezone_set('Asia/Tokyo');    // timezoneの設定
    $viewdata = "";   // returnするデータ
    $printDate = [];
    $printWeather = [];
    $printTemp = [];
    $timecheck = [];
    $timeArray = ["03:00:00", "06:00:00", "09:00:00", "12:00:00", "15:00:00", "18:00:00", "21:00:00", "00:00:00"];
   
    //-- 現在の情報をセット --
    $icon = $this->changePicture($weatherData['oneday']['weather'][0]['id']);
    $setIcon = $this->Html->image($icon, ['class'=>'weatherpageIcons']);
    array_push($printWeather,  $setIcon);
    array_push($printTemp, $this->tempformat($weatherData['oneday']['main']['temp']));
    array_push($timecheck, "現在");
    
    //-- 日付表示 -- 
    $nowDate = date('Y-m-d');
    $baseDate = new \DateTime(substr($weatherData['fivedays']['list'][0]['dt_txt'], 0, 10));
    array_push($printDate, $this->formatdate($nowDate));
    if ($nowDate !== $baseDate->format('Y-m-d')) {
      array_push($printDate, $this->formatdate($baseDate->format('Y-m-d')));
    }
    for ($i=1; $i<3; $i++) {
      array_push($printDate, $this->formatdate($baseDate->modify("+1 days")->format('Y-m-d')));
    }
       
    //-- timeArrayの時刻とweatherDataの時刻を比較し、weatherData最初の時間までの各項目を "-"とする --
    for ($i=0; $i < 8; $i++) {
      if ($timeArray[$i] !== substr($weatherData['fivedays']['list'][0]['dt_txt'], 11)) {
        array_push($timecheck, "-");
        array_push($printWeather, "-");
        array_push($printTemp, "-");
      } else {
        break;
      }
    }

    //-- 各データの配列に表示データを入れていく --
    for ($i=0; $i < 24; $i++) {
      // 時間
      array_push($timecheck, $this->formatTime($weatherData['fivedays']['list'][$i]['dt_txt']));
      // 天気のアイコン
      $icon = $this->changePicture($weatherData['fivedays']['list'][$i]['weather'][0]['id']);
      $setIcon = $this->Html->image($icon,['class'=>'weatherpageIcons']);
      array_push($printWeather, $setIcon);
      // 気温
      array_push($printTemp, $this->tempformat($weatherData['fivedays']['list'][$i]['main']['temp']));
    }

    //--html表示--
    $k = 0;
    for ($i=0; $i < 17; $i += 8) {

      $viewdata .= "<p>" . $printDate[$k] . "</p> \n";
      $viewdata .= "<div class='table-responsive'>
                    <table class='table'> \n
                      <tbody class='table table-striped'> \n
                        <thead> \n
                          <tr>
                            <th class='text-center'>" . $timecheck[$i] . "</th>
                            <th class='text-center'>" . $timecheck[$i + 1] . "</th>
                            <th class='text-center'>" . $timecheck[$i + 2] . "</th>
                            <th class='text-center'>" . $timecheck[$i + 3] . "</th>
                            <th class='text-center'>" . $timecheck[$i + 4] . "</th>
                            <th class='text-center'>" . $timecheck[$i + 5] . "</th>
                            <th class='text-center'>" . $timecheck[$i + 6] . "</th>
                            <th class='text-center'>" . $timecheck[$i + 7] . "</th>

                          </tr> \n
                        </thead> \n

                        <tr>
                          <td class='text-center'>" . $printWeather[$i] . "</td>
                          <td class='text-center'>" . $printWeather[$i + 1] . "</td>
                          <td class='text-center'>" . $printWeather[$i + 2] . "</td>
                          <td class='text-center'>" . $printWeather[$i + 3] . "</td>
                          <td class='text-center'>" . $printWeather[$i + 4] . "</td>
                          <td class='text-center'>" . $printWeather[$i + 5] . "</td>
                          <td class='text-center'>" . $printWeather[$i + 6] . "</td>
                          <td class='text-center'>" . $printWeather[$i + 7] . "</td>

                        </tr> \n
                        <tr>
                          <td class='text-center'>" . $printTemp[$i] . "</td>
                          <td class='text-center'>" . $printTemp[$i + 1] . "</td>
                          <td class='text-center'>" . $printTemp[$i + 2] . "</td>
                          <td class='text-center'>" . $printTemp[$i + 3] . "</td>
                          <td class='text-center'>" . $printTemp[$i + 4] . "</td>
                          <td class='text-center'>" . $printTemp[$i + 5] . "</td>
                          <td class='text-center'>" . $printTemp[$i + 6] . "</td>
                          <td class='text-center'>" . $printTemp[$i + 7] . "</td>

                        </tr> \n
                      </tbody> \n
                    </table> \n
                    </div>";
      $k += 1;


    }

    return $viewdata;

  }
  // ------ 終わり weatherdetail -----------------


  // id→picture 変換
  public function changePicture($id) {
    $check = intval($id);
    switch ($check) {
      // thunder
      case $check >= 200 && $check <= 232:
        return "thunderstorm.png";
        break;

      // drizzle
      case $check >= 300 && $check <= 321:
        return "drizzle.png";
        break;

      // rain
      case 500:
        return "lightrain.png";
        break;

      case $check == 501 || $check == 511 || $check == 520 || $check == 531:
        return "rain-clouds.png";
        break;

      case $check == 502 || $check == 521:
        return "rain.png";
        break;

      case $check == 503 || $check == 504 || $check == 522 || $check == 771:
        return "heavyrain.png";
        break;

      // snow
      case $check == 600 || $check == 620:
       return "snow-clouds.png";
       break;

      case $check == 601 || $check == 602 || $check == 621 || $check == 622:
        return "snow.png";
        break;

      case $check >= 611 && $check <= 616;
        return "rain-snow.png";
        break;

      // mist
      case $check >= 701 && $check <= 781;
        return "mist.png";
        break;

      // clear
      case 800:
        return "sunny.png";
        break;

      // clouds
      case 801:
        return "sunny-clouds.png";
        break;

      case 802:
      case 803:
        return "clouds.png";
        break;

      case 804:
        return "brokenclouds.png";
        break;

      default:
        return "non";
        break;
    }
  }

  // temp format
  public function tempformat($data) {
    $val = (float)$data;
    $temp = round($val, 1);
    return $temp;
  }

  // 日付表示
  public function formatdate($date) {
    $month = (int)substr($date, 5, 2);
    $day = (int)substr($date, 8, 2);
    $returnData = "$month / $day";
    return $returnData;
  }

  // 時間表示
  public function formatTime($date) {
    $time = (int)substr($date, 11, 2);
    $returnData = $time . " 時";
    return $returnData;
  }

  // 都道府県名表示 -- title
  public function changeName($pref, $local, $data) {
    $returnData = "";
    if ($local == "") {
      $returnData = $data[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['pref'];
    } else {
      $counter = count($data[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['city']);
      for ($i=0; $i<$counter; $i++) {
        if ($local == $data[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['city'][$i]['en_city']) {
          $returnData = $data[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['city'][$i]['name'];
          break;
        }
      }
    }
    return $returnData;
  }
  
  // 都道府県ー市町村 表示
  public function prefCityList($pref, $jdata) {
    $returnData = "";
    $counter = count($jdata[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['city']);
    for ($i=0; $i<$counter; $i++) {
      $returnData .= "<tr><td>" . $this->Html->link($jdata[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['city'][$i]['name'], 
      ['controller' => 'News-users', 'action' => 'weatherDetail', $jdata[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['en_pref'],
      $jdata[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['city'][$i]['en_city']]) . "</td></tr>";
    }
    return $returnData;
  }

  // 都道府県選択　- 画像表示
  public function prefCityPicture($pref) {
    $returnData = $this->Html->image("$pref.png",['id' => 'prefmap', 'alt' => 'prefmap',
  'usemap' => '#example2', 'width' => '600', 'height' => '400']);
    return $returnData;
  }

  // 都道府県選択-画像リンク $modPref 一部$prefの修正後の値（jquery対応のため）
  public function prefCityPictureLink($modPref, $pref, $jdata) {
    // 元画像の表示
    $returnData = $this->Html->image("$modPref.png",['id' => 'prefmap', 'alt' => 'prefmap',
    'usemap' => '#example2', 'width' => '600', 'height' => '400']);
    $returnData .= "<map name='example2'>";

    // リンクの表示
    $counter = count($jdata[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['city']);

    for ($i=0; $i<$counter; $i++) {
      $returnData .= "<area shape='rect' coords=" . $jdata[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['city'][$i]['coords'] .
      " href=" . $this->Url->build(["controller" => "News-users", "action" => "weatherDetail", $pref, 
      $jdata[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['city'][$i]['en_city']]) . ">";
    }
    return $returnData;
  }

  // -------------   personalpage   --------------
  // 都道府県 日本語表示
  public function prefName($pref, $jdata) {
    $returnData = $jdata[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['pref'];
    // var_dump($returnData);
    return $returnData;
  }

  // 市町村名 日本語表示
  public function cityName($pref, $local, $jdata) {
    $returnData = "";
    $counter = count($jdata[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['city']);
      for ($i=0; $i<$counter; $i++) {
        if ($local == $jdata[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['city'][$i]['en_city']) {
          $returnData = $jdata[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['city'][$i]['name'];
          break;
        }
      }
    return $returnData;
  }
}

?>
