<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hour $hour
 */
?>
<style>
    .Title{
        margin-top: 3vh;
        margin-bottom: 5vh;
    }
    .container-fluid{
        width: 70%;
    }
    .hour{
        margin: auto;
        margin-top: 5vh;
        border: 3px solid orange;
        background-color: #FDC26D;
        width: 80%;
        border-radius: 15px;
    }
    .btn{
        margin-bottom: 3vh;
    }
    @media only screen and (max-width: 768px) {
        [class*="Title"]{
            font-size: 40px;
        }
        [class*="container-fluid"]{
            width: 80%;
        }
        [class*="hour"]{
            width: 100%;
            margin-bottom: 12vh;
        }
    }
</style>
<div class="hour form large-9 medium-8 columns content">
    <?= $this->Form->create($hour) ?>
    <fieldset>
        <center>
            <legend class="Title display-4">
                <?= __('Agregar Horas') ?>
            </legend>
        </center>
        <div class="container-fluid">
            <?php
                echo $this->Form->control('rut_person');
                echo $this->Form->control('cantidad_horas_trabajadas');
                echo $this->Form->control('cantidad_horas_totales');
                echo $this->Form->control('cantidad_horas_restantes');
            ?>
        </div>
    </fieldset>
    <center>
        <?= $this->Form->button(__('Registrar'),['class'=>'btn btn-primary']) ?>
    </center>
    <?= $this->Form->end() ?>
</div>