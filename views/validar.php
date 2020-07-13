<?php
include "../controllers/layout.php";
Head();
ComHeader();
Home();

    $nName = $_POST['usuario'];
    $pWord = $_POST['contraseña'];

    if($conexion = mysqli_connect("127.0.0.1", "root", "")){

        if ($q = "SELECT * FROM users WHERE nickname='$nName' and code='$pWord'") {
            mysqli_select_db($conexion, "project");
            $reg = mysqli_query($conexion, $q);
            $dato = mysqli_fetch_array($reg);
  
            if ($dato['nickname'] == $nName && $dato['code'] == $pWord) {

                switch ($dato['type']) {
                    
                    case '1':
                        session_start();
                        $_SESSION["root"] = $nName;
                        header("Location: user.php");
                        break;

                    case '2':
                        session_start();
                        $_SESSION["admin"] = $nName;
                        header("Location: user.php");
                        break;
                    
                    case '3':
                        session_start();
                        $_SESSION["client"] = $nName;
                        header("Location: user.php");
                        break;
                }

            }else {
                header ("Location: regB.php");
            }
        }else{
            echo "<p>No corresponde a un miembro</p>";
        }
    }
  
Script();
?>

