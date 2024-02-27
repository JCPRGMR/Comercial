<?php
    include_once("../Class/Programas.php");
    include_once("../Class/Horarios.php");

    if(isset($post->nuevo)){
        Programas::Insertar($post);
        $id = (object) Programas::Existe_id($post);
        
        $nuevo_programa = (object)[
            "id_programa" => $id
        ];

        echo '<pre>';
        $post = (object) array_merge((array) $post, (array) $nuevo_programa);
        var_dump($post);
    }