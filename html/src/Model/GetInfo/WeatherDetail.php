<?php

declare(strict_types=1);

namespace App\Model\GetInfo;

use Cake\Http\Client;
use App\Model\GetInfo\Weather;

class WeatherDetail extends Weather {
    private string $pageName;
    // コンストラクタ上書き

    function __construct($url, $key, $pref, $Name) {
        $this->loc = $pref;
        $this->apiUrl = $url;
        $this->apiKey = $key;
        $this->pageName = $Name;
    }
// getApiData() を上書きする
    public function getApiData() {
        $http = new Client();

        $response = $http->get(
          $this->apiUrl . $this->loc . "&appid=" . $this->apiKey
        );
        
        // データの時間の修正
        $json = $this->timeshift($response->getJson());

        // 最初に天気予報を表示する時間
        $baseDate = $this->baseTime($json);

        // 天気予報の情報を整理
        $returnData = $this->choiceData($baseDate, $json, $this->pageName);
        
        return $returnData;
    }

    // jsondataの時間を日本時間に修正する
    private function timeshift($data) {
        $returnData = $data;
        for ($i=0; $i < 40; $i++) {  
            $choiceDate = new \Datetime($returnData['list'][$i]['dt_txt']);
            $choiceDate->modify('+9 hours');
            $formatDate = $choiceDate->format('Y-m-d H:i:s');
            $returnData['list'][$i]['dt_txt'] = $formatDate;
        }
        return $returnData;
    }

    // 現在の時間を基準に最初に表示する時間を返す
    private function baseTime($newsData) {
        $setTime = "";
        $nowDate = date('Y-m-d');

        for ($i=0; $i < 40; $i++) {
            if ($nowDate <= substr($newsData['list'][$i]['dt_txt'], 0, 10)) {
                $firstData = intval(substr($newsData['list'][$i]['dt_txt'], 11, 2));
                // print_r($firstData);
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
                case '21':
                    $setTime = "00:00:00";
                    $nowDate = date("Y-m-d", strtotime("+1 day"));   // nowDateを+1日する
                default:
                    break;
                }
                break;
            }
        }

        $returnTime = new \DateTime($nowDate . $setTime);
        $baseDate = $returnTime->format('Y-m-d H:i:s');
        return $baseDate;
    }

    // WeatherMain独自のapiデータから必要なデータだけを抽出するfunction
    private function choiceData($baseDate, $newsData, $pageName) {
        
        // print_r("basedateは". $baseDate . "です");
        $count = $pageName === "Main" ? 4 : 24;
        // print_r("カウント数" . $count . "です");
        
        for ($i=0; $i < count($newsData['list']); $i++) {
            // baseDateと同じ配列は残し、それ以外は削除する
            // print_r("for文チェック" . $newsData['list'][$i]['dt_txt'] . "は" . $i . "回目");
            if ($baseDate === $newsData['list'][$i]['dt_txt']) {
                // print_r("チェックは" . $newsData['list'][$i]['dt_txt'] . "です");
                for ($j=$i; $j<$i+$count ; $j++) { 
                    array_push($newsData['list'], $newsData['list'][$j]);
                }
                array_splice($newsData['list'], 0, 40);
                break;    
            }
        }

        return $newsData;
    }
}