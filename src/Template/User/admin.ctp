<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Administrador</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Web movil -->
        <style>
            .Container-Menu{
                margin-top: 10vh;
                background-color: #FDC26D;
                border: 3px solid orange;
                border-radius: 15px;
            }
            .Title{
                margin-top: 5vh;
            }
            .img-fluid{
                margin-top: -5vh;
                border-radius: 70px;
            }
            .Label-Menu{
                font-size: 40px;
                color: black;
                cursor: pointer;
            }
            .Label-Menu:hover{
                color: white;
            }
            .btn{
                margin-top: 2vh;
                cursor: pointer;
            }
            @media only screen and (max-width: 768px) {
                [class*="col-"] {
                    width: 100%;
                }
                [class*="Title"]{
                    font-size: 40px;
                }
                [class*="Container-Menu"]{
                    width: 40%;
                    height: 40%;
                    margin-top: 8vh;
                }
                [class*="Label-Menu"]{
                    font-size: 20px;
                }
            }
        </style>
    </head>
    <body>
        <div class="d-flex justify-content-center">
            <label class="Title display-3">Administrador</label>
        </div>  
        <div class="row justify-content-end">
            <div class="col-md-1">
                <a href="/Control-Practica_Beta/Hour/index">
                    <button class="btn btn-primary">
                        Volver Atrás
                    </button>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="Container-Menu col-md-2">
                    <center>
                        <img src="../img/person.jpg" class="img-fluid">
                    </center>
                    <center>
                        <a href="/Control-Practica_Beta/person/index">
                            <label class="Label-Menu display-4">
                                Persona
                            </label>
                        </a>
                    </center>
                </div>
                <div class="Container-Menu col-md-2">
                    <center>
                        <img src="../img/user.jpg" class="img-fluid">
                    </center>
                    <center>
                        <a href="/Control-Practica_Beta/User/index">
                            <label class="Label-Menu display-4">
                                Usuario
                            </label>
                        </a>
                    </center>
                </div>
                <div class="Container-Menu col-md-2">
                    <center>
                        <img src="../img/person.jpg" class="img-fluid">
                    </center>
                    <center>
                        <a href="/Control-Practica_Beta/TypeUser/index">
                            <label class="Label-Menu display-4">
                                Tipo Usuario
                            </label>
                        </a>
                    </center>
                </div>
                <div class="Container-Menu col-md-2">
                    <center>
                        <img src="../img/Horas.jpg" class="img-fluid">
                    </center>
                    <center>
                        <a href="/Control-Practica_Beta/Hour/add">
                            <label class="Label-Menu display-4">
                                Horas
                            </label>
                        </a>
                    </center>
                </div>
            </div>
        </div>
    </body>
</html>
