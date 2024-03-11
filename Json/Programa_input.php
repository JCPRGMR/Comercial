<?php
    // ? TESTEAR ESTE CODIGO SCRIPT: DEBE IMPRIMIR EL PROGRAMA A TRANSMITIR EN LA HORA ACTUAL
    include_once("../Class/Comerciales.php");
    $dia = Comerciales::Traduccion_date(date('D'));
    echo Comerciales::Inicio_del_programa($dia);