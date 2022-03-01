<?php

    require_once('DAO.php');
    require_once('CategoryDAO.php');
    require_once('./../models/ModelsEntity.php');

    class ModelsDAO extends DAO{


        function __construct($con){
            parent::__construct($con);
            $this->CategoryDao = new CategoryDAO($con);
            $this->table = 'models';
        }

        // OBTENER UNA MARCA
        public function getOne($id){
            $sql = "SELECT id,nombre,activo,categoria FROM $this->table WHERE id = $id";
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'ModelsEntity')->fetch();
            $resultado->setCategoria($this->CategoryDao->getOne($resultado->getCategoria()));
  
            return $resultado;
        }
 
        // OBTENER TODAS LAS MARCAS
        public function getAll($where = array()){
            $sqlWhereStr = ' WHERE 1=1 ';

            if(!empty($where['cat'])){ 
                $sqlWhereStr .= ' AND categoria = '.$where['cat'];
            }

            $sql = "SELECT  id,
                            nombre,  
                            activo,
                            categoria
                    FROM $this->table $sqlWhereStr";

            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'ModelsEntity')->fetchAll();

            foreach($resultado as $index=>$res){
                $resultado[$index]->setCategoria($this->CategoryDao->getOne($res->getCategoria()));
            }

            return $resultado;
        }

        // GUARDAR MODELO
        public function save($datos = array()){
            $save = parent::save($datos);
            return $save;
        }  

        // MODIFICAR MODELO
        public function modify($id, $datos = array()){
            $modify = parent::modify($id, $datos);
            return $modify;
        } 

        // ELIMINAR MODELO
        public function delete($id){
            $delete = parent::delete($id); 
            return $delete;
        }
        
    }

?>