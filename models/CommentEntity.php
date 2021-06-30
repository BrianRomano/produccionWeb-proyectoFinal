<?php

    require_once ('BaseEntity.php');

    class CommentEntity extends BaseEntity{
    
        private $email; 
        private $comentario;
        private $rank;
        private $fecha;
        private $producto;
        private $ip;
        private $activo;

        public function __construct(){
            parent::__construct(); 
        }
         

        /**
         * Defino los Getters
         * 
         */
        public function getEmail(){
            return $this->email; 
        } 

        public function getComentario(){
            return $this->comentario;
        }

        public function getRank(){ 
            return $this->rank;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function getProducto(){
            return $this->producto;
        }

        public function getIp(){
            return $this->ip;
        }

        public function getActivo(){
            return $this->activo;
        }
         

        /**
         * Defino los Setters
         * 
         */
        public function setEmail($email){
            $this->email = $email;
        }

        public function setComentario($comentario){
            $this->comentario = $comentario;
        }

        public function setRank($rank){
            $this->rank = $rank;
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
        }

        public function setProducto($producto){
            $this->producto = $producto;
        }

        public function setIp($ip){
            $this->ip = $ip;
        }

        public function setActivo($activo){
            $this->activo = $activo;
        }

    }
