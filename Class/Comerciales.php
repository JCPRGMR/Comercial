<?php
    include_once('../connection/Conexion.php');
    class Comerciales extends Conexion{
        public static function Mostrar(){
            try {
                $sql = "SELECT * FROM vista_comerciales ORDER BY alter_comercial DESC";
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
                    alter_comercial
                ) VALUES(?,?,?,?, ?,?,?)";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->programa, PDO::PARAM_INT);
                $stmt->bindParam(2, $post->cliente, PDO::PARAM_INT);
                $stmt->bindParam(3, $post->tipo, PDO::PARAM_INT);
                $stmt->bindParam(4, $post->pases, PDO::PARAM_INT);
                $stmt->bindParam(5, Conexion::$f_registro, PDO::PARAM_STR);
                $stmt->bindParam(6, Conexion::$h_registro, PDO::PARAM_STR);
                $stmt->bindParam(7, Conexion::$alter, PDO::PARAM_STR);
                $stmt->execute();
                // echo 'Comercial programado correctamente';
                header("Location: ../view/index.php");
            } catch (PDOException $th) {
                throw $th;
            }
        }
    }