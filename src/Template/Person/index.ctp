<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $person
 */
?>

<style>
    .Container-Table{
        width: 100%;
    }
    .Text-Table{
        font-size: 18px;
        color: white;
    }
    .btn{
        float: left; 
        padding: 10px; 
        margin-bottom: 2vh;
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
        Listado de Personas
    </label>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 offset 1">
            <a href="/Control-Practica_Beta/Person/add">
                <button type="button" class="btn btn-primary">
                    Agregar Persona
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
                        <th scope="col" class="Text-Table display-4">Rut</th>
                        <th scope="col" class="Text-Table display-4">ID Usuario</th>
                        <th scope="col" class="Text-Table display-4">Nombre</th>
                        <th scope="col" class="Text-Table display-4">Dirección</th>
                        <th scope="col" class="Text-Table display-4">Correo</th>
                        <th scope="col" class="Text-Table display-4">Tipo de Usuario</th>
                        <th scope="col" class="Text-Table actions" class="display-4"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query as $person): ?>
                        <tr>
                            <td><?=h($person->rut_person) ?></td>
                            <td><?= $this->Number->format($person->id_user) ?></td>
                            <td><?=h($person->name_person) ?></td>
                            <td><?=h($person->address_person) ?></td>
                            <td><?=h($person->mail_person) ?></td>
                            <td><?=h($person->TypeUser['type_user']) ?></td>
                            <td class="actions">
                                <?= $this->Html->link('Ver', ['action' => 'view', $person->rut_person]) ?>
                                <?= $this->Html->link('Editar', ['action' => 'edit', $person->rut_person]) ?>
                                <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $person->rut_person], ['confirm' => __('¿Estás seguro de eliminar este registro?', $person->rut_person)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
