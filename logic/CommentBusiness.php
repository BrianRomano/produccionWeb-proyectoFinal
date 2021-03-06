<?php

    require_once('./../data/CommentDAO.php');

    class CommentBusiness{

        protected $commentDao;

        function __construct($con){
            $this->commentDao = new CommentDAO($con); 
        }

        // OBTENER TODOS LOS COMENTARIOS
        public function getComments($datos = array()){ 
            $comentarios = $this->commentDao->getAll($datos); 
            return $comentarios;
        }

        // OBTENER UN COMENTARIO
        public function getComment($id){
            $comentarios = $this->commentDao->getOne($id); 
            return $comentarios;
        }
 
        // GUARDAR COMENTARIO
        public function saveComment($datos){
            $this->commentDao->save($datos);
        }

        // MODIFICAR COMENTARIO
        public function modifyComment($id,$datos){
            $this->commentDao->modify($id,$datos);
        }

        // ELIMINAR COMENTARIO
        public function deleteComment($datos){
            $this->commentDao->delete($datos);
        }
        
    } 