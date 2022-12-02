<?php
    class CConexion {

        public static function IniciarSesion(){
            $host = "localhost";
            $dbname = "estetica_qp";
            $username = "postgres";
            $pasword = "miguel";

            $correo;
            $contrasena;

            $correotemp;
            $contrasenatemp;

            if($_POST){
                $correo = $_POST["correo"];
                $contrasena = $_POST["contrasena"];
                if($correo!="" || $contrasena!=""){
                    try{
                        $conn = new PDO ("pgsql:host=$host; dbname=$dbname", $username, $pasword);
                    }
                    catch( PDOException $exp){
                        echo ("No se pudo enlazar con la base de datos, $exp");
                    }            
                        $sql="SELECT * FROM clientes WHERE correo='$correo' AND contrasena='$contrasena'";
                        $conn->query($sql);

                        foreach($conn->query($sql) as $row){
                            $correotemp = $row['correo'];
                            $contrasenatemp = $row['contrasena'];
                        }

                        if($correo == $correotemp && $contrasena == $contrasenatemp){
                            echo ('<script language="javascript">alert("Iniciaste sesion");</script>');
                        }else{
                            echo ("no se encontrao el usuario!!");
                        }
                }else{
                    echo '<script language="javascript">alert("Dejaste espacios vacios!");</script>';
                }
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
