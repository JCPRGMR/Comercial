<?php
    include_once("../Class/Programas.php");
    include_once("../Class/Horarios.php");

    if(isset($post->nuevo)){
        Programas::Insertar($post);
        $id = Programas::Existe_id($post);
        $new_array = array("id_programa" => $id);
        $post = (object) ($_POST + $new_array);
        foreach ($post->dia as $key) {
            $post->dia = $key;
            Horarios::Insertar($post);
        }

        echo '<pre>';
        var_dump($post);
        header("Location: ../view/index.php");
    }
    