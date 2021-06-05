<?php

    require_once ('BaseEntity.php');

    class CategoryEntity extends BaseEntity{
    
        private $nombre;
        private $activo;
        private $padre;

        public function __construct(){
            parent::__construct();
        }

        
        /**
         * Defino los Getters
         * 
         */
        public function getNombre(){
            return $this->nombre;
        }

        public function getActivo(){
            return $this->activo;
        }

        public function getPadre(){
            return $this->padre;
        }
    

        /**
         * Defino los Setters
         * 
         */
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setActivo($activo){
            $this->activo = $activo;
        }

        public function setPadre($padre){
            $this->padre = $padre;
        }

    }
