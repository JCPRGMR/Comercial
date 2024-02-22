<?php
    include_once('../Class/Clientes.php');
    $clientes = Clientes::Mostrar();

    echo json_encode($clientes);