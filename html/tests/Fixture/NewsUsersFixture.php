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
                'name' => 'Lorem ipsum dolor sit amet',
                'prefecture' => 'Lorem ipsum dolor sit amet',
                'local' => 'Lorem ipsum dolor sit amet',
                'column_order' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-01-09 05:35:21',
                'modified' => '2023-01-09 05:35:21',
            ],
        ];
        parent::init();
    }
}
