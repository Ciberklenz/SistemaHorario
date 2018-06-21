<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"><!--Codificación para caracteres -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Web movil -->
        <!-- Librerias Asociadas -->
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script> 
        <script src="js/global.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script type='text/rocketscript' data-rocketsrc='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js?ver=3.3.1'></script>
        <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOlPzua-S6aDlvtfrRKor6nT6toC5QwNs&callback=initMap">
        </script>
        <!-- Estilos -->
        <style>
            *{
                box-sizing: border-box;
            }
            .Container-Data{
                margin-top:5vh; 
                margin-bottom:5vh;
            }
            .Container-Data-Api{
                margin-top: 5vh; 
                border: 3px solid orange; 
                border-radius: 45px;
            }
            .Title{
                margin-top: 3vh; 
                margin-bottom: 7vh; 
                font-size: 45px;
            }
            .Label-Fields{
                font-size: 30px;
                font-weight: bold;
            }
            .Label-Data{
                font-size: 30px;
            }
            .btn{
                font-size: 20px; 
                cursor: pointer;
            }
            .Container-Control{
                margin-top: 5vh; 
                border: 2px solid orange; 
                border-radius: 45px;
            }
            .Graphic{
                margin: auto;
                margin-top: -8vh;
                height: 100%; 
                width: 90%;
            }
            .Container-Hours-Worked{
                background-color: #A1FB79; 
                border: 2px solid green; 
                margin-bottom:10vh;
                border-radius: 15px;
                border-style: dotted;
            }
            .justify-content-around{
                margin-top: -5vh;
            }
            .Label-Hours{
                font-size: 24px;
            }
            .Hours{
                font-size: 55px;
            }
            .Container-Hours-Left{
                background-color: #FB7979; 
                border: 2px solid red; 
                margin-bottom:10vh; 
                border-radius: 15px;
                border-style: dotted;
            }
            .Btn-Start-Day{
                margin-bottom: 10vh; 
                font-size:20px; 
                cursor:pointer;
            }
            .Btn-Finish-Day{
                font-size:20px; 
                cursor:pointer; 
                margin-bottom: 10vh;
            }
            /*Para Dispositivos Móviles*/
            @media only screen and (max-width: 768px) {
                [class*="col-"] {
                    width: 100%;
                }
                [class*="Label-Fields"]{
                    font-size: 20px;
                }
                [class*="Label-Data"]{
                    font-size: 20px;
                }
                [class*="btn"]{
                    font-size: 14px;
                }
                [class*="Title"]{
                    font-weight: bold;
                    font-size:  20px;
                }
                [class*="Container-Hours-Worked"]{
                    width: 45%;
                    height: 30%;
                }
                [class*="Container-Hours-Left"]{
                    width: 45%;
                    height: 30%;
                }
                [class*="Label-Hours"]{
                    font-size: 10px;
                }
                [class*="Hours"]{
                    font-size: 22px;
                }
                [class*="Graphic"]{
                    margin-top: -7vh;
                    width: 100%;
                    height: 100%;
                }
            }
        </style>    
    </head>
    <body>
        <div class="Container-Data container-fluid">
            <div class="row justify-content-between">
                <div class="Container-Data-Api col-md-5">
                    <center>
                        <label class="Title display-3">
                            DATOS PERSONALES
                        </label>
                    </center>
                    <?php foreach ($query as $key => $value): ?>
                       <center>
                           <?=$this->Html->image('avatars/'.$value->url_photo, ['class'=>'img-thumbnail','style'=>'heigth:500px; width:250px'])?>
                       </center>
                       <center>
                            <br><label class="Label-Fields display-4">
                                Rut: 
                                <label class="Label-Data display-4">
                                    <?php echo $value->rut_person?>
                                </label>
                            </label>
                        </center>
                        <center>
                            <label class="Label-Fields display-4">
                                Nombre: 
                                <label class="Label-Data display-4">
                                    <?php echo $value->name_person?>
                                </label>
                            </label>
                        </center>
                        <center>
                            <label class="Label-Fields display-4">
                                Tipo de Usuario: 
                                <label class="Label-Data display-4">
                                    <?php echo $value->TypeUser['type_user']?>
                                </label>
                            </label>
                        </center>
                        <center>
                            <label class="Label-Fields display-4">
                                Dirección: 
                                <label class="Label-Data display-4">
                                    <?php echo $value->address_person?>
                                </label>
                            </label>
                        </center>
                        <center>
                            <label class="Label-Fields display-4">
                                Correo: 
                                <label class="Label-Data display-4">
                                    <?php echo $value->mail_person?>
                                </label>
                            </label>
                        </center>
                    <?php endforeach ?>
                    <div class="d-flex justify-content-center">
                        <?php if ($value->TypeUser['type_user']== 'Admin'): ?>
                            <a href="/Control-Practica_Beta/user/admin">
                                <button class="btn btn-info">
                                    Administrador
                                </button>
                            </a>
                        <?php endif ?>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php if ($value->TypeUser['type_user']== 'Admin'): ?>
                            <a href="/Control-Practica_Beta/PersonFactory/index">
                                <button class="btn btn-warning">
                                    Conexiones
                                </button>
                            </a>
                        <?php endif ?>
                    </div>
                </div>
                <div class="Container-Control col-md-6">
                    <form method="post" class="Formulario">
                        <center>
                            <label class="Title display-3">
                                CONTROL DE HORARIO
                            </label>
                        </center>
                        <div class="Graphic" id="container">     
                        </div>
                        <div class="row justify-content-around">
                            <div class="Container-Hours-Worked col-md-4">
                                <center>
                                    <label class="Label-Hours display-4">
                                        Horas Trabajadas
                                    </label><br>
                                    <label class="Hours display-3">
                                        <?php echo round($horarios[0])?>
                                    </label>
                                </center>
                            </div>
                            <div class="Container-Hours-Left col-md-4">
                                <center>
                                    <label class="Label-Hours display-4">
                                        Horas Restantes
                                    </label><br>
                                    <label class="Hours display-3">
                                        <?php echo round($horarios[1])?>
                                    </label>
                                </center>
                            </div>
                        </div>
                        <?php if ($value->HistoryHour['active']== '0' || $value->HistoryHour['active']== ''): ?>
                            <center>
                                <input type="submit" class="Btn-Start-Day btn-primary btn-lg"
                                value="Iniciar Día" id="btnIniciar" data-submit-value="Día Iniciado" name="iniciar">
                            </center>
                        <?php endif ?>
                        <?php if ($value->HistoryHour['active']== '1' ): ?>
                            <center>
                                <button class='Btn-Finish btn-success btn-lg' id="btnTerminar" name='terminar'>
                                    Terminar Día
                                </button>
                            </center>
                        <?php endif ?>
                        <input type="hidden" id="ipInput" name="value" />
                    </form> 
                </div>
            </div>
        </div>        
    </body>
    <script type="text/javascript">
        Highcharts.chart('container', 
        {
            height: 10,
            chart: 
            {
                plotBackgroundColor: null,
                plotShadow: false
            },
            title: 
            {
                text: '',
                align: 'center',
                verticalAlign: 'middle',
                y: 40
            },
            exporting: false,
            tooltip: 
            {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>',
                borderWidth: 0
            },
            plotOptions: 
            {
                pie: 
                {
                    dataLabels: 
                    {
                        enabled: true,
                        distance: -50,
                        style: 
                        {
                            fontWeight: 'bold',
                            color: 'white'
                        }
                    },
                    startAngle: -90,
                    endAngle: 90,
                    center: ['50%', '75%']
                }
            },             
            series: 
            [{
                type: 'pie',
                name: 'Horarios Practica',
                innerSize: '50%',
                data: 
                [
                    ['Horas Trabajadas', <?php print_r($horarios[0]) ?>],
                    ['Horas Restantes',   <?php print_r(($horarios[1])) ?>],
                    {
                        y: 0.2,
                        dataLabels: 
                        {
                            enabled: false
                        }
                    }
                ]
            }]
        });
    </script>

    <script type="application/javascript">

    function getIP(json) {

             var ipInicio = json.ip;

             $("#btnIniciar").click(function() {
             $("#ipInput").val(ipInicio);
             $.ajax({
                type: "POST",
                url: "http://localhost:8081/Control-Practica/Hour",
                data: {'ipInicio': ipInicio},
                cache: false,
                success: function(data) {
                 alert("Mi ip->>>>>>:"+ipInicio);
                }
                });      
        });
              return false;
    }

   
 

</script>

<script type="application/javascript" src="https://api.ipify.org?format=jsonp&callback=getIP"></script>

<script type="text/javascript">
     function getIP(json) {

             var ipTermino = json.ip;

             $("#btnTerminar").click(function() {
             $("#ipInput").val(ipTermino);
             $.ajax({
                type: "POST",
                url: "http://localhost:8081/Control-Practica/Hour",
                data: {'ipTermino': ipTermino},
                cache: false,
                success: function(data) {
                 alert("Mi ip->>>>>>:"+ipTermino);
                }
                });      
        });
              return false;
    }
</script>

<script type="application/javascript" src="https://api.ipify.org?format=jsonp&callback=getIP"></script>
</html>

