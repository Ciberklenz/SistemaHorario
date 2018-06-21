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
    .person{
        margin: auto;
        margin-top: 5vh;
        margin-bottom: 5vh;
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
        [class*="person"]{
            width: 100%;
            margin-bottom: 12vh;
        }
    }
</style>
<div class="person form large-9 medium-8 columns content">
    <?= $this->Form->create($person) ?>
    <fieldset>
        <center>
            <legend class="Title display-4">
                <?= __('Agregar Persona') ?>
            </legend>
        </center>
        <div class="container-fluid">
            <?php
                 echo $this->Form->control('id_user');
                 echo $this->Form->select('id_type_user',$type_user_format,[
                                         'label'=>'false',
                                         'empty' => __('Seleccionar tipo de usuario'),
                                         'required' => false
                                     , 'style'=>'margin-bottom: 2vh; margin-top: 4vh;']) ;
                 echo $this->Form->control('name_person');
                 echo $this->Form->control('rut_person');
                 echo $this->Form->control('address_person');
                 echo $this->Form->control('mail_person');
            ?>
        </div>
    </fieldset>
    <center>
        <?= $this->Form->button(__('Registrar'),['class'=>'btn btn-primary']) ?>
    </center>
    <?= $this->Form->end() ?>
</div>