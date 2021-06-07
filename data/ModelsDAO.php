<?php

    require_once('DAO.php');
    require_once('./../models/ModelsEntity.php');

    class ModelsDAO extends DAO{

        function __construct($con){
            parent::__construct($con);
            $this->table = 'models';
        }

        // OBTENER UNA MARCA
        public function getOne($id){
            $sql = "SELECT id,nombre,activo FROM $this->table WHERE id = $id";
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'ModelsEntity')->fetch();
            
            return $resultado;
        }

        // OBTENER TODAS LAS MARCAS
        public function getAll($where = array()){
            $sql = "SELECT id,nombre,activo FROM $this->table";
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'ModelsEntity')->fetchAll();
            
            return $resultado;
        }
        
    }

?>