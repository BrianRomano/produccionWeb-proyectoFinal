<?php

    require_once('./../data/ModelsDAO.php');

    class ModelsBusiness{

        protected $ModelsDao;

        function __construct($con){
            $this->ModelsDao = new ModelsDAO($con);
        }

        // OBTENER TODOS LOS MODELOS
        public function getModels(){
            $modelos = $this->ModelsDao->getAll(); 
            return $modelos;
        }

        // OBTENER UN MODELO
        public function getModel($id){
            $modelos = $this->ModelsDao->getOne($id); 
            return $modelos;
        }

    }