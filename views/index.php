<?php
include "../controllers/layout.php";
Head();
ComHeader();
Home();

  session_start();

  if (empty($_SESION¨["root"]) && empty($_SESSION["admin"]) && empty($_SESSION["client"])){
    echo '<div class="col-3 container bg-dark text-center text-white rounded mt-5 p-4">
            <h3>¡Bienvenido!</h3>
            <p class="mt-4">Regístrece o inicie sesión.</p>
            <a href="regB.php" class="badge badge-pill badge-primary p-2">Registrarse</a>
            <a href="inicio_miembro.php" class="badge badge-pill badge-success p-2">Iniciar sesión</a>
          </div>';
      exit();
  }else{
    echo '<div class="col-3 container bg-dark text-center text-white rounded mt-5 p-3">      
            <p class="mt-4">Está logueado otro usuario.</p>
            <a href="logout.php" class="badge badge-pill badge-orange p-2">Cerrar sesión</a>
        </div>';          
  }

Script();
?>
