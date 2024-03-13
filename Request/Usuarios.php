<?php
    include_once("../Class/Usuarios.php");

    // var_dump($post);
    if(Usuarios::VerificarRol($post)){
        session_start();
        echo $_SESSION["rol"] = Usuarios::VerificarRol($post);
        header("Location: ../view/index.php");
    }else{
        header("Location: ../view/index.php");
    }