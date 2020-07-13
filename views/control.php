<?php
include "../controllers/layout.php";
Head();
ComHeader();
Home();

    session_start();
    $option = $_POST['crud'];

    if (empty($_SESSION["admin"]) && empty($_SESSION["client"]) && $_SESSION["root"]) {
        echo '<h3 class="text-center text-danger mt-4">Root</h3>';

        switch ($option) {
            case '1':
                FormReg();
                break;
            case '3':
                FormEdit();           
                break;
            case '5':
                FormDel();
                break;
            }

    }elseif (empty($_SESSION["root"]) && empty($_SESSION["client"]) && $_SESSION["admin"]) {
        echo '<h3 class="text-center text-danger mt-4">Admin</h3>';

        switch ($option) {
            case '2':
                FormReg();
                break;
            case '4':
                FormEdit();
                break;
            case '6':
                FormDel();
                break;
            }

    }elseif (empty($_SESSION["root"]) && empty($_SESSION["admin"]) && $_SESSION["client"]) {
        echo "<strong>Client</strong>";
        //FormCamp();
    }else {
        header("Location: index.php");
        exit();
    }

Script();
?>
