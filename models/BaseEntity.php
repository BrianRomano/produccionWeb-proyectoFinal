<?php

    class BaseEntity{

        protected $id;

        public function __construct(){}

        /**
         * Defino los Getters
         * 
         */
        public function getId(){
            return $this->id;
        }
    
        /**
         * Defino los Setters
         * 
         */
        public function setId($id){
            $this->id = $id;
        }
    
    }  