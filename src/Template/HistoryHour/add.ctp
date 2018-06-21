<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HistoryHour $historyHour
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List History Hour'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="historyHour form large-9 medium-8 columns content">
    <?= $this->Form->create($historyHour) ?>
    <fieldset>
        <legend><?= __('Add History Hour') ?></legend>
        <?php
            echo $this->Form->control('active');
            echo $this->Form->control('fecha', ['empty' => true]);
            echo $this->Form->control('hora_inicio', ['empty' => true]);
            echo $this->Form->control('hora_final', ['empty' => true]);
            echo $this->Form->control('total_horas');
            echo $this->Form->control('rut_person');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
