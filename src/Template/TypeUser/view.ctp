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
    .Buttons{
        margin-top: 5vh;
        margin-bottom: 5vh;
    }
    .btn{
        cursor: pointer;
    }
    .Container-Data{
        border: 3px solid orange;
        border-top-left-radius: 45px;
        border-bottom-right-radius: 45px;
        margin-top: 5vh;
        margin-bottom: 5vh;
    }
    .Container-Info{
        margin-top: 1vh;
        margin-bottom: 0vh;
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
        [class*="Container-Data"]{
            width: 95%;
        }
        [class*="Container-Info"]{
            width: 100%;
        }
        [class*="Label-Fields"]{
            font-size: 20px;
        }
        [class*="Label-Data"]{
            font-size: 20px;
        }
        [class*="btn"]{
            margin: auto;
            margin-bottom: 2vh;
        }
    }
</style>
<div class="d-flex justify-content-center">
    <label class="Title display-3">
        Datos Tipo Usuario
    </label>
</div>
<div class="d-flex justify-content-center">
    <div class="Container-Buttons row col-md-9 justify-content-around">
        <div class="col-md-2">
            <a href="/Control-Practica_Beta/TypeUser/add">
                <button class="btn btn-primary">
                    Agregar Tipo Usuario
                </button>
            </a>
        </div>
        <div class="col-md-2">
            <?= $this->Html->link(__('Editar Tipo Usuario', true), array('controller'=>'TypeUser', 'action' => 'edit', $typeUser->id_type_user), array('class'=>'btn btn-primary')); ?>
        </div>
        <div class="col-md-2">
            <?= $this->Form->postLink(__('Eliminar Tipo Usuario', true), array('controller'=>'TypeUser', 'action' => 'delete', $typeUser->id_typeuser), array ('class'=>'btn btn-primary','confirm' => __('Esta seguro que quiere eliminar?', $typeUser->id_type_user))); ?>
        </div>
        <div class="col-md-2">
            <a href="/Control-Practica_Beta/TypeUser/index">
                <button class="btn btn-primary">
                    Volver Atrás
                </button>
            </a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="Container-Data col-md-6">
            <div class="Container-Info Col-md-12">
                <center>
                    <label class="Label-Fields display-4">
                        ID Tipo Usuario:                          
                    </label>
                    <label class="Label-Data Display-4">
                        <?= $this->Number->format($typeUser->id_type_user) ?>
                    </label><br>
                    <label class="Label-Fields display-4">
                        Tipo Usuario:                          
                    </label>
                    <label class="Label-Data Display-4">
                        <?= h($typeUser->type_user) ?>
                    </label><br>
                    <label class="Label-Fields display-4">
                        Descripción:                          
                    </label>
                    <label class="Label-Data Display-4">
                        <?= h($typeUser->description) ?>
                    </label>
                </center>
            </div>
        </div>
    </div>
</div>