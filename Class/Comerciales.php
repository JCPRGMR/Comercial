<?php
    include_once('../connection/Conexion.php');
    class Comerciales extends Conexion{
        public static function Mostrar(){
            try {
                $sql = "SELECT * FROM vista_comerciales WHERE estado_comercial = 1 ORDER BY alter_comercial DESC";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $comerciales = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $comerciales;
            } catch (PDOException $th) {
                throw $th;
            }
        }
        public static function Insertar($post){
            try {
                $sql = "INSERT INTO comerciales(
                    id_fk_programa,
                    id_fk_cliente,
                    id_fk_tipo,

                    detalles_comercial,

                    pases,
                    f_registro_comercial,
                    h_registro_comercial,
                    alter_comercial,
                    estado_comercial
                ) VALUES(?,?,?,?, ?,?,?, ?,?)";
                $stmt = Conexion::Conectar()->prepare($sql);
                $estado = 1;
                $stmt->bindParam(1, $post->programa, PDO::PARAM_INT);
                $stmt->bindParam(2, $post->cliente, PDO::PARAM_INT);
                $stmt->bindParam(3, $post->tipo, PDO::PARAM_INT);

                $stmt->bindParam(4, $post->detalles, PDO::PARAM_STR);

                $stmt->bindParam(5, $post->pases, PDO::PARAM_INT);
                $stmt->bindParam(6, Conexion::$f_registro, PDO::PARAM_STR);
                $stmt->bindParam(7, Conexion::$h_registro, PDO::PARAM_STR);
                $stmt->bindParam(8, Conexion::$alter, PDO::PARAM_STR);
                $stmt->bindParam(9, $estado, PDO::PARAM_INT);
                $stmt->execute();
                $sql = "SELECT MAX(id_comercial) FROM comerciales";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $id = $stmt->fetchColumn();
                return $id;
            } catch (PDOException $th) {
                throw $th;
            }
        }
        public static function Historial($post){
            try {
                $ESTADO = 1;
                $sql = "INSERT INTO historialdecomerciales(
                    id_comercial,
                    historial_programa,
                    historial_cliente,
                    historial_tipo,

                    historial_detalles,

                    historial_pases,
                    estado_comercial,
                    f_registro_historial,
                    h_registro_historial,
                    alter_historial
                ) VALUES(?,?,?,?,?, ?,?,?,?,?)";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->comercial, PDO::PARAM_INT);
                $stmt->bindParam(2, $post->programa, PDO::PARAM_STR);
                $stmt->bindParam(3, $post->cliente, PDO::PARAM_STR);
                $stmt->bindParam(4, $post->tipo, PDO::PARAM_STR);

                $stmt->bindParam(5, $post->detalles, PDO::PARAM_STR);

                $stmt->bindParam(6, $post->pases, PDO::PARAM_STR);
                $stmt->bindParam(7, $ESTADO, PDO::PARAM_INT);
                $stmt->bindParam(8, Conexion::$f_registro, PDO::PARAM_STR);
                $stmt->bindParam(9, Conexion::$h_registro, PDO::PARAM_STR);
                $stmt->bindParam(10, Conexion::$alter, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Ocultar($post){
            try {
                $sql = "DELETE FROM pases_historial WHERE id_fk_comercial = ?; DELETE FROM comerciales WHERE id_comercial = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->ocultar, PDO::PARAM_INT);
                $stmt->bindParam(2, $post->ocultar, PDO::PARAM_INT);
                $stmt->execute();
                header("Location: ../view/index.php");
            } catch (PDOException $th) {
                echo '<pre>';
                var_dump($post);
                throw $th;
            }
        }
        public static function Editar($post){
            try {
                $sql = "UPDATE comerciales SET 
                id_fk_programa = ?,
                id_fk_cliente = ?,
                id_fk_tipo = ?,
                detalles_comercial = ?,
                pases = ?,
                alter_comercial  = ? WHERE id_comercial = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->programa, PDO::PARAM_INT);
                $stmt->bindParam(2, $post->cliente, PDO::PARAM_INT);
                $stmt->bindParam(3, $post->tipo, PDO::PARAM_INT);
                $stmt->bindParam(4, $post->detalles, PDO::PARAM_STR);
                $stmt->bindParam(5, $post->pases, PDO::PARAM_INT);
                $stmt->bindParam(6, Conexion::$alter, PDO::PARAM_STR);
                $stmt->bindParam(7, $post->editar_comercial, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                throw $th;
            }
        }
        public static function Buscar_x_id($id){
            try {
                $sql = "SELECT * FROM vista_comerciales WHERE id_comercial = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $id, PDO::PARAM_INT);
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                throw $th;
            }
        }
        public static function Buscar_x_id_modal($id){
            try {
                $sql = "SELECT * FROM vista_comerciales WHERE id_comercial = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $id, PDO::PARAM_INT);
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                return $resultado;
            } catch (PDOException $th) {
                throw $th;
            }
        }
        public static function Traduccion_date($dia){
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
        public static function Inicio_del_programa($dia){
            try {
                $sql = "SELECT 
                des_programa
                FROM 
                vista_programas 
                WHERE dia_semana = ? 
                AND ? >= h_inicio
                AND ? <= h_fin";
                $hora_actual = date('H:i');
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $dia, PDO::PARAM_STR);
                $stmt->bindParam(2, $hora_actual, PDO::PARAM_STR);
                $stmt->bindParam(3, $hora_actual, PDO::PARAM_STR);
                $stmt->execute();
                $resultado = $stmt->fetchColumn();
                return $resultado;
            } catch (PDOException $th) {
                throw $th;
            }
        }
    }