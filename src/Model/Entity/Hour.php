<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hour Entity
 *
 * @property int $id_hour
 * @property string $rut_person
 * @property int $cantidad_horas_trabajadas
 * @property int $cantidad_horas_totales
 * @property int $cantidad_horas_restantes
 */
class Hour extends Entity
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
        'rut_person' => true,
        'cantidad_horas_trabajadas' => true,
        'cantidad_horas_totales' => true,
        'cantidad_horas_restantes' => true
    ];
}
