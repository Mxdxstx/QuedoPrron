<?php
    class CConexion {
        public static function consultarCita(){
            $host = "dpg-ce4fsdha6gdivt60e090-a.oregon-postgres.render.com";
            $dbname = "prueba1_9ceo";
            $username = "prueba1_9ceo_user";
            $pasword = "PUSaKh8Rt3HZBsufsp1cnhvJTAuqjoCn";

            $idcita="";

            $idcitatemp="";

            if($_POST){
                $idcita = $_POST["id_cita"];
                if($idcita!=""){
                    try{
                        $conn = new PDO ("pgsql:host=$host; dbname=$dbname", $username, $pasword);
                    }
                    catch( PDOException $exp){
                        echo ("No se pudo enlazar con la base de datos, $exp");
                    }           

                    //SELECT c.id_cita,c.correo,c.fecha,c.nombre_mascota,c.raza_mascota,s.nombre,s.precio FROM citas AS c,servicios AS s WHERE c.id_cita=1 AND c.id_servicio=s.id_servicio;
                        $sql="SELECT c.id_cita,c.correo,c.fecha,c.nombre_mascota,c.raza_mascota,s.nombre,s.precio FROM citas AS c,servicios AS s WHERE c.id_cita = $idcita AND c.id_servicio = s.id_servicio";
                        $conn->query($sql);

                        foreach($conn->query($sql) as $row){
                            $idcitatemp = $row['id_cita'];
                        }

                        if($idcita == $idcitatemp){
                            $html="";
                            foreach($conn->query($sql) as $row){
                                print "<br> <b>No. de cita: </b>".$row['id_cita']."<br>";
                                print "<b>Correo: </b>".$row['correo']."<br>";
                                print "<b>Fecha: </b>".$row['fecha']."<br>";
                                print "<b>Nombre de la mascota: </b>".$row['nombre_mascota']."<br>";
                                print "<b>Raza: </b>".$row['raza_mascota']."<br>";
                                print "<b>Servicio: </b>".$row['nombre']."<br>";
                                print "<b>Precio: </b>$". $row['precio']." MXN<br>";
                            }


                        }else{
                            echo ('<script language="javascript">alert("No se ha encontrado la cita ingresada");</script>');
                        }
                }else{
                    echo '<script language="javascript">alert("Dejaste espacios vacios!");</script>';
                }
            }
        }

        public static function registrarcita(){
            $host = "dpg-ce4fsdha6gdivt60e090-a.oregon-postgres.render.com";
            $dbname = "prueba1_9ceo";
            $username = "prueba1_9ceo_user";
            $pasword = "PUSaKh8Rt3HZBsufsp1cnhvJTAuqjoCn";

            $correo;
            $nombre_mascota;
            $raza;
            $id_servicio;
            $fecha;

            if($_POST){
                if(isset($_POST['correo']) && isset($_POST['nom_mascota']) &&
                    isset($_POST['raza']) && isset($_POST['id_servicio'])
                    && isset($_POST['fecha'])){
                        $correo = $_POST["correo"];
                        $nombre_mascota= $_POST["nom_mascota"];
                        $raza = $_POST["raza"];
                        $fecha = $_POST["fecha"];
                        $id_servicio = $_POST["id_servicio"];
                        
                        if($correo!="" || $nombre_mascota!="" || $raza!=""
                            || $id_servicio!="" || $fecha!=""){
                                try{
                                    $conn = new PDO ("pgsql:host=$host; dbname=$dbname", $username, $pasword);
                                }
                                catch( PDOException $exp){
                                    echo ("No se pudo enlazar con la base de datos, $exp");
                                }

                                $sql="INSERT INTO citas (correo,fecha,id_servicio,nombre_mascota,raza_mascota) VALUES ('$correo','$fecha','$id_servicio','$nombre_mascota','$raza')";

                                $sql=$conn->prepare($sql);
                                $sql->execute();
                                
                                echo '
                                <script language="javascript">alert("Cita registrada con éxito");</script>
                                ';

                                $sql_id_cita = "SELECT id_cita FROM citas WHERE correo='$correo' AND fecha = '$fecha'
                                AND id_servicio = '$id_servicio' AND nombre_mascota = '$nombre_mascota' AND raza_mascota = '$raza'";
                               echo"<h4>Los datos de su cita son</h4>";
                               foreach($conn->query($sql_id_cita) as $row){
                                    print "<br> <b>No. de cita: </b>".$row['id_cita']."<br>";
                                }
                               
                               
                            }else{
                                echo '<script language="javascript">alert("Dejaste espacios vacios!");</script>';
                            }
                }else{
                    echo "Dejaste datos en blanco";
                }
            }
        }
    }
?>
