<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TypeUser[]|\Cake\Collection\CollectionInterface $typeUser
 */
?>
<style>
    .Container-Table{
        width: 100%;
        margin-top: 5vh;
    }
    .Text-Table{
        font-size: 18px;
        color: white;
    }
    .btn{
        float: left; 
        padding: 10px; 
        margin-top: 2vh;
        cursor: pointer;
    }
    @media only screen and (max-width: 768px) {
        .Title{
            font-size: 35px;
            margin-top: 5vh;
            margin-bottom: 5vh;
        }
        .Container-Table{
            margin-top: 2vh;
            width: 100%;
        }
    }
</style>
<div class="d-flex justify-content-center">
    <label class="Title display-3">
        Tipo de Usuarios
    </label>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 offset 1">
            <a href="/Control-Practica_Beta/TypeUser/add">
                <button type="button" class="btn btn-primary">
                    Agregar Tipo Usuario
                </button>
            </a>
        </div>
        <div class="col-md-1">
            <a href="/Control-Practica_Beta/User/admin">
                <button class="btn btn-primary">
                    Volver Atrás
                </button>
            </a>
        </div>
    </div>
</div>
<div class="Container-Table container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive-md">
                <thead class="bg-primary">
                    <tr>
                        <th scope="col" class="Text-Table display-4">ID Tipo Usuario</th>
                        <th scope="col" class="Text-Table display-4">Tipo Usuario</th>
                        <th scope="col" class="Text-Table display-4">Descripción</th>
                        <th scope="col" class="actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($typeUser as $typeUser): ?>
                        <tr>
                           <td><?= $this->Number->format($typeUser->id_type_user) ?></td>
                           <td><?= h($typeUser->type_user) ?></td>
                           <td><?= h($typeUser->description) ?></td>
                           <td class="actions">
                               <?= $this->Html->link(__('Ver'), ['action' => 'view', $typeUser->id_type_user]) ?>
                               <?= $this->Html->link(__('Editar'), ['action' => 'edit', $typeUser->id_type_user]) ?>
                               <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $typeUser->id_type_user], ['confirm' => __('Are you sure you want to delete # {0}?', $typeUser->id_type_user)]) ?>
                           </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>