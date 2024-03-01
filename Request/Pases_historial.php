<?php
    include_once('../connection/Conexion.php');
    include_once('../Class/Pases_historial.php');

    // var_dump($post);
    if(isset($post->pases)){
        echo 'se presiono en insertar';
        Pases_historial::Insertar($post);
    }
    if(isset($post->eliminar_pases)){
        echo 'se presiono en eliminar';
        Pases_historial::eliminar($post);
    }