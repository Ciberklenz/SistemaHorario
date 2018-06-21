<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersonFixture
 *
 */
class PersonFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'person';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'rut_person' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_type_user' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_user' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'name_person' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'address_person' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'mail_person' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'url_photo' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_person_reference_type_user' => ['type' => 'index', 'columns' => ['id_type_user'], 'length' => []],
            'fk_person_reference_user' => ['type' => 'index', 'columns' => ['id_user'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['rut_person'], 'length' => []],
            'fk_person_reference_type_user' => ['type' => 'foreign', 'columns' => ['id_type_user'], 'references' => ['type_user', 'id_type_user'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
            'fk_person_reference_user' => ['type' => 'foreign', 'columns' => ['id_user'], 'references' => ['user', 'id_user'], 'update' => 'restrict', 'delete' => 'cascade', 'length' => []],
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
            'rut_person' => 'a13f0815-3207-4d74-8177-2da5fe5ae243',
            'id_type_user' => 1,
            'id_user' => 1,
            'name_person' => 'Lorem ipsum dolor sit amet',
            'address_person' => 'Lorem ipsum dolor sit amet',
            'mail_person' => 'Lorem ipsum dolor sit amet',
            'url_photo' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
