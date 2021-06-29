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

        // OBTENER UNA CATEGORIA
        public function getCategorie($id){
            $categorias = $this->CategoryDao->getOne($id); 
            return $categorias;
        }

        // GUARDAR CATEGORIA
        public function saveCategory($datos){
            $this->CategoryDao->save($datos);
        }

        // MODIFICAR CATEGORIA
        public function modifyCategory($id,$datos){
            $this->CategoryDao->modify($id,$datos);
        }

        // ELIMINAR CATEGORIA
        public function deleteCategory($datos){
            $this->CategoryDao->delete($datos);
        }

    }