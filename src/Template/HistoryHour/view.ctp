<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HistoryHour $historyHour
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit History Hour'), ['action' => 'edit', $historyHour->id_history_hour]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete History Hour'), ['action' => 'delete', $historyHour->id_history_hour], ['confirm' => __('Are you sure you want to delete # {0}?', $historyHour->id_history_hour)]) ?> </li>
        <li><?= $this->Html->link(__('List History Hour'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New History Hour'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="historyHour view large-9 medium-8 columns content">
    <h3><?= h($historyHour->id_history_hour) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rut Person') ?></th>
            <td><?= h($historyHour->rut_person) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id History Hour') ?></th>
            <td><?= $this->Number->format($historyHour->id_history_hour) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($historyHour->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Horas') ?></th>
            <td><?= $this->Number->format($historyHour->total_horas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($historyHour->fecha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Inicio') ?></th>
            <td><?= h($historyHour->hora_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Final') ?></th>
            <td><?= h($historyHour->hora_final) ?></td>
        </tr>
    </table>
</div>
