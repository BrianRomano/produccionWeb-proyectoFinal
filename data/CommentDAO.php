<?php

    require_once('DAO.php');
    require_once('./../models/CommentEntity.php');

    class CommentDAO extends DAO{

        function __construct($con){
            parent::__construct($con);
            $this->table = 'comments';
        }

        // OBTENER UN COMENTARIO
        public function getOne($id){
            $sql = "SELECT id,email,comentario,rank,fecha,producto,ip,activo FROM $this->table WHERE id = $id";
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'CommentEntity')->fetch();
        
            return $resultado;
        }

        // OBTENER TODOS LOS COMENTARIOS
        public function getAll($where = array()){
            $sql = "SELECT id,email,comentario,rank,fecha,producto,ip,activo FROM $this->table";
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'CommentEntity')->fetchAll();
            
            return $resultado;
        }
    
    }

?>