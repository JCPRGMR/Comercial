<?php
    include_once('../Class/Clientes.php');
    include_once('../Class/Comerciales.php');
    include_once('../Class/Horarios.php');
    include_once('../Class/Pases_historial.php');
    include_once('../Class/Programas.php');
    include_once('../Class/Tipos.php');
    include_once('../connection/Conexion.php');


    function Traduccion_date($dia){
        $days = [
            "Lunes" => [
                "espanol" => "LUNES",
                "ingles"  => "Mon"
            ],
            "Martes" => [
                "espanol" => "MARTES",
                "ingles"  => "Tue"
            ],
            "Miercoles" => [
                "espanol" => "MIERCOLES",
                "ingles"  => "Wed"
            ],
            "Jueves" => [
                "espanol" => "JUEVES",
                "ingles"  => "Thu"
            ],
            "Viernes" => [
                "espanol" => "VIERNES",
                "ingles"  => "Fri"
            ],
            "Sabado" => [
                "espanol" => "SABADO",
                "ingles"  => "Sat"
            ],
            "Domingo" => [
                "espanol" => "DOMINGO",
                "ingles"  => "Sun"
            ],
        ];
        foreach ($days as $key) {
            if($key["ingles"] === $dia){
                return $key["espanol"];
            }
        }
    }
    function Programa_de_hoy($dia){
        try {
            $sql = "SELECT * FROM vista_programas WHERE dia_semana = ?";

            $stmt = Conexion::Conectar()->prepare($sql);

            $stmt->bindParam(1, $dia, PDO::PARAM_STR);
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);


            foreach($resultado as $item){
                if(date('H:i:s') >= $item['h_inicio'] && date('H:i:s', strtotime('+1 hour')) <= $item['h_fin']){
                    return $item['des_programa'];
                }
            }

        } catch (PDOException $th) {
            throw $th;
        }
    }
    var_dump(Programa_de_hoy(Traduccion_date(date('D',))));
    