<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factory $factory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Factory'), ['action' => 'edit', $factory->id_factory]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Factory'), ['action' => 'delete', $factory->id_factory], ['confirm' => __('Are you sure you want to delete # {0}?', $factory->id_factory)]) ?> </li>
        <li><?= $this->Html->link(__('List Factory'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Factory'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Person'), ['controller' => 'Person', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'Person', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="factory view large-9 medium-8 columns content">
    <h3><?= h($factory->id_factory) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name Factory') ?></th>
            <td><?= h($factory->name_factory) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Factory') ?></th>
            <td><?= $this->Number->format($factory->id_factory) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Person') ?></h4>
        <?php if (!empty($factory->person)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Rut Person') ?></th>
                <th scope="col"><?= __('Id Type User') ?></th>
                <th scope="col"><?= __('Id User') ?></th>
                <th scope="col"><?= __('Name Person') ?></th>
                <th scope="col"><?= __('Address Person') ?></th>
                <th scope="col"><?= __('Mail Person') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($factory->person as $person): ?>
            <tr>
                <td><?= h($person->rut_person) ?></td>
                <td><?= h($person->id_type_user) ?></td>
                <td><?= h($person->id_user) ?></td>
                <td><?= h($person->name_person) ?></td>
                <td><?= h($person->address_person) ?></td>
                <td><?= h($person->mail_person) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Person', 'action' => 'view', $person->rut_person]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Person', 'action' => 'edit', $person->rut_person]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Person', 'action' => 'delete', $person->rut_person], ['confirm' => __('Are you sure you want to delete # {0}?', $person->rut_person)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
