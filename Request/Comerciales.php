<link rel="stylesheet" href="../css/style3.css">
<?php
    include_once('../connection/Conexion.php');
    include_once('../Class/Clientes.php');
    include_once('../Class/Programas.php');
    include_once('../Class/Tipos.php');
    include_once('../Class/Comerciales.php');
    
    if(isset($post->insertar_comercial) && $post->insertar_comercial == 1){
        $post->cliente = (Clientes::Existe_id($post))? Clientes::Existe_id($post) : null ;
        $post->programa = (Programas::Existe_id($post))? Programas::Existe_id($post) : null ;
        $post->tipo = (Tipos::Existe_id($post))? Tipos::Existe_id($post) : null ;
        echo '<pre>';
        var_dump($post);
        print_r($post);
        Comerciales::Insertar($post);
    }

    (isset($post->ocultar)) && Comerciales::Ocultar($post);
    
    if(isset($post->editar_comercial)){
        $post->cliente = (Clientes::Existe_id($post))? Clientes::Existe_id($post) : null ;
        $post->programa = (Programas::Existe_id($post))? Programas::Existe_id($post) : null ;
        $post->tipo = (Tipos::Existe_id($post))? Tipos::Existe_id($post) : null ;
        Comerciales::Editar($post);
        // echo '<pre>';
        // echo $post->editar_comercial;
        // var_dump($post);
    }

    
    // echo '<pre>';
    // var_dump($post);