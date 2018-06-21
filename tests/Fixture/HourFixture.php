<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HourFixture
 *
 */
class HourFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'hour';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_hour' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'rut_person' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cantidad_horas_trabajadas' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cantidad_horas_totales' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cantidad_horas_restantes' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_hour_reference_rut_person' => ['type' => 'index', 'columns' => ['rut_person'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_hour'], 'length' => []],
            'fk_hour_reference_rut_person' => ['type' => 'foreign', 'columns' => ['rut_person'], 'references' => ['person', 'rut_person'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id_hour' => 1,
            'rut_person' => 'Lorem ipsum dolor sit amet',
            'cantidad_horas_trabajadas' => 1,
            'cantidad_horas_totales' => 1,
            'cantidad_horas_restantes' => 1
        ],
    ];
}
