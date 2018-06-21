<?= $this->Html->css('login') ?>
<?= $this->Html->script('hide') ?>
    <link rel="stylesheet" href="/css/estilos.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald:100,100,100' rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<style>
    .container-fluid{
        background-color: #FDC26D;
        border: 3px solid orange; 
        margin-top: 5%;
        height: 30%;
        width: 40%;
        padding: 20px;
    }
    .Title{
        margin-bottom: 4vh;
    }
    .btn{
        cursor: pointer;
    }
    @media only screen and (max-width: 768px) {
        [class*="container-fluid"]{
            width: 100%;
            height: 100%;
            margin-top: 10vh;
        }
        [class*="Title"]{
            font-size: 40px;
        }
    }
</style>
<center><div class="login-page ">
    <div class="container-fluid">
        <label class="Title display-4">Iniciar Sesión</label>
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create() ?>
            <?= $this->Form->input('user_name',['placeholder'=>'Nombre','label'=>false],'required') ?>
            <?= $this->Form->input('user_pass',['placeholder'=>'Contraseña','label'=>false,'type'=>'password'],'required') ?>
            <?= $this->Form->button('Ingresar',['id'=>'boton', 'class'=>'btn btn-primary']) ?>
        <?= $this->Form->end() ?>

  </div>
</div></center>
