<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonFactory[]|\Cake\Collection\CollectionInterface $personFactory
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>tabla de ips de conexion</title>
    <style>
        .a{background: black;}
    </style>
</head>
<body>

    <div>
      <label>IP vtr: 190.164.28.165</label><br>
      <label>IP movistar:186.106.253.20</label>
    </div>
    <div class="d-flex p-2">

        <table class="table table-striped">
             <thead>
                 <tr class="bg-primary">
                    <th>id conexion</th>
                    <th>rut persona</th>
		    <th>id factory
                 </tr>
             </thead>
            <?php foreach ($query as $key => $value): ?>

             <tbody>
                <tr>
                    <td><?= $value->id_person_factory?></td>
                    <td><?= $value->rut_person?></td>
                    <td><?= $value->Factory['id_factory'] ?></td>
  

                </tr>
             </tbody>
             <?php endforeach ?>
        </table>
    </div>

</body>
</html>
