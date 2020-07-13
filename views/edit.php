<?php
include "../controllers/layout.php";
Head();
ComHeader();
Home();
    
    $dni2 = $_POST["dni2"];
    $nName2 = $_POST["nick2"];
    $pWord2 = $_POST["code2"];
    $fName2 = $_POST["nombre2"];
    $lName2 = $_POST["apellido2"];
    $email2 = $_POST["email2"];
    $phone2 = $_POST["telefono2"];

        if ($conexion = mysqli_connect("127.0.0.1", "root","")) {

            if ($e = "SELECT * FROM users WHERE dni='$dni2'") {
                mysqli_select_db($conexion, "project");
                $moda = mysqli_query($conexion, $e);
                $dato4 = mysqli_fetch_array($moda);

                echo '<div class="col-3 container bg-dark text-center text-white rounded mt-5 p-3">';
            
                if ($dato4['dni'] == $dni2) {
                    $consulta = "UPDATE users SET nickname='$nName2', code='$pWord2', name='$fName2', lastname='$lName2', email='$email2', phone='$phone2' WHERE dni=$dni2";
                    mysqli_query($conexion, $consulta);
                    echo '<p>Se actualizó correctamente.</p>';
                }else{
                    header("Location: user.php");
                }
                echo '<a href="user.php" class="badge badge-pill badge-warning text-white p-2">Volver</a>
                    </div>';
            }else{
                echo "<p>Registrate maquinola.</p>";
            }     
        }else {
            echo"<p>MySQL no reconoce ese usuario y password.</p>";
        } 
          
Script();
?>
