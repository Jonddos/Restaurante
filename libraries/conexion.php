<?php 

    class Conexion {
        private $host = "localhost";
        private $dbname = "restaurante";
        private $user = "root";
        private $password = "password";


        public function __construct(){
            $this->conexion();
        }

        public function conexion(){
            $con="mysql:host={$this->host};dbname={$this->dbname};"; 
            $conexion = new PDO($con,$this->user,$this->password);
            return $conexion; 
        }
    }

?>