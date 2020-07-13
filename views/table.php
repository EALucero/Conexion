<?php
include "../controllers/layout.php";
Head();
ComHeader();
Home();

    session_start();

    if (empty($_SESSION["admin"]) && empty($_SESSION["client"]) && $_SESSION["root"]) {
        
        if ($conexion = mysqli_connect("127.0.0.1", "root","")) {

            if ($l = "SELECT * FROM users WHERE type") {
                mysqli_select_db($conexion, "project");
                $d1 = mysqli_query($conexion, $l);
                $show1 = mysqli_fetch_array($d1);
                
                echo'<div class="col-1 container text-center mt-5"> 
                        <a href="user.php" class="badge badge-pill badge-warning text-white p-2">Volver</a>
                     </div>';

                switch ($show1['type']) {

                    case '1':
                        RootTable();

                    case '2':
                        AdminTable();

                    case '3':
                        break;
                }
            }
        }

    }elseif (empty($_SESSION["root"]) && empty($_SESSION["client"]) && $_SESSION["admin"]) {
        
        if ($conexion = mysqli_connect("127.0.0.1", "root","")) {

            if ($m = "SELECT * FROM users WHERE type") {
                mysqli_select_db($conexion, "project");
                $d2 = mysqli_query($conexion, $m);
                $show2 = mysqli_fetch_array($d2);
                
                echo'<div class="col-1 container text-center mt-5"> 
                        <a href="user.php" class="badge badge-pill badge-warning text-white p-2">Volver</a>
                     </div>';

                switch ($show2['type']) {

                    case '1':

                    case '2':
                        AdminTable();

                    case '3':
                        ClientTable();
                        break;
                }
            }
        }
    }elseif (empty($_SESSION["root"]) && empty($_SESSION["admin"]) && $_SESSION["client"]) {
        echo "<strong>Client</strong><br>";
        FormCamp();
    }else {
        header("Location: index.php");
        exit();
    }

Script();
?>