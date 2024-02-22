<?php
    include_once('../connection/Conexion.php');
    class Tipos extends Conexion{
        public static function Mostrar(){
            try {
                $sql = "SELECT * FROM tipos";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                throw $th;
            }
        }
        public static function Insertar($post){
            $post->tipo = trim(strtoupper($post->tipo));
            try {
                $sql = "INSERT INTO tipos (
                    des_tipo, 
                    f_registro_tipo, 
                    h_registro_tipo, 
                    alter_tipo
                    ) VALUES ( ?,?,?,?)";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->tipo, PDO::PARAM_STR);
                $stmt->bindParam(2, Conexion::$f_registro, PDO::PARAM_STR);
                $stmt->bindParam(3, Conexion::$h_registro, PDO::PARAM_STR);
                $stmt->bindParam(4, Conexion::$alter, PDO::PARAM_STR);
                $stmt->execute();
                return 'tipo registrado correctamte';
            } catch (PDOException $th) {
                throw $th;
            }
        }
        public static function Existe_id($post){
            $post->tipo = trim(strtoupper($post->tipo));
            try {
                $sql = "SELECT * FROM tipos WHERE des_tipo = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->tipo, PDO::PARAM_STR);
                $stmt->execute();
                $existe = $stmt->fetch(PDO::FETCH_OBJ);
                if($existe){
                    return $existe->id_tipo;
                }else{
                    if(strlen($post->tipo) > 0){
                        self::Insertar($post);
                        $stmt->execute();
                        $existe = $stmt->fetch(PDO::FETCH_OBJ);
                        return ($existe) ? $existe->id_tipo : false;
                    }else{
                        return false;
                    }
                }
            } catch (PDOException $th) {
                throw $th;
            }
        }
    }