<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factory[]|\Cake\Collection\CollectionInterface $factory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Factory'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Person'), ['controller' => 'Person', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'Person', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="factory index large-9 medium-8 columns content">
    <h3><?= __('Factory') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_factory') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_factory') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($factory as $factory): ?>
            <tr>
                <td><?= $this->Number->format($factory->id_factory) ?></td>
                <td><?= h($factory->name_factory) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $factory->id_factory]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $factory->id_factory]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $factory->id_factory], ['confirm' => __('Are you sure you want to delete # {0}?', $factory->id_factory)]) ?>
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
