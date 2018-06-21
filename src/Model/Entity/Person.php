<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property string $rut_person
 * @property int $id_type_user
 * @property int $id_user
 * @property string $name_person
 * @property string $address_person
 * @property string $mail_person
 */
class Person extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'id_type_user' => true,
        'id_user' => true,
        'name_person' => true,
        'address_person' => true,
        'mail_person' => true,
        'rut_person' => true
    ];
}
