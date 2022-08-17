<?php 
    require_once "conexion.php";

    //Clase Mysql
    class Mysql extends Conexion {
        private $conexion;
        private $consulta;
        private $array;

        public function __construct(){
                //heredar la conexion a la base de datos
                $this->conexion = new Conexion();
                $this->conexion = $this->conexion->conexion();
           } 
        /*   *********METODOS DEL CRUD HACIA LA BASE DE DATOS*********    */

        //metodo Insertar
        public function insert($consulta, $array){
            $this->consulta = $consulta; // Consulta sql de busqueda
            $this->array = $array; // datos de informacion
            $insertar = $this->conexion->prepare($this->consulta); // preparar la consulta para la conexion de base de datos a php
            $resInsert = $insertar->execute($this->array); // envio de la información
            //validación si se hizo el insert de datos en la base de datos
            if ($resInsert){
                $lastInsert = $this->conexion->lastInsert();
            }else{
                $lastInsert = 0;
            }
            return $lastInsert;
        }

        //metodo Busqueda exacta.
        public function select($consulta){
            $this->consulta = $consulta; // Consulta sql de busqueda
            $busqueda = $this->conexion->prepare($this->consulta); // preparar la consulta para la conexion de base de datos a php
            $busqueda->execute();// envio de la información
            $datos = $busqueda->fetch(PDO::FETCH_ASSOC); // Extracción de una fila de una tabla
            return $datos;
        }

        //metodo Busqueda de todos los datos.
        public function selectAll($consulta){ 
            $this->consulta = $consulta;// Consulta sql de busqueda
            $busquedaAll = $this->conexion->prepare($this->consulta); // preparar la consulta para la conexion de base de datos a php
            $busquedaAll->execute();// envio de la información
            $datos = $busqueda->fetchAll(PDO::FETCH_ASSOC); // Extracción de todas las filas de una tabla en la base de datos
            return $datos;

        }
         //metodo actualizar filas
        public function update($consulta, $array){
            $this->consulta = $consulta; // Consulta sql de busqueda
            $this->array = $array; // datos de informacion
            $actualizar = $this->conexion->prepare($this->consulta); // preparar la consulta para la conexion de base de datos a php
            $resAct = $actualizar->execute($this->array); // envio de la información
            return $resAct;
        }
        //metodo borrar filas
        public function delete($consulta){
            $this->consulta = $consulta; // Consulta sql de busqueda
            $borrar = $this->conexion->prepare($this->consulta); // preparar la consulta para la conexion de base de datos a php
            $borrar->execute();// envio de la información
            return $borrar;
        }

    }
        
?>