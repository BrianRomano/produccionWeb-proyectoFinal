<?php

    require_once('DAO.php'); 
    require_once('./../models/PermisosEntity.php');

    class permisosDAO extends DAO{
        
        public function __construct($con){
            $this->table = 'permisos';
            parent::__construct($con);
        }

        // OBTENER TODOS LOS PERMISOS
        public function getAll($where = array()){
            $sql = "SELECT id, nombre, code, module FROM ".$this->table;
            if(!empty($where)){
                $sql .= ' WHERE '.implode(' ',$where);
            } 
            $sql.= " ORDER BY module, nombre ASC" ;
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PermisosEntity');
            return $resultado;

        }

        // OBTENER TODOS LOS PERMISOS POR PERFIL
        public function getAllByPerfil($perfilId){
            $sql = "SELECT id, nombre, code, module  
                    FROM permisos
                    INNER JOIN perfil_permisos ON perfil_permisos.permiso = permisos.id
                    WHERE perfil = ".$perfilId ;   
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PermisosEntity');
        
            return $resultado->fetchAll();
        }
        
        // METODO ABSTRACTO
        public function getOne($id){}

    } 

?>