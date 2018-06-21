<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hour $hour
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Hour'), ['action' => 'edit', $hour->id_hour]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hour'), ['action' => 'delete', $hour->id_hour], ['confirm' => __('Are you sure you want to delete # {0}?', $hour->id_hour)]) ?> </li>
        <li><?= $this->Html->link(__('List Hour'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hour'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="hour view large-9 medium-8 columns content">
    <h3><?= h($hour->id_hour) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rut Person') ?></th>
            <td><?= h($hour->rut_person) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Hour') ?></th>
            <td><?= $this->Number->format($hour->id_hour) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad Horas Trabajadas') ?></th>
            <td><?= $this->Number->format($hour->cantidad_horas_trabajadas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad Horas Totales') ?></th>
            <td><?= $this->Number->format($hour->cantidad_horas_totales) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad Horas Restantes') ?></th>
            <td><?= $this->Number->format($hour->cantidad_horas_restantes) ?></td>
        </tr>
    </table>
</div>
