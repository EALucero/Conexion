<?php
include "../controllers/layout.php";
Head();
ComHeader();
Home();

    $dni = $_POST["dni"];

    if ($conexion = mysqli_connect("127.0.0.1", "root","")) {

        if ($d = "SELECT * FROM users WHERE dni='$dni'") {
            mysqli_select_db($conexion, "project");
            $datos = mysqli_query($conexion, $d);
            $dato2 = mysqli_fetch_array($datos);

            if ($dato2['dni'] == $dni) {
                mysqli_select_db($conexion, "project");
                $consulta = "DELETE FROM users WHERE dni='$dni'";

                echo '<div class="col-3 container bg-dark text-center text-white rounded mt-5 p-3">';
            
                if (mysqli_query($conexion, $consulta)) {
                    echo "<p>Registro eliminado.</p>";
                }else {
                    echo "<p>No se borró...</p>";
                }
                echo '<a href="user.php" class="badge badge-pill badge-warning text-white p-2">Volver</a>
                    </div>';
            }else{
                header("Location: user.php");
            }
        }else{
            echo "<p>Registrate maquinola.</p>";
        }
    }else {
        echo"<p>MySQL no reconoce ese usuario y password.</p>";
    }
    
Script();
?>