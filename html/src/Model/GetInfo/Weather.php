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
    
    return $json;
  }
  
}
