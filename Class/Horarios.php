<?php
    include_once('../connection/Conexion.php');
    class Horarios extends Conexion{
        public static function Insertar($post){
            try {
                $sql = "INSERT INTO(
                    id_fk_programa,
                    dia_semana,
                    h_inicio,
                    h_fin,
    
                    f_registro_horario,
                    h_registro_horario,
                    alter_horario
                ) horarios VALUES(?,?,?,?, ?,?,?)";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->id_programa, PDO::PARAM_INT);
                $stmt->bindParam(2, $post->dia, PDO::PARAM_STR);
                $stmt->bindParam(3, $post->h_inicio, PDO::PARAM_STR);
                $stmt->bindParam(4, $post->h_fin, PDO::PARAM_STR);
                $stmt->bindParam(5, Conexion::$f_registro, PDO::PARAM_STR);
                $stmt->bindParam(6, Conexion::$h_registro, PDO::PARAM_STR);
                $stmt->bindParam(7, Conexion::$alter, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                throw $th;
            }
        }
    }