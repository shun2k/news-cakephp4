<?php

declare(strict_types=1);

namespace App\Model\GetInfo;

use Cake\Http\Client;
use App\Model\GetInfo\GetInfoInterface;

class NewsApi implements GetInfoInterface {
  private string $category;
  private string $apiUrl;
  private string $apiKey;

  function __construct($url, $key, $cat) {
    $this->category = $cat;
    $this->apiUrl = $url;
    $this->apiKey = $key;
  }

  public function getApiData() {

    $http = new Client();
//https://newsapi.org/v2/top-headlines?country=us&apiKey=55c4d0ba67124d1baa47bfbcd82b7bfc
    $response = $http->get(
      $this->apiUrl . "&category=" . $this->category . "&apiKey=" . $this->apiKey
    );

    $json = $response->getJson();

    return $json;
  }
}
