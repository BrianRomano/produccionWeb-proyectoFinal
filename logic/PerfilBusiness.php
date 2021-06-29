<?php

    require_once('./../data/PerfilDAO.php');

    class PerfilBusiness{

        protected $PerfilDAO;
 
        function __construct($con){
            $this->PerfilDAO = new PerfilDAO($con);
        }

        // OBTENER TODOS LOS PERFILES
        public function getPerfiles(){
            $users = $this->PerfilDAO->getAll(); 
            return $users;
        }

    }