<?php
    include_once('../connection/Conexion.php');
    class Pases_historial extends Conexion{
        public static function Pases_echos($post){
            try {
                $sql = "SELECT COUNT(*) AS pases_echos FROM `pases_historial` WHERE id_fk_comercial = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post, PDO::PARAM_INT);
                $stmt->execute();
                $pases_realizado = $stmt->fetchObject();
                return $pases_realizado->pases_echos;
            } catch (PDOException $th) {
                throw $th;
            }
        }
    }