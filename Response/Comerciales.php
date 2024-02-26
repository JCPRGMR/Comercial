<?php
    // include_once('../connection/Conexion.php');
    include_once('../Class/Pases_historial.php');
    include_once('../Class/Clientes.php');
    include_once('../Class/Programas.php');
    include_once('../Class/Tipos.php');
    include_once('../Class/Comerciales.php');
    
    $id_comercial = (isset($_GET['editar']))? Comerciales::Buscar_x_id($_GET['editar']) : '';
    
    // echo '<pre>';
    // var_dump($id_comercial);
    // echo '</pre>';
    ####################################################### CIFRADO DE GET
    // $key = "35t3v@l0#35m0d1f1c4bl3";
    // echo (isset($_GET['editar'])) ? openssl_decrypt($_GET['editar'], 'AES-256-CBC', $key, 0, openssl_random_pseudo_bytes(16)) . $_GET['editar'] : "lol" ;

    // echo 'XD' . $editar_id;

    