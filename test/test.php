<?php
    include_once('../Class/Clientes.php');
    // var_dump(Clientes::Mostrar());


    echo $clientes = json_encode(Clientes::Mostrar());