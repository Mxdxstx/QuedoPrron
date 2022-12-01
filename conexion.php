<?php
    class CConexion {

        public static function ConexionBD(){
            $host = "localhost";
            $dbname = "estetica_qp";
            $username = "postgres";
            $pasword = "miguel";

            try{
                $conn = new PDO ("pgsql:host=$host; dbname=$dbname", $username, $pasword);
                echo "Enlace a la Base de Datos realizado correctamente<br>";
            }
            catch( PDOException $exp){
                echo ("No se pudo enlazar con la base de datos, $exp");
            }

            $sql='Select * FROM servicios';
            foreach($conn->query($sql) as $row){
                print $row['id_servicio']."\t";
                print $row['nombre']."\t";
                print $row['descripcion']."\t";
                print $row['precio']."\t";
                echo"<br>";
            }

        }

        public static function registrarcliente(){
            $host = "localhost";
            $dbname = "estetica_qp";
            $username = "postgres";
            $pasword = "miguel";

            $correo;
            $contrasena;
            $nombre;
            $apellido;
            $telefono;
            if($_POST){
                if(isset($_POST['correo']) && isset($_POST['contrasena']) &&
                    isset($_POST['nombre']) && isset($_POST['apellido'])
                    && isset($_POST['telefono'])){
                        $correo = $_POST["correo"];
                        $contrasena = $_POST["contrasena"];
                        $nombre = $_POST["nombre"];
                        $apellido = $_POST["apellido"];
                        $telefono = $_POST["telefono"];
                        
                        if($correo!="" || $contrasena!="" || $nombre!=""
                            || $apellido!="" || $telefono!=""){
                                try{
                                    $conn = new PDO ("pgsql:host=$host; dbname=$dbname", $username, $pasword);
                                    
                                }
                                catch( PDOException $exp){
                                    echo ("No se pudo enlazar con la base de datos, $exp");
                                }
                                
                                $sql="INSERT INTO clientes VALUES('$correo','$contrasena','$nombre','$apellido','$telefono')";
                                
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
