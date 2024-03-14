<link rel="stylesheet" href="../css/style3.css">
<?php
    include_once('../connection/Conexion.php');
    include_once('../Class/Clientes.php');
    include_once('../Class/Programas.php');
    include_once('../Class/Tipos.php');
    include_once('../Class/Comerciales.php');
    
    echo '<pre>';
    if(isset($post->insertar_comercial) && $post->insertar_comercial == 1){    
        $historial = (object)[
            "programa" => $post->cliente,
            "cliente" => $post->programa,
            "tipo" => $post->tipo,
            "detalles" => $post->detalles,
            "pases" => 0,
            "comercial" => null,
        ];
        $post->cliente = (Clientes::Existe_id($post))? Clientes::Existe_id($post) : null ;
        $post->programa = (Programas::Existe_id($post))? Programas::Existe_id($post) : null ;
        $post->tipo = (Tipos::Existe_id($post))? Tipos::Existe_id($post) : null ;
        var_dump($post);
        $id = Comerciales::Insertar($post);
        $historial->comercial = $id;
        Comerciales::Historial($historial);
        var_dump($historial);
        header('Location: ../view/index.php');
    }

    (isset($post->ocultar)) && Comerciales::Ocultar($post);
    
    if(isset($post->editar_comercial)){
        $historial = (object)[
            "programa" => $post->cliente,
            "cliente" => $post->programa,
            "tipo" => $post->tipo,
            "detalles" => $post->detalles,
            "pases" => 0,
            "comercial" => null,
        ];
        $post->cliente = (Clientes::Existe_id($post))? Clientes::Existe_id($post) : null ;
        $post->programa = (Programas::Existe_id($post))? Programas::Existe_id($post) : null ;
        $post->tipo = (Tipos::Existe_id($post))? Tipos::Existe_id($post) : null ;
        Comerciales::Editar($post);
        $historial->comercial = $post->editar_comercial;
        Comerciales::Historial($historial);
        header('Location: ../view/index.php');
    }
    if(isset($post->nuevo_programa)){
        header('Location: ../view/Programas.php');
    }