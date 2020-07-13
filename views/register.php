<?php
include "../controllers/layout.php";
Head();
ComHeader();
Home();

    $dni = $_POST["dni"];
    $nName = $_POST["nick"];
    $pWord = $_POST["code"];
    $fName = $_POST["nombre"];
    $lName = $_POST["apellido"];
    $email = $_POST["email"];
    $phone = $_POST["telefono"];
    $value = $_POST['filter'];
    $image = "../images/noimage.jpg";
    
    if ($conexion = mysqli_connect("127.0.0.1", "root","")) {

        if ($q = "SELECT dni FROM users WHERE dni='$dni'") {
            mysqli_select_db($conexion, "project");
            $datos = mysqli_query($conexion, $q);

            if (mysqli_num_rows($datos) > 0) {
                echo '<div class="col-3 container bg-dark text-center text-white rounded mt-5 p-3"> 
                        <p>Ya está en la base de datos.</p>
                        <a href="user.php" class="badge badge-pill badge-warning text-white p-2">Volver</a>
                    </div>';
            }else{
                echo '<div class="col-2 container bg-dark text-center text-danger rounded mt-5 p-3">';

                switch ($value) {
                    case '1':
                        $consulta = "INSERT INTO users (id,dni,nickname,code,name,lastname,email,phone,type,image) 
                        VALUES ('','$dni','$nName','$pWord','$fName','$lName','$email','$phone','1','$image')";
                        mysqli_select_db($conexion, "project");
                        echo '<h5 class="mt-4">Nuevo root</h5>';
                        break;
                    case '2':
                        $consulta = "INSERT INTO users (id,dni,nickname,code,name,lastname,email,phone,type,image) 
                        VALUES ('','$dni','$nName','$pWord','$fName','$lName','$email','$phone','2','$image')";
                        mysqli_select_db($conexion, "project");
                        echo '<h5 class="mt-4">Nuevo admin</h5>';
                        break;
                    case '3':
                        $consulta = "INSERT INTO users (id,dni,nickname,code,name,lastname,email,phone,type,image) 
                        VALUES ('','$dni','$nName','$pWord','$fName','$lName','$email','$phone','3','$image')";
                        mysqli_select_db($conexion, "project");
                        echo '<h5 class="mt-4">Nuevo cliente</h5>';
                        break;
                }
                
                if (mysqli_query($conexion, $consulta)) {
                    echo '<p class="text-left text-white mt-4">Registro agregado.</p>';
                }else {
                    echo '<p class="text-left text-white mt-4">No se agregó...</p>';
                } 
                echo '<a href="user.php" class="badge badge-pill badge-warning text-white p-2">Volver</a>
                    </div>';  
            }      
        }else{
            echo "<p>Registrate maquinola.</p>";
        }
    }else {
        echo"<p>MySQL no reconoce ese usuario y password.</p>";
    } 

Script();
?>       