<?php

    require_once('DAO.php');
    require_once('PerfilDAO.php');
    require_once('./../models/UserEntity.php');

    class UserDAO extends DAO{

        protected $perfilDAO;

        function __construct($con){
            parent::__construct($con);
            $this->table = 'users'; 
            $this->perfilDAO = new PerfilDAO($con);
        }

        // OBTENER UN USUARIO
        public function getOne($data,$by = 'id'){
            $sql = "SELECT id,nombre,email,user,password  FROM $this->table WHERE $by = '$data'";
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'UserEntity')->fetch();
            if($resultado){
                $resultado->setPerfiles($this->perfilDAO->getAllByUser($resultado->getId()));
            }else{
                $resultado = new UserEntity();
            }
            return $resultado;
        }

        // OBTENER TODOS LOS USUARIOS
        public function getAll($where = array()){
            $sql = "SELECT id,nombre,email,user,password FROM $this->table"; 
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'UserEntity')->fetchAll();
            foreach($resultado as $index=>$user){
                $resultado[$index]->setPerfiles($this->perfilDAO->getAllByUser($user->getId()));
            }
            return $resultado;
        }

        // GUARDAR USUARIO
        public function save($datos = array()){
            $perfiles = $datos['perfiles'];
            unset($datos['perfiles']);
            
            $save = parent::save($datos);
            $id = $this->con->lastInsertId();

            $sql = '';
            foreach($perfiles as $perfil){
                $sql .= 'INSERT INTO user_perfil VALUES('.$id.','.$perfil.');';
            }
            $this->con->exec($sql);

            return $save;
        } 

        // MODIFICAR USUARIO
        public function modify($id, $datos = array()){
            $perfiles = $datos['perfiles'];
            unset($datos['perfiles']);
            $modify = parent::modify($id, $datos);

            $sql = 'DELETE FROM user_perfil WHERE user = '.$id.';';
            foreach($perfiles as $perfil){
                $sql .= 'INSERT INTO user_perfil VALUES('.$id.','.$perfil.');';
            }
            $this->con->exec($sql);

            return $modify;
        }

        // ELIMINAR USUARIO
        public function delete($id){
            $sql = 'DELETE FROM user_perfil WHERE user = '.$id.';';
            $this->con->exec($sql);
            return parent::delete($id);
        }

    }

?>