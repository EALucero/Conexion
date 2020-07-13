<?php

//Zona de tablas.
function RootTable()
{
    if ($conexion = mysqli_connect("127.0.0.1", "root","")) {

        if ($r = "SELECT * FROM users WHERE type") {
            mysqli_select_db($conexion, "project");
            $datos1 = mysqli_query($conexion, $r);
    
            $tablaRoots = array("id","dni","nickname","code","name","lastname","email","phone","type");
             echo '<table class="col-11 table table-sm table-bordered table-striped table-dark text-left m-5">
                    <tr class="bg-dark">
                        <th colspan=11 class="text-center text-primary">Root</th>
                    </tr>
                    <tr class="bg-info">';
                        foreach ($tablaRoots as $raiz) {echo "<td class='text-center'>$raiz</td>";}
                    '</tr>'; 

            while ($f1 = mysqli_fetch_array($datos1)) {
                
                if ($f1['type'] == 1) {
                    echo '<tr>
                        <td class="text-center">'.$f1["id"].'</td>
                        <td>'.$f1["dni"].'</td>  
                        <td>'.$f1["nickname"].'</td>
                        <td>'.$f1["code"].'</td>
                        <td>'.$f1["name"].'</td>
                        <td>'.$f1["lastname"].'</td>
                        <td>'.$f1["email"].'</td> 
                        <td>'.$f1["phone"].'</td>  
                        <td class="text-center">root</td>                             
                    </tr>'; 
                }                           
            }
                '</table>';
        }
    }
}

function AdminTable()
{
    if ($conexion = mysqli_connect("127.0.0.1", "root","")) {

        if ($a = "SELECT * FROM users WHERE type") {
            mysqli_select_db($conexion, "project");
            $datos2 = mysqli_query($conexion, $a);

            $tablaAdmins = array("id","dni","nickname","code","name","lastname","email","phone","type");
            echo '<table class="col-11 table table-sm table-bordered table-striped table-dark text-left m-5">
                    <tr class="bg-dark">
                        <th colspan=11 class="text-center text-primary">Admin</th>
                    </tr>
                    <tr class="bg-info">';
                        foreach ($tablaAdmins as $istrador) {echo "<td class='text-center'>$istrador</td>";}
                    '</tr>'; 

            while ($f2 = mysqli_fetch_array($datos2)) {

                if ($f2['type'] == 2) {
                    echo '<tr>
                        <td class="text-center">'.$f2["id"].'</td>
                        <td>'.$f2["dni"].'</td>  
                        <td>'.$f2["nickname"].'</td>
                        <td>'.$f2["code"].'</td>
                        <td>'.$f2["name"].'</td>
                        <td>'.$f2["lastname"].'</td>
                        <td>'.$f2["email"].'</td> 
                        <td>'.$f2["phone"].'</td>  
                        <td class="text-center">admin</td>                             
                    </tr>';
                }                                
            }
                '</table>';
        }
    }
}

function ClientTable()
{
    if ($conexion = mysqli_connect("127.0.0.1", "root","")) {

        if ($c = "SELECT * FROM users WHERE type") {
            mysqli_select_db($conexion, "project");
            $datos3 = mysqli_query($conexion, $c);
      
            $tablaClients = array("id","dni","nickname","code","name","lastname","email","phone","type");
             echo '<table class="col-11 table table-sm table-bordered table-striped table-dark text-left m-5">
                    <tr class="bg-dark">
                        <th colspan=11 class="text-center text-primary">Client</th>
                    </tr>
                    <tr class="bg-info">';
                        foreach ($tablaClients as $clientes) {echo "<td class='text-center'>$clientes</td>";}
                    '</tr>'; 

            while ($f3 = mysqli_fetch_array($datos3)) {

                if ($f3['type'] == 3) {
                    echo '<tr>
                        <td class="text-center">'.$f3["id"].'</td>
                        <td>'.$f3["dni"].'</td>  
                        <td>'.$f3["nickname"].'</td>
                        <td>'.$f3["code"].'</td>
                        <td>'.$f3["name"].'</td>
                        <td>'.$f3["lastname"].'</td>
                        <td>'.$f3["email"].'</td> 
                        <td>'.$f3["phone"].'</td>  
                        <td class="text-center">client</td>                             
                    </tr>'; 
                }                           
            }
                '</table>';
        }
    }
}

//Zona de funciones pesadas
function Auxit()
{
    $dni = $_POST["dni"];

    if ($conexion = mysqli_connect("127.0.0.1", "root","")) {

        if ($e = "SELECT * FROM users WHERE dni='$dni'") {
            mysqli_select_db($conexion, "project");
            $mod = mysqli_query($conexion, $e);
            $dato3 = mysqli_fetch_array($mod);
        
            if ($dato3['dni'] == $dni) {
                echo '<h5 class="text-center text-info mt-4">Usuario encontrado</h5>'; 
                return $dato3;
            }else {
                header("Location: user.php");
            }
        }else {
            header("Location: user.php");
        }
    }else {
        echo "<p> MySQL no conoce ese usuario y password</p>";
    }
}

//Zona de formularios.
function FormAutoReg()
{
    echo '<div class="col-2 container bg-dark text-center text-teal rounded mt-3 p-3">        
            <h3 class="mt-4">Registro</h3>     
            <form class="mt-4" action="register.php" method="post">
                <p>DNI:<br>
                <input class="border rounded-pill text-center" type="text" name="dni" size="col-1" required></p>
                <p>Nickname:<br>
                <input class="border rounded-pill text-center" type="text" name="nick" size="col-1" required></p>
                <p>Password:<br>
                <input class="border rounded-pill text-center" type="text" name="code" size="col-1" required></p>          
                <p>Nombre:<br>
                <input class="border rounded-pill text-center" type="text" name="nombre" size="col-1" required></p>     
                <p>Apellido:<br>
                <input class="border rounded-pill text-center" type="text" name="apellido" size="col-1" required></p>
                <p>Email:<br>
                <input class="border rounded-pill text-center" type="text" name="email" size="col-1" required></p>
                <p>Teléfono:<br>
                <input class="border rounded-pill text-center" type="text" name="telefono" size="col-1" required></p>
                <input type="hidden" name="filter" value="3">
                <p class="text-center"><input class="bg-indigo text-white mt-2" type="submit" value="Enviar"></p>';                     
            '</form>    
        </div>';
    return;
}

function FormReg()
{
    $option = $_POST['crud'];

    echo '<div class="col-2 container bg-dark text-center text-teal rounded mt-3 p-3">        
            <h3 class="mt-4">Registro</h3>     
            <form class="mt-4" action="register.php" method="post">
                <p>DNI:<br>
                <input class="border rounded-pill text-center" type="text" name="dni" size="col-1" required></p>
                <p>Nickname:<br>
                <input class="border rounded-pill text-center" type="text" name="nick" size="col-1" required></p>
                <p>Password:<br>
                <input class="border rounded-pill text-center" type="text" name="code" size="col-1" required></p>          
                <p>Nombre:<br>
                <input class="border rounded-pill text-center" type="text" name="nombre" size="col-1" required></p>     
                <p>Apellido:<br>
                <input class="border rounded-pill text-center" type="text" name="apellido" size="col-1" required></p>
                <p>Email:<br>
                <input class="border rounded-pill text-center" type="text" name="email" size="col-1" required></p>
                <p>Teléfono:<br>
                <input class="border rounded-pill text-center" type="text" name="telefono" size="col-1" required></p>
                <input class="bg-indigo text-white mt-2" type="submit" value="Enviar">';
                ($option %2 != 0)? RootOption() : AdminOption();                       
            '</form>
        </div>';
    return;
}

function FormLog()
{
    echo '<div class="col-2 container bg-dark text-center text-maroon-light rounded mt-5 p-3">
            <h3 class="mt-4">Iniciar sesión</h3>
            <p class="text-left text-white mt-4">Por favor ingrese sus datos:</p>
            <form class="mt-4" action="validar.php" method="post">
                <p">Usuario<br>
                <input class="border rounded-pill text-center" type="text" name="usuario" size="col-1" required></p>
                <p>Password<br>
                <input class="border rounded-pill text-center" type="password" name="contraseña" size="col-1" required></p>
                <p class="text-center"><input class="bg-primary text-white mt-2" type="submit" value="Ingresar"></p>
            </form>
        </div>';
    return;
}

function FormChange()
{
    $bus = Auxit();

    $dni = $bus["dni"];
    $nName = $bus["nickname"];
    $pWord = $bus["code"];
    $fName = $bus["name"];
    $lName = $bus["lastname"];
    $email = $bus["email"];
    $phone = $bus["phone"];
    
    echo '<div class="col-2 container bg-dark text-center text-lime-light rounded mt-3 p-3"> 
            <h3 class="mt-4">Edit</h3>
            <form class="mt-4" action="edit.php" method="post">     
                <p>DNI:<br>
                <input class="border rounded-pill text-center bg-teal-light" type="text" name="dni2" placeholder="nickname" value="'.$dni.'" size="col-1" readonly="readonly"></p>
                <p>Nickname:<br>
                <input class="border rounded-pill text-center" type="text" name="nick2" placeholder="nickname" value="'.$nName.'" size="col-1" required></p>
                <p>Password:<br>
                <input class="border rounded-pill text-center" type="text" name="code2" placeholder="password" value="'.$pWord.'" size="col-1" required></p>          
                <p>Nombre:<br>
                <input class="border rounded-pill text-center" type="text" name="nombre2" placeholder="nombre" value="'.$fName.'" size="col-1" required></p>     
                <p>Apellido:<br>
                <input class="border rounded-pill text-center" type="text" name="apellido2" placeholder="apellido" value="'.$lName.'" size="col-1" required></p>
                <p>Email:<br>
                <input class="border rounded-pill text-center" type="text" name="email2" placeholder="email" value="'.$email.'" size="col-1" required></p>
                <p>Teléfono:<br>
                <input class="border rounded-pill text-center" type="text" name="telefono2" placeholder="teléfono" value="'.$phone.'" size="col-1" required></p>
                <input class="bg-indigo text-white mt-2" type="submit" value="Enviar">
            </form>
        </div> ';
    return;
}

function FormDel()
{
    echo'<div class="col-2 container bg-dark text-center text-lime-light rounded mt-3 p-3">
            <h3 class="mt-4 text-center">Borrar usuario</h3>
            <form class="mt-4" action="delete.php" method="post">
                <p>DNI<br>
                <input class="border rounded-pill text-center" type="text" name="dni" size="col-1" required></p>               
                <input class="bg-primary text-white border rounded-pill mt-2" type="submit" value="Enviar">
            </form>
        </div>';
    return;
}

function FormEdit()
{
    echo'<div class="col-2 container bg-dark text-center text-lime-light rounded mt-3 p-3">
            <h3 class="mt-4 text-center">Editar usuario</h3>
            <form class="mt-4" action="auxit.php" method="post">
                <p>DNI<br>
                <input class="border rounded-pill text-center" type="text" name="dni" size="col-1" required></p>               
                <input class="bg-primary text-white border rounded-pill mt-2" type="submit" value="Enviar">
            </form>
        </div>';
    return;
}

function RootOption()
{
    echo '<select class="bg-orange-light" name="filter">
            <option value="1">root</option>
            <option value="2">admin</option>
        </select>';
}

function AdminOption()
{
    echo '<select class="bg-orange-light" name="filter">
            <option value="2">admin</option>
            <option value="3">client</option>
        </select>'; 
}

function ClientOption()
{
    
}

function FormCamp()
{
    echo '<div class="col-2 bg-grape-dark text-white float-left border border-rounded border-primary mt-3"> 
            <div class="container">
                <h3 class="m-4 text-center">Crear tabla</h3>
                <p>Elija el número de campos.</p>
                <form action="deposit.php" method="post">      
                    <p>Cantidad: <input type="text" name="T1" size="1"></p>          
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>';
}

function FormTable()
{
    echo '<td>
            <select>
                <option value="1">INT</option>
                <option value="2">VARCHAR</option>
                <option value="3">TEXT</option>
                <option value="4">DATE</option>
            </select>
        </td>
        <td>
            <input></input>
        </td>
        <td>
            <select>
                <option value="1">None</option>
                <option value="2">As defined:</option>
                <option value="3">NULL</option>
                <option value="4">CURRENT_TIMESTAMP</option>
            </select>
        </td>';
}

function FormRoot()
{
  echo '<div class="col-2 container bg-dark text-center text-white rounded mt-5 p-3">
            <h4 class="m-4">Root</h4>
            <div class="d-flex flex-wrap justify-content-around mb-4">
                <a href="table.php" class="badge badge-pill badge-success p-2">Ver tablas</a>
                <a href="logout.php" class="badge badge-pill badge-orange p-2">Cerrar sesión</a>
            </div>
            <form class="mb-2" action="control.php" method="post">
                <select class="bg-vermillion-light mb-5" name="crud">
                    <option value="1">Crear</option>
                    <option value="3">Editar</option>
                    <option value="5">Borrar</option>
                </select>
                <input class="bg-primary text-white border rounded-pill" type="submit" value="Enviar">
            </form>          
        </div>';
}

function FormAdmin()
{
  echo '<div class="col-2 container bg-dark text-center text-white rounded mt-5 p-3">
            <h4 class="m-4">Admin</h4>
            <div class="d-flex flex-wrap justify-content-around mb-4">
                <a href="table.php" class="badge badge-pill badge-teal p-2">Ver tablas</a>
                <a href="logout.php" class="badge badge-pill badge-orange p-2">Cerrar sesión</a>
            </div>
            <form class="mb-2" action="control.php" method="post">
                <select class="bg-vermillion-light mb-5" name="crud">
                    <option value="2">Crear</option>
                    <option value="4">Editar</option>
                    <option value="6">Borrar</option>
                </select>
                <input class="bg-primary text-white border rounded-pill" type="submit" value="Enviar">
            </form>          
        </div>';
}

function FormClient()
{
  echo '<div class="col-2 container bg-dark text-center text-white rounded mt-5 p-3">
            <h4 class="m-5">Client</h4>
            <div class="d-flex flex-wrap justify-content-around mb-4">
                <a href="list.php" class="badge badge-pill badge-grape p-2">Miembros</a>
                <a href="user.php" class="badge badge-pill badge-info p-2">Crear tabla</a>
            </div>
            <a href="logout.php" class="badge badge-pill badge-orange p-2">Cerrar sesión</a>
        </div>';
}

//Partes de la página. 
function Head()
{
    echo '<head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
            <link rel="stylesheet" href="https://bootstrap-colors-extended.herokuapp.com/bootstrap-colors.css" />
            <title>Document</title>
        </head>';
}

function ComHeader()
{
    echo '<header class="d-flex flex-wrap text-center">
            <div class="col-2 container bg-success text-white pt-3">                    
                <h4><a class="text-white" href="https://potrerodigital.org/">Potrero Digital</a></h4>
            </div>
            <div class="col-8 container bg-navy-dark text-teal">
                <h1>Conexion</h1>
            </div>
            <div class="col-2 container bg-info text-white pt-3">
                <a class="text-pink-dark" href="https://github.com/PotreroDigital/Ligamentos">Repositorio</a>
            </div>
        </header>';
}

function Nav()
{
    echo '<nav>
            <div class="col-2 container navbar navbar-expand-lg bg-navy-dark text-white border border-rounded border-primary mt-5">
                <a class="col-12 navbar-brand text-center text-white bg-navy border border-maroon-light" href="index.php">Home</a>
                <!--
                <div class="col-2"></div>
                <div class="col-2 collapse navbar-collapse">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Congress 113</a>
                    <div class="col-2 dropdown-menu text-center bg-vermillion-light">
                        <a class="dropdown-item" href="senate-data.html">Senate</a>
                        <a class="dropdown-item" href="house-data.html">House</a>
                    </div>
                </div>
                <div class="col-2 collapse navbar-collapse">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Party Loyalty</a>
                    <div class="col-2 dropdown-menu text-center bg-vermillion-light">
                        <a class="dropdown-item" href="senate_party-loyalty.html">Senate</a>
                        <a class="dropdown-item" href="house_party-loyalty.html">House</a>
                    </div>
                </div>
                <div class="col-2 collapse navbar-collapse">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Attendance</a>
                    <div class="col-2 dropdown-menu text-center bg-vermillion-light">
                        <a class="dropdown-item" href="senate_party-attendance.html">Senate</a>
                        <a class="dropdown-item" href="house_party-attendance.html">House</a>
                    </div>
                </div>
                -->
            </div>
        </nav>';
}

function Home()
{
    echo'<div class="col-1 container text-center mt-5"> 
            <a href="index.php" class="badge badge-navy p-3">Home</a>
        </div>';
}

//Script bootstrap.
function Script()
{
    echo '<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>';
}
?>