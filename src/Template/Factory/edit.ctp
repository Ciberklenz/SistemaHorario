<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Factory $factory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $factory->id_factory],
                ['confirm' => __('Are you sure you want to delete # {0}?', $factory->id_factory)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Factory'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Person'), ['controller' => 'Person', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'Person', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="factory form large-9 medium-8 columns content">
    <?= $this->Form->create($factory) ?>
    <fieldset>
        <legend><?= __('Edit Factory') ?></legend>
        <?php
            echo $this->Form->control('name_factory');
            echo $this->Form->control('person._ids', ['options' => $person]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
