<?php
    include_once('../Class/Comerciales.php');

    $comerciales = Comerciales::Buscar_x_id_modal($post->id_comercial);

    echo $comerciales = json_encode($comerciales);