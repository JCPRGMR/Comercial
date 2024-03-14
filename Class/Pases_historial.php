<?php
    include_once('../connection/Conexion.php');
    class Pases_historial extends Conexion{
        public static function Pases_echos($post){
            try {
                $sql = "SELECT COUNT(*) AS pases_echos FROM `pases_historial` WHERE id_fk_comercial = ? AND pase_estado = 1";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post, PDO::PARAM_INT);
                $stmt->execute();
                $pases_realizado = $stmt->fetchObject();
                return $pases_realizado->pases_echos;
            } catch (PDOException $th) {
                throw $th;
            }
        }
        public static function Insertar($post){
            var_dump($post);
            try {
                $sql = "INSERT INTO pases_historial(
                    id_fk_comercial,
                    pase_estado,
                    f_registro_pase,
                    h_registro_pase,
                    alter_pase
                ) VALUES(?,?,?,?,?)";
                $estado = 1;
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->pases, PDO::PARAM_INT);
                $stmt->bindParam(2, $estado, PDO::PARAM_INT);
                $stmt->bindParam(3, Conexion::$f_registro, PDO::PARAM_STR);
                $stmt->bindParam(4, Conexion::$h_registro, PDO::PARAM_STR);
                $stmt->bindParam(5, Conexion::$alter, PDO::PARAM_STR);
                $stmt->execute();
                header("Location: ../view/index.php");
            } catch (PDOException $th) {
                throw $th;
            }
        }
        public static function Mostrar_Ultimo_Pase($id){
            try {
                $sql = "SELECT MAX(id_pase_historial) FROM pases_historial WHERE id_fk_comercial = ? AND pase_estado = 1";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $id, PDO::PARAM_INT);
                $stmt->execute();
                $id = $stmt->fetchColumn();
                return $id;
            } catch (PDOException $th) {
                throw $th;
            }
        }
        public static function Eliminar($id){
            var_dump($id);
            try {
                $sql = "DELETE FROM pases_historial WHERE id_pase_historial = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                // $stmt->bindParam(1, Conexion::$alter, PDO::PARAM_STR);
                $stmt->bindParam(1, $id, PDO::PARAM_INT);
                $stmt->execute();
                echo 'Se elimino un pase';
                header("Location: ../view/index.php");
            } catch (PDOException $th) {
                throw $th;
            }
        }
        public static function DetallesHistorial(){
            try {
                $sql = "SELECT DISTINCT(historial_detalles) FROM historialdecomerciales WHERE historial_detalles != '' GROUP BY historial_detalles";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                throw $th;
            }
        }
    }