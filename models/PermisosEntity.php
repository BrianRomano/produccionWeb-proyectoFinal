<?php
    
    class PermisosEntity {

        protected $id;
        protected $nombre;
        protected $code;
        protected $module;

        
        public function getId(){
            return $this->id;
        } 

        public function setId($id){
            $this->id = $id;
        }
    
        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getCode(){
            return $this->code;
        }

        public function setCode($code){
            $this->code = $code;
        }

        public function getModule(){
            return $this->module;
        }

        public function setModule($module){
            $this->module = $module;
        }

    }

?>