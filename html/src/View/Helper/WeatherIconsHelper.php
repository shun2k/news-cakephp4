<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * WeatherIcons helper
 */
class WeatherIconsHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];
    public $helpers = ['Listup'];

    public function changePicture($id) {
        $check = intval($id);
        switch ($check) {
          // thunder
          case $check >= 200 && $check <= 232:
            return "thunderstorm";
            break;
    
          // drizzle
          case $check >= 300 && $check <= 321:
            return "drizzle";
            break;
    
          // rain
          case 500:
            return "lightrain";
            break;
    
          case $check == 501 || $check == 511 || $check == 520 || $check == 531:
            return "rain-clouds";
            break;
    
          case $check == 502 || $check == 521:
            return "rain";
            break;
    
          case $check == 503 || $check == 504 || $check == 522 || $check == 771:
            return "heavyrain";
            break;
    
          // snow
          case $check == 600 || $check == 620:
           return "snow-clouds";
           break;
    
          case $check == 601 || $check == 602 || $check == 621 || $check == 622:
            return "snow";
            break;
    
          case $check >= 611 && $check <= 616;
            return "rain-snow";
            break;
    
          // mist
          case $check >= 611 && $check <= 616;
            return "rain-snow";
            break;
    
          // clear
          case 800:
            return "sunny";
            break;
    
          case 801:
            return "sunny-clouds";
            break;
    
          case $check == 802 || $check == 803:
            return "clouds";
            break;
    
          case 804:
            return "brokenclouds";
            break;
    
          default:
            // code...
            break;
        }
    }

    public function tempformat($data) {
        $temp = round(intval($data), 1);
        return $temp;
    }

}
