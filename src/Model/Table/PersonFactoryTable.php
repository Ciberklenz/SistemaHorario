<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PersonFactory Model
 *
 * @method \App\Model\Entity\PersonFactory get($primaryKey, $options = [])
 * @method \App\Model\Entity\PersonFactory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PersonFactory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PersonFactory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PersonFactory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PersonFactory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PersonFactory findOrCreate($search, callable $callback = null, $options = [])
 */
class PersonFactoryTable extends Table
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

        $this->setTable('person_factory');
        $this->setDisplayField('id_person_factory');
        $this->setPrimaryKey('id_person_factory');
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
            ->integer('id_person_factory')
            ->allowEmpty('id_person_factory', 'create');

        $validator
            ->scalar('rut_person')
            ->allowEmpty('rut_person');

        $validator
            ->integer('id_factory')
            ->allowEmpty('id_factory');

        return $validator;
    }
}
