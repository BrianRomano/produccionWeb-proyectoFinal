<?php

    require_once('DAO.php');
    require_once('PermisosDAO.php');
    require_once('./../models/PerfilEntity.php');

    class PerfilDAO extends DAO{

        protected $permisoDAO;

        public function __construct($con){
            $this->table = 'perfiles';
            parent::__construct($con);
            $this->permisoDAO = new PermisosDAO($con);
        }
        
        // OBTENER TODOS LOS PERFILES
        public function getAll($where = array()){
            $sql = "SELECT id, nombre FROM ".$this->table;
            if(!empty($where)){
                $sql .= ' WHERE '.implode(' ',$where);
            } 
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PerfilEntity');
            return $resultado;

        }

        // OBTENER TODOS LOS PERFILES POR USUARIO
        public function getAllByUser($userId){
            $sql = "SELECT id, nombre  
                    FROM perfiles
                    INNER JOIN user_perfil ON user_perfil.perfil = perfiles.id
                    WHERE user = ".$userId ;  
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PerfilEntity')->fetchAll();
            foreach($resultado as $index=>$perfil){
                $resultado[$index]->setPermisos($this->permisoDAO->getAllByPerfil($perfil->getId()));
            }
            return $resultado;

        }
        
        // OBTENER UN PERFIL
        public function getOne($id){
            $sql = "SELECT nombre, active FROM perfiles WHERE id = ".$id;
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PerfilEntity')->fetch();
            $resultado->setPermisos($this->permisoDAO->getAllByPerfil($id));

            return $resultado;
        }

        // GUARDAR PERFIL
        public function save($data = array()){
            $permisos = $data['permisos'];
            unset($data['permisos']);

            $save = parent::save($data);
            
            $perfilId = $this->con->lastInsertId();
            $sql = '';
            foreach($permisos as $permiso){
                $sql .= 'INSERT INTO perfil_permisos VALUES ('.$perfilId.','.$permiso.');'; 
            }
            $this->con->exec($sql);

            return $save;
        }

        // MODIFICAR PERFIL
        public function modify($id, $data = array()){
            $permisos = $data['permisos'];
            unset($data['permisos']);

            $save = parent::modify($id, $data ); 

            $sql = 'DELETE FROM perfil_permisos WHERE perfilId = '.$id.';';
            foreach($permisos as $permiso){
                $sql .= 'INSERT INTO perfil_permisos VALUES ('.$id.','.$permiso.');'; 
            }
            $this->con->exec($sql);

            return $save;
        }

        // ELIMINAR PERFIL
        public function delete($id){
            $sql = 'SELECT count(1) as cantidad FROM usuario_perfil WHERE perfilId = '.$id;
            $cantidad = $this->con->query($sql)->fetch();
            
            if($cantidad['cantidad'] > 0){
                return 0;
            }else{
                $sql = 'DELETE FROM perfil_permisos WHERE perfilId = '.$id.';';
                $this->con->exec($sql);
                
                return parent::delete($id);
            }
        }

    } 

?>