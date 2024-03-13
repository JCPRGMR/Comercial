<?php
    include_once("../connection/Conexion.php");

    Class Usuarios extends Conexion{
        public static function VerificarRol($post){
            try {
                $sql = "SELECT rol FROM usuarios WHERE usuarios = ? AND clave = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->username, PDO::PARAM_STR);
                $stmt->bindParam(2, $post->password, PDO::PARAM_STR);
                $stmt->execute();
                $rol = $stmt->fetchColumn();
                return $rol;
            } catch (PDOException $th) {
                return $th->getMessage();
            }
        }
    }