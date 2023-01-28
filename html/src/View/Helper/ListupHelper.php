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
      
  //------------- weatherNews --------------
  // main 
  public function getWeahterNews($data, $pref, $local, $pref_city) {
    $newsData = $this->timeshift($data);

    // for ($i=0; $i<40; $i++) {
    //   echo $newsData['fivedays']['list'][$i]['dt_txt'];
    // }

    $viewer = "";     // return data
    $printDate = [];  // 表示する日付
    $setTime = "";    // 天気リストの最初の時間を決める
    $timecheck = [];  // 表示する時間
    $printWeather = [];   // 表示する天気
    $printTemp = [];    // 表示する気温

    // title -- 地名
    $areaname = $this->changeName($pref, $local, $pref_city);

    // 天気情報
    $nowWeatherIcon = $this->changePicture($newsData['oneday']['weather'][0]['id']);
    $nowWeahterTemp = $this->tempformat($newsData['oneday']['main']['temp']);

    // 基準時間の設定(現在の時刻)
    date_default_timezone_set('Asia/Tokyo');    // timezoneの設定
    $nowDate = date('Y-m-d');
    array_push($printDate, $nowDate);

    // 最初に表示する時間を決める（テーブルで表示する天気）
    // もしforecastの最初のデータが次の日なら、当日の天気は空白にする
    for ($i=0; $i < 40; $i++) {
      if ($nowDate <= substr($newsData['fivedays']['list'][$i]['dt_txt'], 0, 10)) {
        $firstData = intval(substr($newsData['fivedays']['list'][$i]['dt_txt'], 11, 2));
        switch ($firstData) {
          case '0':
            $setTime = "03:00:00";
            break;
          case '3':
            $setTime = "06:00:00";
            break;
          case '6':
            $setTime = "09:00:00";
            break;
          case '9':
            $setTime = "12:00:00";
            break;
          case '12':
            $setTime = "15:00:00";
            break;
          case '15':
            $setTime = "18:00:00";
            break;
          case '18':
            $setTime = "21:00:00";
            break;
          default:
            $setTime = "00:00:00";
            $nowDate = date("Y-m-d", strtotime("+1 day"));   // nowDateを+1日する
            break;
        }
        break;
      }
    }

    // 時間の設定
    $baseDateTime = new \DateTime($nowDate . $setTime);
    $baseDate = $baseDateTime->format('Y-m-d H:i:s');
    array_push($printDate, $this->formatdate($baseDate));
    // print_r($baseDate);
    // print_r($nowDate);
    // $viewdata = "基準 - $baseDate \n";

    // 配列に書くデータを格納 - 繰り返しを16から40に変更
    for ($i=0; $i < 24; $i++) {

      if ($baseDate === $newsData['fivedays']['list'][$i]['dt_txt']) {
        $icon = $this->changePicture($newsData['fivedays']['list'][$i]['weather'][0]['id']);
        $setIcon = $this->Html->image($icon, ['class' => 'mainpageWeathericon']);
        $setTemp = $this->tempformat($newsData['fivedays']['list'][$i]['main']['temp']);
        array_push($printWeather, $setIcon);
        array_push($printTemp, $setTemp);
        $setTime = $this->formatTime($newsData['fivedays']['list'][$i]['dt_txt']);
        array_push($timecheck, $setTime);

        // $viewdata .= $baseDate . "\n";
        $baseDateTime->modify('+3 hours');
        $baseDate = $baseDateTime->format('Y-m-d H:i:s');

        //printdate save
        // if (substr($newsData['fivedays']['list'][$i]['dt_txt'], 11, 2) == '00') {
        //   array_push($printDate, $this->formatdate($newsData['fivedays']['list'][$i]['dt_txt']));
        // }
      }

    }
   
    // var_dump($timecheck);

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
            $viewer .= '   <tr><td class="align-middle">' . $timecheck[$i] . '</td><td>' . $printWeather[$i] .
            '</td><td class="align-middle">' . $printTemp[$i] . '℃</td></tr>' . "\n";
          }

          $viewer .= '  </tbody>' . "\n".
                           ' </table>' . "\n".
                           '</div>';
          $link = $this->Html->link('もっと見る', ['controller' => 'News-users', 'action' => 'weatherDetail', $pref, $local]);
          $viewer .= '<p>' . $link . '</p>' . "\n";
  
    return $viewer;
  }


  // Main page
  // Weather listup function
  public function listup($col, $data, $pref) {
    
    $column = $col;
    $newsData = $data;
    $prefecture = $pref;
    $cnt = 0;

    // $dataに天気予報が含まれる場合の処理
    if (strpos($column, '1') !== false) {
      // $newsData = $this->timeshift($data);
      $printDate = [];  // 表示する日付
      $setTime = "";    // 天気リストの最初の時間を決める
      $timecheck = [];  // 表示する時間
      $printWeather = [];   // 表示する天気
      $printTemp = [];    // 表示する気温

      // 天気情報
      $nowWeatherIcon = $this->changePicture($newsData['oneday']['weather'][0]['id']);
      $nowWeahterTemp = $this->tempformat($newsData['oneday']['main']['temp']);

      // 基準時間の設定(現在の時刻)
      $nowDate = date('Y-m-d');
      array_push($printDate, $nowDate);

      // 最初に表示する時間を決める（テーブルで表示する天気）
      // もしforecastの最初のデータが次の日なら、当日の天気は空白にする
      for ($i=0; $i < 40; $i++) {
        if ($nowDate <= substr($newsData['fivedays']['list'][$i]['dt_txt'], 0, 10)) {
          $firstData = intval(substr($newsData['fivedays']['list'][$i]['dt_txt'], 11, 2));
          switch ($firstData) {
            case '0':
              $setTime = "03:00:00";
              break;
            case '3':
              $setTime = "06:00:00";
              break;
            case '6':
              $setTime = "09:00:00";
              break;
            case '9':
              $setTime = "12:00:00";
              break;
            case '12':
              $setTime = "15:00:00";
              break;
            case '15':
              $setTime = "18:00:00";
              break;
            case '18':
              $setTime = "21:00:00";
              break;
            default:
              $setTime = "00:00:00";
              $nowDate = date("Y-m-d", strtotime("+1 day"));   // nowDateを+1日する
              break;
          }
          break;
        }
      }

      // 時間の設定
      $baseDateTime = new \DateTime($nowDate . $setTime);
      $baseDate = $baseDateTime->format('Y-m-d H:i:s');
      array_push($printDate, $this->formatdate($baseDate));

      // $viewdata = "基準 - $baseDate \n";

      // 配列に書くデータを格納
      for ($i=0; $i < 16; $i++) {

        if ($baseDate === $newsData['fivedays']['list'][$i]['dt_txt']) {
          $icon = $this->changePicture($newsData['fivedays']['list'][$i]['weather'][0]['id']);
          $setIcon = $this->Html->image($icon, ['class' => 'mainpageWeathericon']);
          $setTemp = $this->tempformat($newsData['fivedays']['list'][$i]['main']['temp']);
          array_push($printWeather, $setIcon);
          array_push($printTemp, $setTemp);
          $setTime = $this->formatTime($newsData['fivedays']['list'][$i]['dt_txt']);
          array_push($timecheck, $setTime);

          // $viewdata .= $baseDate . "\n";
          $baseDateTime->modify('+3 hours');
          $baseDate = $baseDateTime->format('Y-m-d H:i:s');

          //printdate save
          // if (substr($newsData['fivedays']['list'][$i]['dt_txt'], 11, 2) == '00') {
          //   array_push($printDate, $this->formatdate($newsData['fivedays']['list'][$i]['dt_txt']));
          // }
        }

      }


    }

    // print_r($column);
    // print_r(mb_strlen($column, "UTF-8"));
    // print_r(mb_strlen('2345', "UTF-8"));

    // columnの値に対応したニュースの表示
    for ($i=0; $i < mb_strlen($column, 'UTF-8'); $i++) { 
      switch ($column[$i]) {
        case '1':   // 1 - 天気 ブルー　#00a8ff
          $this->viewer .= '<p class = "category" id = "weather"><span>天気予報</span></p>' . "\n" .
                           '<div class="col-sm-6">' . "\n" .
                           ' <p class="text-center">'. $this->formatdate($nowDate) . ' 現在の天気</p>' . "\n" .
                           ' <p class="text-center" >' . $this->Html->image($nowWeatherIcon, ['class' => 'nowWeather']) . '</p>' . "\n" .
                           ' <p class="text-center">' . $nowWeahterTemp . ' ℃</p>' . "\n" .
                           '</div>' . "\n" .
                           '<div class="col-sm-6">' . "\n" .
                           ' <table class="table">' . "\n" .
                           '  <tbody class="table table-striped">' . "\n";


          for ($i=0; $i < 4; $i++) {
            $this->viewer .= '   <tr><td class="align-middle">' . $timecheck[$i] . '</td><td>' . $printWeather[$i] .
            '</td><td class="align-middle">' . $printTemp[$i] . '℃</td></tr>' . "\n";
          }

          $this->viewer .= '  </tbody>' . "\n".
                           ' </table>' . "\n".
                           '</div>';
          $link = $this->Html->link('もっと見る', ['controller' => 'News', 'action' => 'weatherDetail', $prefecture]);
          $this->viewer .= '<p>' . $link . '</p>' . "\n";

          break;
        case '2': // 2 - ビジネス パープル　#9c88ff
          $this->viewer .= '<p class = "category" id = "business"><span>ビジネス</span></p>'  . "\n";

          for ($j=0; $j < 5; $j++) {
            $this->viewer .= '<p><a href=' . $newsData['business']['articles'][$j]['url'] . '>'
            . $newsData['business']['articles'][$j]['title'] . '</a></p>' . "\n";
          }

          $link = $this->Html->link('もっと見る', ['controller' => 'News', 'action' => 'newslist', 'business' ]);
          $this->viewer .= '<p>' . $link . '</p>' . "\n";

          break;

        case '3': // 3 - エンターテイメント イエロー #fbc531
          $this->viewer .= "\n" . '<p class = "category" id = "entertainment"><span>エンタメ</span></p>'  . "\n";

          for ($j=0; $j < 5; $j++) {
            $this->viewer .= '<p><a href=' . $newsData['entertainment']['articles'][$j]['url'] . '>'
            . $newsData['entertainment']['articles'][$j]['title'] . '</a></p>' . "\n";
          }


          $link = $this->Html->link('もっと見る', ['controller' => 'News', 'action' => 'newslist', 'entertainment' ]);
          $this->viewer .= '<p>' . $link . '</p>' . "\n";

          break;

        case '4': // 4 - 全般 グリーン #4cd137
          $this->viewer .= "\n" . '<p class = "category" id = "general"><span>全　般</sapn></p>'  . "\n";

          for ($j=0; $j < 5; $j++) {
            $this->viewer .= '<p><a href=' . $newsData['general']['articles'][$j]['url'] . '>'
            . $newsData['general']['articles'][$j]['title'] . '</a></p>' . "\n";
          }


          $link = $this->Html->link('もっと見る', ['controller' => 'News', 'action' => 'newslist', 'general' ]);
          $this->viewer .= '<p>' . $link . '</p>' . "\n";

          break;

        case '5': // 5 - 健康 紺 #487eb0
          $this->viewer .= "\n" . '<p class = "category" id = "health"><span>健　康</span></p>'  . "\n";

          for ($j=0; $j < 5; $j++) {
            $this->viewer .= '<p><a href=' . $newsData['health']['articles'][$j]['url'] . '>'
            . $newsData['health']['articles'][$j]['title'] . '</a></p>' . "\n";
          }


          $link = $this->Html->link('もっと見る', ['controller' => 'News', 'action' => 'newslist', 'health' ]);
          $this->viewer .= '<p>' . $link . '</p>' . "\n";

          break;

        case '6': // 6 - サイエンス 赤　#e84118
          $this->viewer .= '<p class = "category" id = "science"><span>サイエンス</span></p>'  . "\n";

          for ($j=0; $j < 5; $j++) {
            $this->viewer .= '<p><a href=' . $newsData['science']['articles'][$j]['url'] . '>'
            . $newsData['science']['articles'][$j]['title'] . '</a></p>' . "\n";
          }


          $link = $this->Html->link('もっと見る', ['controller' => 'News', 'action' => 'newslist', 'science' ]);
          $this->viewer .= '<p>' . $link . '</p>' . "\n";

          break;

        case '7': // 7 - スポーツ #273c75
          $this->viewer .= '<hr>' . "\n" . '<p class = "category" id = "sports"><span>スポーツ</span></p>'  . "\n";

          for ($j=0; $j < 5; $j++) {
            $this->viewer .= '<p><a href=' . $newsData['sports']['articles'][$j]['url'] . '>'
            . $newsData['sports']['articles'][$j]['title'] . '</a></p>' . "\n";
          }


          $link = $this->Html->link('もっと見る', ['controller' => 'News', 'action' => 'newslist', 'sports' ]);
          $this->viewer .= '<p>' . $link . '</p>' . "\n";

          break;

        case '8': // 8 - テクノロジー グレー　#353b48
          $this->viewer .= '<hr>' . "\n" . '<p class = "category" id = "technology"><span>テクノロジー</span></p>'  . "\n";

          for ($j=0; $j < 5; $j++) {
            $this->viewer .= '<p><a href=' . $newsData['technology']['articles'][$j]['url'] . '>'
            . $newsData['technology']['articles'][$j]['title'] . '</a></p>' . "\n";
          }


          $link = $this->Html->link('もっと見る', ['controller' => 'News', 'action' => 'newslist', 'technology' ]);
          $this->viewer .= '<p>' . $link . '</p>' . "\n";

          break;
        default:
          // code...
          break;
      }
      $cnt += 1;
    }
    $this->viewer .= '<p> 回数' . $cnt . '<p>' . "\n";
    return $this->viewer;
  }

// Weather
//---- -----weatherDetail function------------------
  public function weatherDetail($data) {
    $weatherData = $this->timeshift($data);     // データの日時を日本時間に修正
    date_default_timezone_set('Asia/Tokyo');    // timezoneの設定
    $viewdata = "";   // returnするデータ
    // $viewdata = $weatherData['oneday']['main']['temp'];

    $printDate = [];
    $printWeather = [];
    $printTemp = [];
    $timecheck = [];

    // 現在の情報をセット
    $icon = $this->changePicture($weatherData['oneday']['weather'][0]['id']);
    $setIcon = $this->Html->image($icon, ['class'=>'weatherpageIcons']);
    array_push($printWeather,  $setIcon);
    array_push($printTemp, $this->tempformat($weatherData['oneday']['main']['temp']));
    array_push($timecheck, "現在");

    // 基準時間の設定
    $nowDate = date('Y-m-d');
    // array_push($printDate, $this->formatdate($nowDate));
    $setTime = "";
    // fivedayがcurrentより前日分から表記している場合があるので、時間合わせ
    for ($i=0; $i < 40; $i++) {
      if ($nowDate == substr($weatherData['fivedays']['list'][$i]['dt_txt'], 0, 10)) {
        $firstData = intval(substr($weatherData['fivedays']['list'][$i]['dt_txt'], 11, 2));
        switch ($firstData) {
          case '0':
            $setTime = "03:00:00";
            break;
          case '3':
            $setTime = "06:00:00";
            // array_push($printWeather, "-");
            // array_push($printTemp, "-");
            // array_push($timecheck, "-");
            break;
          case '6':
            $setTime = "09:00:00";

            for ($i=0; $i < 1; $i++) {
              array_push($printWeather, "-");
              array_push($printTemp, "-");
              array_push($timecheck, "-");
            }
            break;
          case '9':
            $setTime = "12:00:00";

            for ($i=0; $i < 2; $i++) {
              array_push($printWeather, "-");
              array_push($printTemp, "-");
              array_push($timecheck, "-");
            }
            break;
          case '12':
            $setTime = "15:00:00";

            for ($i=0; $i < 3; $i++) {
              array_push($printWeather, "-");
              array_push($printTemp, "-");
              array_push($timecheck, "-");
            }
            break;
          case '15':
            $setTime = "18:00:00";

            for ($i=0; $i < 4; $i++) {
              array_push($printWeather, "-");
              array_push($printTemp, "-");
              array_push($timecheck, "-");
            }
            break;
          case '18':
            $setTime = "21:00:00";

            for ($i=0; $i < 5; $i++) {
              array_push($printWeather, "-");
              array_push($printTemp, "-");
              array_push($timecheck, "-");
            }
            break;
          default:
            // 翌日の設定
            $setTime = "00:00:00";

            // for ($i=0; $i < 2; $i++) {
            //   array_push($printWeather, "-");
            //   array_push($printTemp, "-");
            //   array_push($timecheck, "-");
            // }
            break;
        }
        break;

      }
    }

    // 時間の設定
    $baseDateTime = new \DateTime($nowDate . $setTime);
    $baseDate = $baseDateTime->format('Y-m-d H:i:s');
    array_push($printDate, $this->formatdate($baseDate));


    // $viewdata = "基準 - $baseDate \n";
    for ($i=0; $i < 40; $i++) {

      if ($baseDate === $weatherData['fivedays']['list'][$i]['dt_txt']) {
        $icon = $this->changePicture($weatherData['fivedays']['list'][$i]['weather'][0]['id']);
        $setIcon = $this->Html->image($icon,['class'=>'weatherpageIcons']);
        $setTemp = $this->tempformat($weatherData['fivedays']['list'][$i]['main']['temp']);
        array_push($printWeather, $setIcon);
        array_push($printTemp, $setTemp);
        $setTime = $this->formatTime($weatherData['fivedays']['list'][$i]['dt_txt']);
        array_push($timecheck, $setTime);

        // $viewdata .= $baseDate . "\n";
        $baseDateTime->modify('+3 hours');
        $baseDate = $baseDateTime->format('Y-m-d H:i:s');

        //printdate save
        if (substr($weatherData['fivedays']['list'][$i]['dt_txt'], 11, 2) == '00') {
          array_push($printDate, $this->formatdate($weatherData['fivedays']['list'][$i]['dt_txt']));
        }
      }

    }

    //表示するためのデータ
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
        // code...
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

  // // ニュース名日本語表示
  // public function changeCategories($cat) {
  //   return $this->catNames[$cat];
  // }

  // forecastの日時データを修正
  public function timeshift($data) {
    $returnData = $data;
    for ($i=0; $i < 40; $i++) {
      $choiceDate = new \Datetime($returnData['fivedays']['list'][$i]['dt_txt']);
      $choiceDate->modify('+9 hours');
      $formatDate = $choiceDate->format('Y-m-d H:i:s');
      $returnData['fivedays']['list'][$i]['dt_txt'] = $formatDate;
    }
    return $returnData;
  }

  // ----- weather_detail ----------

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
    // $return = $this->Html->image('mapj.png',['id' => 'map', 'alt' => 'map',
    // 'usemap' => '#example1', 'width' => '1000', 'height' => '750'/*,'style'=>'display:none;'*/]);
    $counter = count($jdata[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['city']);
    for ($i=0; $i<$counter; $i++) {
      $returnData .= "<tr><td>" . $this->Html->link($jdata[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['city'][$i]['name'], 
      ['controller' => 'News-users', 'action' => 'weatherDetail', $jdata[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['en_pref'],
      $jdata[(int)$this->prefNumber[$pref]][sprintf("%02d", (int)$this->prefNumber[$pref] + 1)]['city'][$i]['en_city']]) . "</td></tr>";
    }
    return $returnData;
    // return gettype($counter);
    // 
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
