<?php error_reporting(0)?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <style>
            .Etiqueta{
                font-size: 30px;  
                font-weight: bold;
            }
            .Datos{
                font-size: 30px;  
            }
            .Control{
                width: 40vw; 
                float: right; 
                margin-top: 5vh;
            }
        </style>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script src="js/global.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

    </head>
    <body>
        <div>
            <div class="Info" 
               style="width: 40vw; height: 80vh; float: left; margin-top: 5vh; border: 2px solid orange; border-top-left-radius: 35px; border-bottom-right-radius: 35px;">
                <center><img src="img/user.jpg" alt="..." class="" style="margin-top: -5vh; margin-bottom: 2vh; border-radius: 50px;"></center>
                <?php foreach ($query as $key => $value): ?>
                <center><label class="Etiqueta display-4">Rut: <label class="Datos display-4"><?php echo $value->rut_person?></label></label></center>
                <center><label class="Etiqueta display-4">Nombre: <label class="Datos display-4"><?php echo $value->name_person?></label></center></label>
                <center><label class="Etiqueta display-4">Tipo de Usuario: <label class="Datos display-4"><?php echo $value->TypeUser['type_user']?></label></label></center>
                <center><label class="Etiqueta display-4">Dirección: <label class="Datos display-4"><?php echo $value->address_person?></label></label></center>
                <center><label class="Etiqueta display-4">Correo: <label class="Datos display-4"><?php echo $value->mail_person?></label></label></center>
                <?php endforeach ?>

                <div class="d-flex justify-content-center d">
                    <!-- sacar el boton si el user es practicante-->
                    <?php if ($value->TypeUser['type_user']== 'Admin'): ?>

                        <a href="/User/admin"><button class="btn btn-info"
                        style="font-size: 20px; cursor: pointer;">Administrador</button></a>     
                     <?php endif ?>  



                </div>

               

            

            </div>    
        </div>
        <div>
           <form method="post" class="Formulario">
                <div class="Control" 
                   style="width: 40vw; height: 80vh; float: right; margin-top: 5vh; border: 2px solid orange; border-top-right-radius: 35px; border-bottom-left-radius: 35px;">
                    <center><h3 class="display-3" style="margin-top: 5vh; margin-bottom: 8vh; font-size: 45px;">CONTROL DE HORARIO</h3></center>
                  
                        
                        <div id="container" style="min-width: 300px; height: 300px; max-width: 500px; margin: 0 auto"></div>
                   
                     <?php if ($value->HistoryHour['active']== '0' || $value->HistoryHour['active']== ''): ?>
                          <center>
                        <input type="submit" class="btn btn-primary btn-lg" id="btnIniciar" 
                        style="margin-top: 4vh; margin-bottom: 5vh; font-size:20px; cursor:pointer;" 
                        value="Iniciar Día" data-submit-value="Día Iniciado" name="iniciar"> 
                    </center>
                    <?php endif ?> 
                   
                  

                    <?php if ($value->HistoryHour['active']== '1' ): ?>
                         <center><button class='btn btn-success btn-lg' style='font-size:20px; cursor:pointer;' name='terminar'>Terminar Día</button></center>
                    <?php endif ?> 
                    
                </div>         
            </form>           
        </div>
          

    </body>
</html>
<script type="text/javascript">
                Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: '',
        align: 'center',
        verticalAlign: 'middle',
        y: 40
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: 'bold',
                    color: 'white'
                }
            },
            startAngle: -90,
            endAngle: 90,
            center: ['50%', '75%']
        }
    },
    series: [{
        type: 'pie',
        name: 'Horarios Practica',
        innerSize: '50%',
        data: [
            ['Horas Trabajadas', <?php print_r($horarios[0]) ?>],
            ['Horas Restantes',   <?php print_r(($horarios[1])) ?>],
           
            {
                name: 'Proprietary or Undetectable',
                y: 0.2,
                dataLabels: {
                    enabled: false
                }
            }
        ]
    }]
});
                
</script>