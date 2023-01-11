<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NewsUsers Model
 *
 * @method \App\Model\Entity\NewsUser newEmptyEntity()
 * @method \App\Model\Entity\NewsUser newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\NewsUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NewsUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\NewsUser findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\NewsUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NewsUser[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\NewsUser|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NewsUser saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NewsUser[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\NewsUser[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\NewsUser[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\NewsUser[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NewsUsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('news_users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 150)
            ->requirePresence('name', 'create')
            ->notEmptyString('name', '名前は必ず入力してください');

        $validator
            ->scalar('prefecture')
            ->maxLength('prefecture', 50)
            ->requirePresence('prefecture', 'create')
            ->notEmptyString('prefecture', '都道府県を選択してください');

        $validator
            ->scalar('local')
            ->maxLength('local', 50)
            ->requirePresence('local', 'create')
            ->notEmptyString('local','市町村を選択してください');

        $validator
            ->scalar('column_order')
            ->maxLength('column_order', 50)
            ->requirePresence('column_order', 'create')
            ->minLength('column_order',4, '項目を４つ以上選択してください')
            ->maxLength('column_order', 8)
            ->notEmptyString('column_order');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->email('email', false)
            ->notEmptyString('email', 'メールの形式で入力してください');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password', 'パスワードを入力してください');

        return $validator;
    }
}
