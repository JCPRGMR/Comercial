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
                    alter_programa,
                    detalles
                    ) VALUES (?,?,?,?,?)";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->programa, PDO::PARAM_STR);
                $stmt->bindParam(2, Conexion::$f_registro, PDO::PARAM_STR);
                $stmt->bindParam(3, Conexion::$h_registro, PDO::PARAM_STR);
                $stmt->bindParam(4, Conexion::$alter, PDO::PARAM_STR);
                $stmt->bindParam(5, $post->detalles, PDO::PARAM_STR);
                $stmt->execute();
                // header('Location: ../view/index.php');
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
                    return null;
                }
            } catch (PDOException $th) {
                throw $th;
            }
        }
        public static function Buscar_x_id($id){
            try {
                $sql = "SELECT * FROM vista_programa WHERE id_programa = ?";
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