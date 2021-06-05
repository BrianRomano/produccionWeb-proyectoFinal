<?php

    require_once('BaseEntity.php');

    class PerfilEntity extends BaseEntity{

        protected $nombre;
        protected $permisos;
    
        public function __construct(){
            $this->permisos = array();
            parent::__construct();
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getPermisos(){
            return $this->permisos;
        }

        public function setPermisos($permisos){
            $this->permisos = $permisos;
        }
    
    }

?>