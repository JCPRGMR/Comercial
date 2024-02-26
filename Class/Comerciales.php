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
                    pases,
                    f_registro_comercial,
                    h_registro_comercial,
                    alter_comercial,
                    estado_comercial
                ) VALUES(?,?,?,?, ?,?,?, ?)";
                $stmt = Conexion::Conectar()->prepare($sql);
                $estado = 1;
                $stmt->bindParam(1, $post->programa, PDO::PARAM_INT);
                $stmt->bindParam(2, $post->cliente, PDO::PARAM_INT);
                $stmt->bindParam(3, $post->tipo, PDO::PARAM_INT);
                $stmt->bindParam(4, $post->pases, PDO::PARAM_INT);
                $stmt->bindParam(5, Conexion::$f_registro, PDO::PARAM_STR);
                $stmt->bindParam(6, Conexion::$h_registro, PDO::PARAM_STR);
                $stmt->bindParam(7, Conexion::$alter, PDO::PARAM_STR);
                $stmt->bindParam(8, $estado, PDO::PARAM_INT);
                $stmt->execute();
                // echo 'Comercial programado correctamente';
                header("Location: ../view/index.php");
            } catch (PDOException $th) {
                throw $th;
            }
        }
        public static function Ocultar($post){
            try {
                $sql = "UPDATE comerciales SET estado_comercial = 0 WHERE id_comercial = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->ocultar, PDO::PARAM_INT);
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
                pases = ?,
                alter_comercial  = ? WHERE id_comercial = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->programa, PDO::PARAM_INT);
                $stmt->bindParam(2, $post->cliente, PDO::PARAM_INT);
                $stmt->bindParam(3, $post->tipo, PDO::PARAM_INT);
                $stmt->bindParam(4, $post->pases, PDO::PARAM_INT);
                $stmt->bindParam(5, Conexion::$alter, PDO::PARAM_STR);
                $stmt->bindParam(6, $post->editar_comercial, PDO::PARAM_STR);
                $stmt->execute();
                header('Location: ../view/index.php');
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
    }