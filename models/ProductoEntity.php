<?php

    require_once ('BaseEntity.php');

    class ProductoEntity extends BaseEntity{
    
        private $titulo;
        private $descripcion;
        private $precio;
        private $imagen;
        private $activo;
        private $destacado;
        private $categoria;

        public function __construct(){
            parent::__construct();
        }

        
        /**
         * Defino los Getters
         * 
         */
        public function getTitulo(){
            return $this->titulo;
        }

        public function getDescripcion()
        {
            return $this->descripcion;
        }

        public function getPrecio(){
            return $this->precio;
        }

        public function getImagen(){
            return $this->imagen;
        }

        public function getActivo(){
            return $this->activo;
        }

        public function getDestacado(){
            return $this->destacado;
        }

        public function getCategoria(){
            return $this->categoria;
        }


        /**
         * Defino los Setters
         * 
         */
        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }

        public function setEntrada($descripcion){
            $this->descipcion = $descripcion;
        }

        public function setPrecio($precio){
            $this->precio = $precio;
        }

        public function setImagen($imagen){
            $this->imagen = $imagen;
        }

        public function setActivo($activo){
            $this->activo = $activo;
        }

        public function setDestacado($destacado){
            $this->destacado = $destacado;
        }

        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }

    }
