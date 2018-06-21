<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersonFactoryFixture
 *
 */
class PersonFactoryFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'person_factory';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_person_factory' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'rut_person' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_factory' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ip_inicio' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'fecha_inicio' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'ip_termino' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'fecha_termino' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_person_factory_reference_rut_person' => ['type' => 'index', 'columns' => ['rut_person'], 'length' => []],
            'fk_person_factory_reference_id_factory' => ['type' => 'index', 'columns' => ['id_factory'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_person_factory'], 'length' => []],
            'fk_person_factory_reference_id_factory' => ['type' => 'foreign', 'columns' => ['id_factory'], 'references' => ['factory', 'id_factory'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'fk_person_factory_reference_rut_person' => ['type' => 'foreign', 'columns' => ['rut_person'], 'references' => ['person', 'rut_person'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id_person_factory' => 1,
            'rut_person' => 'Lorem ipsum dolor sit amet',
            'id_factory' => 1,
            'ip_inicio' => 'Lorem ipsum dolor sit amet',
            'fecha_inicio' => '2017-12-13 11:02:14',
            'ip_termino' => 'Lorem ipsum dolor sit amet',
            'fecha_termino' => '2017-12-13 11:02:14'
        ],
    ];
}
