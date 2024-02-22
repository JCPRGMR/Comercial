<?php
    include_once('../connection/Conexion.php');
    class Clientes extends Conexion{
        # MOSTRAR CLIENTE
        public static function Mostrar(){
            try {
                $sql = "SELECT * FROM clientes ORDER BY alter_cliente DESC";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $clientes = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $clientes;
            } catch (PDOException $th) {
                throw $th;
            }
        }
        # INSERTAR CLIENTE
        public static function Insertar($post){
            $post->cliente = trim(strtoupper($post->cliente));
            try {
                $sql = "INSERT INTO clientes (
                    des_cliente, 
                    f_registro_cliente, 
                    h_registro_cliente, 
                    alter_cliente
                    ) VALUES ( ?,?,?,?)";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->cliente, PDO::PARAM_STR);
                $stmt->bindParam(2, Conexion::$f_registro, PDO::PARAM_STR);
                $stmt->bindParam(3, Conexion::$h_registro, PDO::PARAM_STR);
                $stmt->bindParam(4, Conexion::$alter, PDO::PARAM_STR);
                $stmt->execute();
                return 'Cliente registrado correctamte';
            } catch (PDOException $th) {
                throw $th;
            }
        }
        # EDITAR CLIENTE
        # ELIMINAR CLENTE
        # EXISTE EL CLIENTE?
        public static function Existe_id($post){
            $post->cliente = trim(strtoupper($post->cliente));
            try {
                $sql = "SELECT * FROM clientes WHERE des_cliente = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->cliente, PDO::PARAM_STR);
                $stmt->execute();
                $existe = $stmt->fetch(PDO::FETCH_OBJ);
                if($existe){
                    return $existe->id_cliente;
                }else{
                    if(strlen($post->cliente) > 0){
                        self::Insertar($post);
                        $stmt->execute();
                        $existe = $stmt->fetch(PDO::FETCH_OBJ);
                        return ($existe) ? $existe->id_cliente : false;
                    }else{
                        return false;
                    }
                }
            } catch (PDOException $th) {
                throw $th;
            }
        }
        # BUSCAR POR EL NOMBRE DEL CLIENTE
    }