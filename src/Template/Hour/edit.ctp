<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hour $hour
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $hour->id_hour],
                ['confirm' => __('Are you sure you want to delete # {0}?', $hour->id_hour)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Hour'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="hour form large-9 medium-8 columns content">
    <?= $this->Form->create($hour) ?>
    <fieldset>
        <legend><?= __('Edit Hour') ?></legend>
        <?php
            echo $this->Form->control('rut_person');
            echo $this->Form->control('cantidad_horas_trabajadas');
            echo $this->Form->control('cantidad_horas_totales');
            echo $this->Form->control('cantidad_horas_restantes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
