<?php
    include_once('../connection/Conexion.php');
    class Programas extends Conexion{
        public static function Mostrar(){
            try{
                $sql = "SELECT * FROM programas";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            }catch (PDOException $th){
                return false;
            }
        }
        public static function Insertar($post){
            $post->programa = trim(strtoupper($post->programa));
            try {
                $sql = "INSERT INTO programas (
                    des_programa, 
                    f_registro_programa, 
                    h_registro_programa, 
                    alter_programa
                    ) VALUES ( ?,?,?,?)";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->programa, PDO::PARAM_STR);
                $stmt->bindParam(2, Conexion::$f_registro, PDO::PARAM_STR);
                $stmt->bindParam(3, Conexion::$h_registro, PDO::PARAM_STR);
                $stmt->bindParam(4, Conexion::$alter, PDO::PARAM_STR);
                $stmt->execute();
                return 'programa registrado correctamte';
            } catch (PDOException $th) {
                throw $th;
            }
        }
        public static function Existe_id($post){
            $post->programa = trim(strtoupper($post->programa));
            try {
                $sql = "SELECT * FROM programas WHERE des_programa = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->programa, PDO::PARAM_STR);
                $stmt->execute();
                $existe = $stmt->fetch(PDO::FETCH_OBJ);
                if($existe){
                    return $existe->id_programa;
                }else{
                    if(strlen($post->programa) > 0){
                        self::Insertar($post);
                        $stmt->execute();
                        $existe = $stmt->fetch(PDO::FETCH_OBJ);
                        return ($existe) ? $existe->id_programa : false;
                    }else{
                        return false;
                    }
                }
            } catch (PDOException $th) {
                throw $th;
            }
        }
        
    }   