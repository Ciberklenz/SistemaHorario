<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Network Entity
 *
 * @property int $id
 * @property string $provider
 * @property string $router
 * @property string $ip
 * @property int $factory_id
 *
 * @property \App\Model\Entity\Factory $factory
 */
class Network extends Entity
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
        'provider' => true,
        'router' => true,
        'ip' => true,
        'factory_id' => true,
        'factory' => true
    ];
}
