<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HistoryHour[]|\Cake\Collection\CollectionInterface $historyHour
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New History Hour'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="historyHour index large-9 medium-8 columns content">
    <h3><?= __('History Hour') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_history_hour') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_final') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_horas') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rut_person') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historyHour as $historyHour): ?>
            <tr>
                <td><?= $this->Number->format($historyHour->id_history_hour) ?></td>
                <td><?= $this->Number->format($historyHour->active) ?></td>
                <td><?= h($historyHour->fecha) ?></td>
                <td><?= h($historyHour->hora_inicio) ?></td>
                <td><?= h($historyHour->hora_final) ?></td>
                <td><?= $this->Number->format($historyHour->total_horas) ?></td>
                <td><?= h($historyHour->rut_person) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $historyHour->id_history_hour]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $historyHour->id_history_hour]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $historyHour->id_history_hour], ['confirm' => __('Are you sure you want to delete # {0}?', $historyHour->id_history_hour)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
