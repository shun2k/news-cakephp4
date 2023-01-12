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

    $response = $http->get(
      $this->apiUrl . "&category=" . $this->category . "&apiKey=" . $this->apiKey
    );

    $json = $response->getJson();

    return $json;
  }
}
