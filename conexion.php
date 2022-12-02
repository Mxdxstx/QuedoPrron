<?php
    class CConexion {
        public static function IniciarSesion(){
            $host = "localhost";
            $dbname = "estetica_qp";
            $username = "postgres";
            $pasword = "miguel";

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
                            echo ('<script language="javascript">alert("Iniciaste sesion");</script>');
                            foreach($conn->query($sql) as $row){
                                print $row['id_cita']."<br>";
                                print $row['correo']."<br>";
                                print $row['fecha']."<br>";
                                print $row['nombre_mascota']."<br>";
                                print $row['raza_mascota']."<br>";
                                print $row['nombre']."<br>";
                                print $row['precio']."<br>";
                            }


                        }else{
                            echo ('<script language="javascript">alert("no se encontrao el usuario!!");</script>');
                        }
                }else{
                    echo '<script language="javascript">alert("Dejaste espacios vacios!");</script>';
                }
            }
        }

        public static function registrarcita(){
            $host = "localhost";
            $dbname = "estetica_qp";
            $username = "postgres";
            $pasword = "miguel";

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
