<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Messages Model
 *
 * @method \App\Model\Entity\Message newEmptyEntity()
 * @method \App\Model\Entity\Message newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Message> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Message get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Message findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Message patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Message> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Message|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Message saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Message>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Message>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Message>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Message> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Message>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Message>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Message>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Message> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MessagesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('messages');
        $this->setDisplayField('department');
        $this->setPrimaryKey('id');
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
            ->scalar('department')
            ->maxLength('department', 255)
            ->requirePresence('department', 'create')
            ->notEmptyString('department');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('subject')
            ->maxLength('subject', 255)
            ->requirePresence('subject', 'create')
            ->notEmptyString('subject');

        $validator
            ->scalar('message')
            ->requirePresence('message', 'create')
            ->notEmptyString('message');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        return $validator;
    }
}
