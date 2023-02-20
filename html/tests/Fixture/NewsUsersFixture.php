<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NewsUsersFixture
 */
class NewsUsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Akagi',
                'prefecture' => 'Hokkaido',
                'local' => 'Sapporo',
                'column_order' => '654321',
                'email' => 'akagi@gmail.com',
                'password' => '1',
                'created' => '2023-02-09 05:35:21',
                'modified' => '2023-02-09 05:35:21',
            ],
            [
                'id' => 2,
                'name' => 'Kawai',
                'prefecture' => 'Tokyo',
                'local' => 'Shinagawa-ku',
                'column_order' => '32147',
                'email' => 'kawai@gmail.com',
                'password' => '1',
                'created' => '2023-02-10 05:35:21',
                'modified' => '2023-02-10 05:35:21',
            ],
            [
                'id' => 3,
                'name' => 'Sato',
                'prefecture' => 'Osaka-fu',
                'local' => 'Osaka-shi',
                'column_order' => '13625',
                'email' => 'Sato@gmail.com',
                'password' => '1',
                'created' => '2023-02-11 05:35:21',
                'modified' => '2023-02-11 05:35:21',
            ]
        ];
        parent::init();
    }
}
