<?php

    require_once('./../data/CommentDAO.php');

    class CommentBusiness{

        protected $commentDao;

        function __construct($con){
            $this->commentDao = new CommentDAO($con); 
        }

        // OBTENER TODOS LOS COMENTARIOS
        public function getComments(){
            $comentarios = $this->commentDao->getAll(); 
            return $comentarios;
        }

        // OBTENER UN COMENTARIO
        public function getComment($id){
            $comentarios = $this->commentDao->getOne($id); 
            return $comentarios;
        }

    } 