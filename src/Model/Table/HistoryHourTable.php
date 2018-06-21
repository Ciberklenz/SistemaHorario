<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HistoryHour Model
 *
 * @method \App\Model\Entity\HistoryHour get($primaryKey, $options = [])
 * @method \App\Model\Entity\HistoryHour newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HistoryHour[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HistoryHour|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HistoryHour patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HistoryHour[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HistoryHour findOrCreate($search, callable $callback = null, $options = [])
 */
class HistoryHourTable extends Table
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

        $this->setTable('history_hour');
        $this->setDisplayField('id_history_hour');
        $this->setPrimaryKey('id_history_hour');
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
            ->integer('id_history_hour')
            ->allowEmpty('id_history_hour', 'create');

        $validator
            ->integer('active')
            ->allowEmpty('active');

        $validator
            ->date('fecha')
            ->allowEmpty('fecha');

        $validator
            ->dateTime('hora_inicio')
            ->allowEmpty('hora_inicio');

        $validator
            ->dateTime('hora_final')
            ->allowEmpty('hora_final');

        $validator
            ->numeric('total_horas')
            ->allowEmpty('total_horas');

        $validator
            ->scalar('rut_person')
            ->allowEmpty('rut_person');

        $validator
            ->scalar('ip_inicio')
            ->allowEmpty('ip_inicio');

        $validator
            ->scalar('ip_termino')
            ->allowEmpty('ip_termino');

        return $validator;
    }
}
