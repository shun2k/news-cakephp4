<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\ListupHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\NewsHelper Test Case
 */
class ListupHelperTest extends TestCase
{
    protected $Listup;

  
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->Listup = new ListupHelper($view);
    }

    protected function tearDown(): void
    {
        unset($this->Listup);

        parent::tearDown();
    }

    public function testListupHelper(): void 
    {
        // changePicture() id->picture変換
        $iconName = $this->Listup->changePicture("200");
        $this->assertEquals("thunderstorm.png", $iconName);
        $iconName = $this->Listup->changePicture("199");
        $this->assertEquals("non", $iconName);
        $iconName = $this->Listup->changePicture("232");
        $this->assertEquals("thunderstorm.png", $iconName);
        $iconName = $this->Listup->changePicture("233");
        $this->assertEquals("non", $iconName);

        // tempformat() 気温
        $temp = "23.344";
        $tempdata = $this->Listup->tempformat($temp);
        $this->assertEquals(23.3, $tempdata);

        // formatdate() 日付表示
        $date = "2023-01-01";
        $fmtdate = $this->Listup->formatdate($date);
        $this->assertEquals("1 / 1", $fmtdate);

        //formatTime()  時間表示
        $time = "2023-01-01 21:00:00";
        $fmtTime = $this->Listup->formatTime($time);
        $this->assertEquals("21 時", $fmtTime);

    }



}