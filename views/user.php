<?php
include "../controllers/layout.php";
Head();
ComHeader();
Home();

    session_start();
    
    if (empty($_SESSION["admin"]) && empty($_SESSION["client"]) && $_SESSION["root"]) {
        FormRoot();
    }elseif (empty($_SESSION["root"]) && empty($_SESSION["client"]) && $_SESSION["admin"]) {
        FormAdmin(); 
    }elseif (empty($_SESSION["root"]) && empty($_SESSION["admin"]) && $_SESSION["client"]) {
        FormClient();
    }else {
        header("Location: index.php");
        exit();
    }
    
Script();
?>