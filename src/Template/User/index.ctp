<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $person
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
        Listado de Usuarios
    </label>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 offset 1">
            <a href="/Control-Practica_Beta/User/add">
                <button type="button" class="btn btn-primary">
                    Agregar Usuario
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
                        <th scope="col" class="Text-Table display-4">ID Usuario</th>
                        <th scope="col" class="Text-Table display-4">Nombre Usuario</th>
                        <th scope="col" class="Text-Table display-4">Clave</th>
                        <th scope="col" class="Text-Table actions" class="display-4"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user as $user): ?>
                        <tr>
                            <td><?= $this->Number->format($user->id_user) ?></td>
                            <td><?= h($user->user_name) ?></td>
                            <td>* * * * *</td>
                            <td class="actions">
                                <?= $this->Html->link('Ver', ['action' => 'view', $user->id_user]) ?>
                                <?= $this->Html->link('Editar', ['action' => 'edit', $user->id_user]) ?>
                                <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $user->id_user], ['confirm' => __('Esta seguro que quiere eliminar?', $user->id_user)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>