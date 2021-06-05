<?php

    require_once ('BaseEntity.php');

    class UserEntity extends BaseEntity{
    
        private $nombre;
        private $email; 
        private $user;
        private $password;
        private $perfiles;

        public function __construct(){ 
            parent::__construct();
            $this->perfiles = array();
        }

        /**
         * Defino los Getters
         * 
         */
        public function getNombre(){
            return $this->nombre;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getUser(){
            return $this->user;
        }

        public function getPassword(){
            return $this->password;
        }
        
        public function getPerfiles(){
            return $this->perfiles;
        }
        

        /**
         * Defino los Setters
         * 
         */
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setUser($user){
            $this->user = $user;    
        }

        public function setPassword($password){
            $this->password = $password;
        }
        
        public function setPerfiles($perfiles){
            $this->perfiles = $perfiles;
        }
    }  