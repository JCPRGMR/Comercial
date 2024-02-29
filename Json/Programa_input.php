<?php
    include_once("../Class/Comerciales.php");

    $dia = Comerciales::Traduccion_date(date('D'));

    echo Comerciales::Programa_de_hoy($dia);