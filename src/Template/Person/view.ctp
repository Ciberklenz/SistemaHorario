<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<style>
    .Container-Buttons{
        margin-top: 5vh;
        border: 3px solid orange;
        border-style: dotted;
        padding: 10px;
    }
    .btn{
        cursor: pointer;
    }
    .Container-Photo{
        border: 3px solid orange;
        margin-top: 10vh;
    }
    .Container-Data{
        border: 3px solid orange;
        border-top-left-radius: 45px;
        border-bottom-right-radius: 45px;
        margin-top: 10vh;
        border-style: dotted;
        margin-bottom: 5vh;
    }
    .Container-Info{
        margin-top: 5vh;
        margin-bottom: 5vh;
    }
    .Label-Fields{
        font-size: 30px;
        font-weight: bold;
    }
    .Label-Data{
        font-size: 30px;
    }
    @media only screen and (max-width: 768px) {
        [class*="col-"] {
            width: 100%;
        }
        [class*="Title"]{
            font-size: 40px;
        }
        [class*="Container-Buttons"]{
            width: 100%;
            margin: auto;
        }
        [class*="Container-Photo"]{
            width: 95%;
        }        
        [class*="Container-Data"]{
            width: 95%;
        }
        [class*="Container-Info"]{
            width: 95%;
        }
        [class*="Label-Fields"]{
            font-size: 20px;
        }
        [class*="Label-Data"]{
            font-size: 20px;
        }
    }
</style>
<div class="d-flex justify-content-center">
    <label class="Title display-3">
        Datos Personales
    </label>
</div>
<div class="d-flex justify-content-center">
    <div class="Container-Buttons row col-md-9 justify-content-around">
        <div class="col-md-2">
            <a href="/Control-Practica_Beta/Person/add">
                <button class="btn btn-primary">
                    Agregar Persona
                </button>
            </a>
        </div>
        <div class="col-md-2">
            <?php foreach($query as $person): ?>
            <?= $this->Html->link(__('Editar Persona', true), array('controller'=>'person', 'action' => 'edit', $person->rut_person), array('class'=>'btn btn-primary')); ?>
        </div>
        <div class="col-md-2">
            <?= $this->Form->postLink(__('Eliminar Persona', true), array('controller'=>'person', 'action' => 'delete', $person->rut_person), array ('class'=>'btn btn-primary','confirm' => __('Esta seguro que quiere eliminar?', $person->rut_person))); ?>
        </div>
        <div class="col-md-2">
            <a href="/Control-Practica_Beta/Person/index">
                <button class="btn btn-primary">
                    Volver Atrás
                </button>
            </a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-around">
            <div class="Container-Photo col-md-3">
                <center>
                    <?= $this->Html->image('avatars/'.$person->url_photo, ['class'=>'img-thumbnail','style'=>'heigth:500px; width:250px'])?>
                </center>
            </div>
            <div class="Container-Data col-md-8">
                <div class="Container-Info">
                   <center>
                       <label class="Label-Fields display-4">
                        Rut:                          
                    </label>
                    <label class="Label-Data display-4">
                        <?= h($person->rut_person) ?>
                    </label><br>
                    <label class="Label-Fields display-4">
                        Nombre:                          
                    </label>
                    <label class="Label-Data display-4">
                        <?= h($person->name_person) ?>
                    </label><br>
                    <label class="Label-Fields display-4">
                        Dirección:                          
                    </label>
                    <label class="Label-Data display-4">
                        <?= h($person->address_person) ?>
                    </label><br>
                    <label class="Label-Fields display-4">
                        Correo:                          
                    </label>
                    <label class="Label-Data display-4">
                        <?= h($person->mail_person) ?>
                    </label><br>
                    <label class="Label-Fields display-4">
                        Tipo de Usuario:                          
                    </label>
                    <label class="Label-Data display-4">
                        <?= h($person->TypeUser['type_user']) ?>
                    </label><br>
                    <label class="Label-Fields display-4">
                        ID Usuario:                          
                    </label>
                    <label class="Label-Data display-4">
                        <?= $this->Number->format($person->id_user) ?>
                    </label>    
                   </center>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>