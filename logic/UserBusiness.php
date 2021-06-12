<?php

require_once('./../data/UserDAO.php');

class UserBusiness{

    protected $UserDAO;

    function __construct($con){
        $this->UserDAO = new UserDAO($con);
    }

    // OBTENER TODOS LOS USUARIOS
    public function getUsers(){
        $users = $this->UserDAO->getAll(); 
        return $users;
    }
 
    // OBTENER UN USUARIO
    public function getUser($id){
        $users = $this->UserDAO->getOne($id); 
        return $users;
    } 

    // GUARDAR USUARIO
    public function saveUser($datos){
        $datos['password'] = password_hash($datos['password'],PASSWORD_DEFAULT);
        $this->UserDAO->save($datos);
    }

    // MODIFICAR USUARIO 
    public function modifyUser($id,$datos){
        if(!empty($datos['password'])){
            $datos['password'] = password_hash($datos['password'],PASSWORD_DEFAULT);
        }
        $this->UserDAO->modify($id,$datos);
    }

    // ELIMINAR USUARIO
    public function deleteUser($id){ 
        $this->UserDAO->delete($id);
    }

}