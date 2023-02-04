<?php

declare(strict_types=1);

namespace App\Model\GetInfo;

use Cake\Http\Client;
use App\Model\GetInfo\Weather;

class WeatherDetail extends Weather {
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
        $returnData = $this->choiceData($baseDate, $json);
        
        return $returnData;
    }

    // WeatherMain独自のapiデータから必要なデータだけを抽出するfunction
    private function choiceData($baseDate, $newsData) {
        for ($i=0; $i < 40; $i++) {
            // baseDateと同じ配列は残し、それ以外は削除する
            if ($baseDate === $newsData['fivedays']['list'][$i]['dt_txt']) {
                array_splice($newsData['fivedays']['list'], $i + 24);
                break;    
            } else {
                array_splice($newsData['fivedays']['list'], $i, 1);
            }  
        }
        return $newsData;
    }
}