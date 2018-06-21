<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonFactory $personFactory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Person Factory'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="personFactory form large-9 medium-8 columns content">
    <?= $this->Form->create($personFactory) ?>
    <fieldset>
        <legend><?= __('Add Person Factory') ?></legend>
        <?php
            echo $this->Form->control('rut_person');
            echo $this->Form->control('id_factory');
            echo $this->Form->control('ip');
            echo $this->Form->control('fecha', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
