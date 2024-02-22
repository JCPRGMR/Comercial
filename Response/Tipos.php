<?php
    include_once('../Class/Tipos.php');
    $tipos = Tipos::Mostrar();

    echo json_encode($tipos);