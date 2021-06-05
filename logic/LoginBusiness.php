<?php

    require_once('./../data/UserDAO.php');

    class LoginBusiness{

        protected $UserDAO;

        function __construct($con){
            $this->UserDAO = new UserDAO($con);
        }

        // LOGUEAR USUARIO
        function login($datos = array()){
            $user = $this->UserDAO->getOne($datos['user'],'user');  
            if(!empty($user)){
                if(password_verify($datos['pass'],$user->getPassword())){ 
                    $_SESSION['user']['id'] = $user->getId();
                    $_SESSION['user']['nombre'] = $user->getNombre();
                    $_SESSION['user']['email'] = $user->getEmail();
                    $_SESSION['user']['permisos'] = $this->getPermisos($user);
                }
            }else{
                return false;
            }
            return true;
        }

        // OBTENER PERMISOS DE USUARIO LOGUEADO
        function getPermisos($usuario){
            $permisos = array();
            foreach($usuario->getPerfiles() as $perfil){
                foreach($perfil->getPermisos() as $permiso){
                    $permisos['code'][$permiso->getCode()] = $permiso->getCode();
                    $permisos['module'][$permiso->getModule()] = $permiso->getModule();
                }
            }
            return $permisos;
        }

        // CERRAR SESION
        function logout(){
            unset($_SESSION['user']);
        }

        // COMPROBAR LOGEO
        function isLoged(){
            if(!empty($_SESSION['user']['id'])){
                return true;
            }
            return false;
        }
        
    }

?>