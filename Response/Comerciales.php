<?php
    // include_once('../connection/Conexion.php');
    include_once('../Class/Pases_historial.php');
    include_once('../Class/Clientes.php');
    include_once('../Class/Programas.php');
    include_once('../Class/Tipos.php');
    include_once('../Class/Comerciales.php');
    
    $id_comercial = (isset($_GET['editar']))? Comerciales::Buscar_x_id($_GET['editar']) : '';

    // var_dump(Comerciales::Buscar_x_id(63));

    $hoy = Comerciales::Traduccion_date(date('D'));
    // $day = [
        
    // ]

    