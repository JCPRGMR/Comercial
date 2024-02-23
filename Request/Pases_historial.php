<?php
    include_once('../connection/Conexion.php');
    include_once('../Class/Pases_historial.php');

    var_dump($post);
    (isset($post->pases)) && Pases_historial::Insertar($post);
    // echo (Pases_historial::Pases_echos($post));