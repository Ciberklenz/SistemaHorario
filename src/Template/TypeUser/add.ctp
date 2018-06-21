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
    .typeUser{
        margin: auto;
        margin-top: 15vh;
        border: 3px solid orange;
        background-color: #FDC26D;
        width: 60%;
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
        [class*="typeUser"]{
            width: 100%;
            margin-bottom: 12vh;
        }
    }
</style>
<div class="typeUser form large-9 medium-8 columns content">
    <?= $this->Form->create($typeUser) ?>
    <fieldset>
        <center>
            <legend class="Title display-4">
                <?= __('Agregar Tipo Usuario') ?>
            </legend>
        </center>
        <div class="container-fluid">
            <?php
                echo $this->Form->control('type_user');
                echo $this->Form->control('description');
            ?>
        </div>
    </fieldset>
    <center>
        <?= $this->Form->button(__('Registrar'),['class'=>'btn btn-primary']) ?>
    </center>
    <?= $this->Form->end() ?>
</div>