<?php

namespace App\Test\TestCase\Model\GetInfo;

use Cake\Http\TestSuite\HttpClientTrait;
use App\Model\GetInfo\NewsApi;
use Cake\TestSuite\TestCase;

class NewsApiTest extends TestCase {

    use HttpClientTrait;

    protected $News;
    
    public function setUp():void 
    {
        parent::setUp();
        $this->News = new NewsApi(env("NEWSAPI_URL"), env("NEWSAPI_KEY"), "business");
    }

    public function test_News(): void
    {   
        // $this->mockClientPost(
        //     $this->News->getApiData(),
        //     $this->newClientResponse(200, [], json_encode(['ok' => true]))      
        // );
        $response = $this->News->getApiData();
        $this->assertNotEmpty($response);
        $this->assertIsArray($response);
        $this->assertArrayHasKey('articles', $response);

    }
}

