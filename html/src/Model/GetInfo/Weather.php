<?php

declare(strict_types=1);

namespace App\Model\GetInfo;

use Cake\Http\Client;
use App\Model\GetInfo\GetInfoInterface;

abstract class Weather implements GetInfoInterface {
  protected string $loc;
  protected string $apiUrl;
  protected string $apiKey;

  function __construct($url, $key, $pref) {
    $this->loc = $pref;
    $this->apiUrl = $url;
    $this->apiKey = $key;
  }

  abstract public function getApiData();

  // jsondataの時間を日本時間に修正する
  // protected function timeshift($data) {
  //   for ($i=0; $i < 40; $i++) {
  //     $returnData = $data;
  //     $choiceDate = new \Datetime($returnData['fivedays']['list'][$i]['dt_txt']);
  //     $choiceDate->modify('+9 hours');
  //     $formatDate = $choiceDate->format('Y-m-d H:i:s');
  //     $returnData['fivedays']['list'][$i]['dt_txt'] = $formatDate;
  //   }
  //   return $returnData;
  // }

  // // 現在の時間を基準に最初に表示する時間を返す
  // protected function baseTime($newsData) {
  //   $setTime = "";
  //   $nowDate = date('Y-m-d');

  //   for ($i=0; $i < 40; $i++) {
  //     if ($nowDate <= substr($newsData['fivedays']['list'][$i]['dt_txt'], 0, 10)) {
  //       $firstData = intval(substr($newsData['fivedays']['list'][$i]['dt_txt'], 11, 2));
  //       print_r($firstData);
  //       switch ($firstData) {
  //         case '0':
  //           $setTime = "03:00:00";
  //           break;
  //         case '3':
  //           $setTime = "06:00:00";
  //           break;
  //         case '6':
  //           $setTime = "09:00:00";
  //           break;
  //         case '9':
  //           $setTime = "12:00:00";
  //           break;
  //         case '12':
  //           $setTime = "15:00:00";
  //           break;
  //         case '15':
  //           $setTime = "18:00:00";
  //           break;
  //         case '18':
  //           $setTime = "21:00:00";
  //           break;
  //         case '21':
  //           $setTime = "00:00:00";
  //           $nowDate = date("Y-m-d", strtotime("+1 day"));   // nowDateを+1日する
  //         default:
  //           break;
  //       }
  //       break;
  //     }
  //   }

  //   $returnTime = new \DateTime($nowDate . $setTime);
  //   return $returnTime;
  // }
  
}
