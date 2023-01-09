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
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('prefecture')
            ->maxLength('prefecture', 255)
            ->requirePresence('prefecture', 'create')
            ->notEmptyString('prefecture');

        $validator
            ->scalar('local')
            ->maxLength('local', 255)
            ->requirePresence('local', 'create')
            ->notEmptyString('local');

        $validator
            ->scalar('column_order')
            ->maxLength('column_order', 255)
            ->requirePresence('column_order', 'create')
            ->notEmptyString('column_order');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        return $validator;
    }
}
