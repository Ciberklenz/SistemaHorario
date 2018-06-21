<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HistoryHour $historyHour
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $historyHour->id_history_hour],
                ['confirm' => __('Are you sure you want to delete # {0}?', $historyHour->id_history_hour)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List History Hour'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="historyHour form large-9 medium-8 columns content">
    <?= $this->Form->create($historyHour) ?>
    <fieldset>
        <legend><?= __('Edit History Hour') ?></legend>
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
