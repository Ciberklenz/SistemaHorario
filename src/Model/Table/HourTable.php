<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hour Model
 *
 * @method \App\Model\Entity\Hour get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hour newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Hour[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hour|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hour patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hour[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hour findOrCreate($search, callable $callback = null, $options = [])
 */
class HourTable extends Table
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

        $this->setTable('hour');
        $this->setDisplayField('id_hour');
        $this->setPrimaryKey('id_hour');
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
            ->integer('id_hour')
            ->allowEmpty('id_hour', 'create');

        $validator
            ->scalar('rut_person')
            ->allowEmpty('rut_person');

        $validator
            ->integer('cantidad_horas_trabajadas')
            ->allowEmpty('cantidad_horas_trabajadas');

        $validator
            ->integer('cantidad_horas_totales')
            ->allowEmpty('cantidad_horas_totales');

        $validator
            ->integer('cantidad_horas_restantes')
            ->allowEmpty('cantidad_horas_restantes');

        return $validator;
    }
}
