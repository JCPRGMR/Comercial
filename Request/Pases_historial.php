<?php
    include_once('../connection/Conexion.php');
    include_once('../Class/Pases_historial.php');
    (isset($post->pases)) && Pases_historial::Insertar($post);
    (isset($post->quitar_pases)) && Pases_historial::Eliminar($post->quitar_pases);