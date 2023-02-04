<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * News helper
 */
class NewsHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];
    public $helpers = ['Html', 'Url'];

    private $catNames = array(
        'business'=>'ビジネス', 'entertainment'=>'エンタメ','general'=>'全般',
        'health'=>'健康', 'science'=>'サイエンス', 'sports'=>'スポーツ','technology'=>'テクノロジー');


    // Main ------ getdata function ----------
    public function getNewsData($pickupNumber, $newsData) {
        $viewer = "";
        switch ($pickupNumber) {
        
        case '2': // 2 - ビジネス パープル　#9c88ff
            $viewer = $this->dataSetHtml("ビジネス" ,"business", $newsData);

            break;

        case '3': // 3 - エンターテイメント イエロー #fbc531
            $viewer = $this->dataSetHtml("エンターテイメント" ,"entertainment", $newsData);

            break;

        case '4': // 4 - 全般 グリーン #4cd137
            $viewer = $this->dataSetHtml("全　般" ,"general", $newsData);

            break;

        case '5': // 5 - 健康 紺 #487eb0
            $viewer = $this->dataSetHtml("健　康" ,"health", $newsData);

            break;

        case '6': // 6 - サイエンス 赤　#e84118
            $viewer = $this->dataSetHtml("サイエンス" ,"science", $newsData);

            break;

        case '7': // 7 - スポーツ #273c75
            $viewer = $this->dataSetHtml("スポーツ" ,"sports", $newsData);

            break;

        case '8': // 8 - テクノロジー グレー　#353b48
            $viewer = $this->dataSetHtml("テクノロジー" ,"technology", $newsData);

            break;
        default:
            break;
        }
        return $viewer;
    
    }

    // Newslist pgae
    public function categoryListup($data) {
        $viewdata = "";
        $categoryNewsData = $data;

        for ($i=0; $i < count($categoryNewsData['articles']); $i++) {
        $viewdata .= '<p><a href=' . $categoryNewsData['articles'][$i]['url'] . '>'
        . $categoryNewsData['articles'][$i]['title'] . '</a></p>' . "\n";
        }
        return $viewdata;
    }

    // ニュース名日本語表示
    public function changeCategories($cat) {
        return $this->catNames[$cat];
    }


    // mainの各ニュースdataをhtmlに当てはめる
    private function dataSetHtml($catName, $enName, $newsData) {

        $returnData = "";
        $returnData .= '<p class = "category"  id =' . $enName . '><span>' . $catName . '</span></p>' . "\n";

        $maxcount = $newsData[$enName]['totalResults'] < 5 ? $newsData[$enName]['totalResults'] : 5;
        for ($j=0; $j < $maxcount; $j++) {
            $returnData .= '<p><a href=' . $newsData[$enName]['articles'][$j]['url'] . '>'
            . $newsData[$enName]['articles'][$j]['title'] . '</a></p>' . "\n";
        }

        $link = $this->Html->link('もっと見る', ['controller' => 'News-users', 'action' => 'newslist', array_search($catName, $this->catNames) ]);
        $returnData .= '<p>' . $link . '</p>' . "\n";
        
        return $returnData;
    }

}
