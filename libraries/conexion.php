<?php 
    class Conexion {
        private $host = "localhost";
        private $dbname = "restaurante";
        private $user = "root";
        private $password = "";
        private $conect;

        public function __construct(){

           } 
     
        public function conexion(){
            $con="mysql:host={$this->host};dbname={$this->dbname};"; 
            $this->conect = new PDO($con,$this->user,$this->password);
           try {
                $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           }catch (\PDOException $e) {
                echo "Error: ".$e->getMessage();
           }
           return $this->conect;
        }

    }
        
?>