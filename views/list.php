<?php
include "../controllers/layout.php";
Head();
ComHeader();
Home();

    if($conexion = mysqli_connect("127.0.0.1", "root", "")){

        if ($i = "SELECT * FROM users") {
            mysqli_select_db($conexion, "project");
            $ver = mysqli_query($conexion, $i);

            echo'<div class="col-1 container text-center mt-5"> 
                        <a href="user.php" class="badge badge-pill badge-warning text-white p-2">Volver</a>
                     </div>';

            echo '<div class="col-10 container d-flex flex-wrap justify-content-around bg-dark text-center text-navy-dark rounded mt-5 p-3">';

            while ($l1 = mysqli_fetch_array($ver)) {             
                echo '<div class="col-3 d-flex flex-wrap justify-content-around bg-teal-light rounded m-3 p-2">
                        <img src="'.$l1['image'].'">
                        <a class="mt-2 text-navy-dark" href="">'.$l1['name'].' '.$l1['lastname'].'</a>
                    </div>';              
            }
                '</div>';
        }
    }

Script();
?>