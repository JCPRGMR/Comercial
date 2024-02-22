<?php
    include_once('../Class/Programas.php');
    $programas = Programas::Mostrar();

    echo json_encode($programas);