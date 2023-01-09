<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * NewsUsers seed.
 */
class NewsUsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'name' => '田中',
                'prefecture' => 'Tokyo',
                'local' => 'Shibuya',
                'column_order' => '12345',
                'email' => 'tanaka@gmail.com',
                'password' => '1',
                'created' => '2022-12-01 10:00:00',
                'modified' => '2022-12-01 10:00:00',
            ], [
                'name' => '佐藤',
                'prefecture' => 'Kyoto',
                'local' => 'kyoto',
                'column_order' => '54321',
                'email' => 'sato@gmail.com',
                'password' => '1',
                'created' => '2022-12-02 11:00:00',
                'modified' => '2022-12-02 11:00:00',
            ]
        ];

        $table = $this->table('news_users');
        $table->insert($data)->save();
    }
}
