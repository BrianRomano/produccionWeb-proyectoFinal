<?php

    require_once('./../data/CategoryDAO.php');

    class CategoryBusiness{

        protected $CategoryDao;

        function __construct($con){
            $this->CategoryDao = new CategoryDAO($con);
        }

        // OBTENER TODAS LAS CATEGORIAS
        public function getCategories(){
            $categorias = $this->CategoryDao->getAll(); 
            return $categorias;
        }

    }