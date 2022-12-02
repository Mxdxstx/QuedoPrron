<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sesion.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <title>Inicio de Sesion</title>
</head>
<body>
    <header class="encabezado">
        <div class="top">
            <div class="nombre">
                <a href="index.html">
                    <img src="imagenes/logo.png" alt="Quedo perron logo">
                </a>
            </div>
            <div class="ingresar">
                <a href="sesion.html" class="active">Ingresar</a>
                <P> | </P>
                <a href="registro.php">Registrarse</a>
            </div>
        </div>
        <div class="menu">
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <nav class="menu_nav">
                <ul class="m-0">
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="servicios.html">Servicios</a></li>
                    <li><a href="citas.html">Citas</a></li>
                    <li><a href="contacto.html" >Contacto</a></li>
                </ul>
                
            </nav>
            
        </div>
        
    </header>
    
    <form action="sesion.php" method="POST">
    <div class="modal-dialog text-center" style="z-index: 1">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="imagenes/usuario.png" alt="">
                </div>
                <form class="col-12">
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Correo" name="correo">
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control" placeholder="Contraseña" name="contrasena">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Ingresar </button>
                </form>
                <div class="col-12 forgot">
                    <a href="#" class="">Recordar Contraseña</a>
                </div>
                <div class="col-12 forgot">
                    <a href="registro.html" class="">Registrarse</a>
                </div>
            </div>
        </div>
    </div>
    </form>

    <?php
        if(isset($_POST['correo']) && isset($_POST['contrasena'])){
            include_once("conexion.php");
            CConexion::IniciarSesion();
        }
    ?>

    <footer>
        <hr>
        <div class="footer1">
            <div class="redes">
                <div><b>Redes sociales</b></div><br>

                <a href="https://www.facebook.com" target="_blank" id="fb" class="icon icon-facebook"></a>
                                    <label for="fb">Facebook</label>
                <a href="https://www.instagram.com" target="_blank" id="ig" class="icon icon-instagram"></a>
                                    <label for="ig">Instagram</label>

            </div><br>
            <div class="telefonos">
                <div><b>Teléfonos de contacto:</b></div><br>
                <ul>
                    <li><a href="tel:">(656)-123-45-67</a></li>
                    <li><a href="tel:">(656)-675-43-21</a></li>
                    <li><a href="tel:">01-800-123-4567</a></li>
                </ul>
            </div><br>
            <div class="correo">
                <div><b>Mandanos un correo:</b></div><br>
                <ul>
                    <li><a href="mailto:">negocios@esteticaqp.com</a></li>
                    <li><a href="mailto:">esteticaqp@mail.com</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/0f19cc5890.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>