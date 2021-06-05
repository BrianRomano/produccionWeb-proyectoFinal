<?php

    require_once('DAO.php');
    require_once('./../models/CategoryEntity.php');

    class CategoryDAO extends DAO{

        function __construct($con){
            parent::__construct($con);
            $this->table = 'categories';
        }

        // OBTENER UNA CATEGORIA
        public function getOne($id){
            $sql = "SELECT id,nombre,activo,padre FROM $this->table WHERE id = $id";
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'CategoryEntity')->fetch();
            
            return $resultado;
        }

        // OBTENER TODAS LAS CATEGORIAS
        public function getAll($where = array()){
            $sql = "SELECT id,nombre,activo,padre FROM $this->table";
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'CategoryEntity')->fetchAll();
            
            return $resultado;
        }
        
    }

?>