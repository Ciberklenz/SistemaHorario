<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HistoryHour Entity
 *
 * @property int $id_history_hour
 * @property int $active
 * @property \Cake\I18n\FrozenDate $fecha
 * @property \Cake\I18n\FrozenTime $hora_inicio
 * @property \Cake\I18n\FrozenTime $hora_final
 * @property float $total_horas
 * @property string $rut_person
 * @property string $ip_inicio
 * @property string $ip_termino
 */
class HistoryHour extends Entity
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
        'active' => true,
        'fecha' => true,
        'hora_inicio' => true,
        'hora_final' => true,
        'total_horas' => true,
        'rut_person' => true,
        'ip_inicio' => true,
        'ip_termino' => true
    ];
}
