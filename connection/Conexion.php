<?php
    date_default_timezone_set('America/Caracas');
    $post = (object) $_POST;

    class Conexion {
        #DATOS DE LA BASE DE DATOS
        private static $host = "localhost";
        private static $db = "comerciales";
        private static $user = "root";
        private static $pass = "";

        #VALORES POR DEFECTO DEL TIEMPO REGISTRO
        public static $f_registro;
        public static $h_registro;
        public static $alter;

        public static function Conectar(){
            try {
                $con = "mysql:host=" . self::$host . ";dbname=" . self::$db;
                $stmt = new PDO($con, self::$user, self::$pass);
                $stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$f_registro = date('Y-m-d');
                self::$h_registro = date('H:i:s');
                self::$alter = date('Y-m-d H:i:s');
                return $stmt;
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
    }