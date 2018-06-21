<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Network Model
 *
 * @property \App\Model\Table\FactoryTable|\Cake\ORM\Association\BelongsTo $Factory
 *
 * @method \App\Model\Entity\Network get($primaryKey, $options = [])
 * @method \App\Model\Entity\Network newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Network[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Network|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Network patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Network[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Network findOrCreate($search, callable $callback = null, $options = [])
 */
class NetworkTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('network');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Factory', [
            'foreignKey' => 'factory_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('provider')
            ->requirePresence('provider', 'create')
            ->notEmpty('provider');

        $validator
            ->scalar('router')
            ->requirePresence('router', 'create')
            ->notEmpty('router');

        $validator
            ->scalar('ip')
            ->requirePresence('ip', 'create')
            ->notEmpty('ip');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['factory_id'], 'Factory'));

        return $rules;
    }
}
