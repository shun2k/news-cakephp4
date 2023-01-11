<?php

declare(strict_types=1);

namespace App\Model\GetInfo;

use Cake\Http\Client;
use App\Model\GetInfo\GetInfoInterface;

class Weather implements GetInfoInterface {
  private string $loc;
  private string $apiUrl;
  private string $apiKey;

  function __construct($url, $key, $pref) {
    $this->loc = $pref;
    $this->apiUrl = $url;
    $this->apiKey = $key;
  }

  public function getApiData() {

    $http = new Client();

    $response = $http->get(
      $this->apiUrl . $this->loc . "&appid=" . $this->apiKey
    );

    $json = $response->getJson();

    // $weatherNow = $jsonNow['weather'][0]['main'];


    return $json;
  }
  // public function getOneData() {
  //   $http = new Client();
  //
  //   $responseNow = $http->get(
  //     "http://api.openweathermap.org/data/2.5/weather?q=" . $this->loc . "&appid=" . OPENWEATHER_KEY
  //   );
  //   $jsonNow = $responseNow->getJson();
  //   // $weatherNow = $jsonNow['weather'][0]['main'];
  //   // $jsonNow = OPENWEATHER_KEY;
  //
  //   // return $jsonNow;
  //   return $responseNow;
  // }
  //
  // public function getFivedayData() {
  //   $http = new Client();
  //
  //   $responseNow = $http->get(
  //     "http://api.openweathermap.org/data/2.5/forecast?q=" . $this->loc . "&appid=" . OPENWEATHER_KEY
  //   );
  //
  //   $jsonNow = $responseNow->getJson();
  //
  //   // return $jsonNow;
  //   return $responseNow;
  // }
}
