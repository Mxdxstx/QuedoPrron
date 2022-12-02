<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/citas.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <title> Estética canina | Citas</title>
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
                <a href="sesion.php">Ingresar</a>
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
                    <li><a href="citas.php" class="active">Citas</a></li>
                    <li><a href="contacto.html">Contacto</a></li>
                </ul>
                
            </nav>
            
        </div>
        
    </header>
    <section class="main">
        <form action="citas.php" method="POST">
            <div class="citas">
                <h2>Consulta tus citas</h2>
                <p>Ingresa tu numero de cita</p>
                <input type="text" class="form-control" name="id_cita" placeholder="No. Cita" id="id_cita">
                <input type="submit" value="Consultar">

                <?php
                    if(isset($_POST['id_cita'])){
                        include_once("conexion.php");
                        CConexion::IniciarSesion();
                    }
                ?>
            </div>
        </form>

        <hr>
        
        <h3>Agenda tu cita</h3>
        <form class="agendar" action="citas.php" method="POST">
            <div class="datos">
                <div>
                    <p>Correo: <br>
                    <input type="text" name="correo" id="correo">
                    </p>
                </div>
                <div>
                    <p>Nombre de tu mascota: <br>
                    <input type="text" name="nom_mascota" id="nom_mascota">
                    </p>
                </div>
                <div>
                    <p>Raza: <br>
                    <input type="text" name="raza" id="raza">
                    </p>
                </div>
                <div>
                    <p>Servicio: <br>
                    <select name="id_servicio" id="id_servicio">
                        <option value="corte_min">Corte Mini</option>
                        <option value="corte_med">Corte Mediano</option>
                        <option value="corte_gra">Corte Grande</option>
                        <option value="limp_bas">Limpieza Básica</option>
                        <option value="limp_prof">Limpieza Profunda</option>
                        <option value="limp_per">Limpieza Perrona</option>
                        <option value="limp_oido">Limpieza de Oído</option>
                        <option value="corte_u">Corte de uñas</option>
                        <option value="limp_dent">Limpieza Dental</option>
                    </select>
                    </p>
                </div>
                <div>
                    <p>
                        Fecha: <br>
                        <input type="date" name="fecha" id="fecha">
                    </p>
                </div>
                <input class ="btn_enviar" type="submit" value="Registrar cita">
            </div>
            <div class="imagen">
                <img src="imagenes/agenda.png" alt="Imagen de agenda">
            </div>

            
        </form>

        <?php
            if(isset($_POST['correo']) && isset($_POST['nom_mascota']) &&
            isset($_POST['raza']) && isset($_POST['id_servicio'])
            && isset($_POST['fecha'])){
                include_once("conexion.php");
                CConexion::registrarcita();
            }
        ?>

    </section>
    <footer>
        <hr>
        <div class="footer1">
            <div class="redes">
                <b>Redes sociales</b>
                <div>
                    <a href="https://www.facebook.com" target="_blank" id="fb" class="icon icon-facebook"></a>
                    <label for="fb">Facebook</label>
                </div><br>
                <div>
                    <a href="https://www.instagram.com" target="_blank" id="ig" class="icon icon-instagram"></a>
                    <label for="ig">Instagram</label>
                </div>
            </div>
            <div class="telefonos">
                <b>Teléfonos de contacto:</b>
                <ul>
                    <li><a href="tel:">(656)-123-45-67</a></li>
                    <li><a href="tel:">(656)-675-43-21</a></li>
                    <li><a href="tel:">01-800-123-4567</a></li>
                </ul>
            </div>
            <div class="correo">
                <b>Mandanos un correo:</b>
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