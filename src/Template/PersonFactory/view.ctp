<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonFactory $personFactory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Person Factory'), ['action' => 'edit', $personFactory->id_person_factory]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Person Factory'), ['action' => 'delete', $personFactory->id_person_factory], ['confirm' => __('Are you sure you want to delete # {0}?', $personFactory->id_person_factory)]) ?> </li>
        <li><?= $this->Html->link(__('List Person Factory'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person Factory'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="personFactory view large-9 medium-8 columns content">
    <h3><?= h($personFactory->id_person_factory) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rut Person') ?></th>
            <td><?= h($personFactory->rut_person) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip') ?></th>
            <td><?= h($personFactory->ip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Person Factory') ?></th>
            <td><?= $this->Number->format($personFactory->id_person_factory) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Factory') ?></th>
            <td><?= $this->Number->format($personFactory->id_factory) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($personFactory->fecha) ?></td>
        </tr>
    </table>
</div>
