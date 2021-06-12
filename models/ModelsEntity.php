<?php

    require_once ('BaseEntity.php');

    class ModelsEntity extends BaseEntity{
    
        private $nombre;
        private $activo;
        private $categoria;

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

        public function getCategoria(){
            return $this->categoria;
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

        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }

    }
