<?php

declare(strict_types=1);

namespace App\Model\GetInfo;

use Cake\Core\Configure;
use App\Model\GetInfo\Weather;
/**
 *
 */
class GetNews
{
  private string $target;
  private string $column;


  function __construct($target, $col)
  {
      $this->target = $target;
      $this->column = $col;
  }

  public function getNews() {
    $keyword = [];
    $apidata = [];
    $returnData = [];

    for ($i=0; $i < strlen($this->column); $i++) {

      switch ($this->column[$i]) {
        case '1':   //weather
          array_push($keyword, "oneday");
          $one = new WeatherMain(env("OPENWEATHER_ONEDAY_URL"), env("OPENWEATHER_KEY"), $this->target);
          array_push($apidata, $one->getApiData());

          array_push($keyword, "fivedays");
          $five = new WeatherDetail(env("OPENWEATHER_FIVEDAYS_URL"), env("OPENWEATHER_KEY"), $this->target, "Main");
          // 取り出したデータを修正する

          array_push($apidata, $five->getApiData());
          break;

        case '2':   // business
          array_push($keyword, "business");
          $data = new NewsApi(env("NEWSAPI_URL"), env("NEWSAPI_KEY"), "business");
          array_push($apidata, $data->getApiData());
          break;

        case '3':   // entertainment
          array_push($keyword, "entertainment");
          $data = new NewsApi(env("NEWSAPI_URL"), env("NEWSAPI_KEY"), "entertainment");
          array_push($apidata, $data->getApiData());
          break;

        case '4':   // general
          array_push($keyword, "general");
          $data = new NewsApi(env("NEWSAPI_URL"), env("NEWSAPI_KEY"), "general");
          array_push($apidata, $data->getApiData());
          break;

        case '5':   // health
          array_push($keyword, "health");
          $data = new NewsApi(env("NEWSAPI_URL"), env("NEWSAPI_KEY"), "health");
          array_push($apidata, $data->getApiData());
          break;

        case '6':   // science
          array_push($keyword, "science");
          $data = new NewsApi(env("NEWSAPI_URL"), env("NEWSAPI_KEY"), "science");
          array_push($apidata, $data->getApiData());
          break;

        case '7':   // sports
          array_push($keyword, "sports");
          $data = new NewsApi(env("NEWSAPI_URL"), env("NEWSAPI_KEY"), "sports");
          array_push($apidata, $data->getApiData());
          break;

        case '8':   // technology
          array_push($keyword, "technology");
          $data = new NewsApi(env("NEWSAPI_URL"), env("NEWSAPI_KEY"), "technology");
          array_push($apidata, $data->getApiData());
          break;

        default:
          break;
      }

    }

    for ($i=0; $i < count($keyword); $i++) {
      $returnData[$keyword[$i]] = $apidata[$i];
    }

    return $returnData;
  }

  // Newslist で利用
  public function getCategoryList($cat) {
    $category = $cat;
    $data = new NewsApi(env("NEWSAPI_URL"), env("NEWSAPI_KEY"), $category);
    $returnData = $data->getApiData();
    return $returnData;
  }

  // WeatherDeteil で利用
  public function getWeatherDitail() {
    $keyword = [];
    $apidata = [];
    $returnData = [];

    array_push($keyword, "oneday");
    $one = new WeatherMain(env("OPENWEATHER_ONEDAY_URL"), env("OPENWEATHER_KEY"), $this->target);
    array_push($apidata, $one->getApiData());
    //
    array_push($keyword, "fivedays");
    $five = new WeatherDetail(env("OPENWEATHER_FIVEDAYS_URL"), env("OPENWEATHER_KEY"), $this->target, "Five");
    array_push($apidata, $five->getApiData());
    //
    for ($i=0; $i < count($keyword); $i++) {
      $returnData[$keyword[$i]] = $apidata[$i];
    }


    return $returnData;
  }
}
