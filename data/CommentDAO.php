<?php
 
    require_once('DAO.php');
    require_once('ProductoDAO.php');
    require_once('./../models/CommentEntity.php');

    class CommentDAO extends DAO{ 

        protected $ProductoDao;

        function __construct($con){
            parent::__construct($con);  
            $this->table = 'comments';
            $this->ProductoDao = new ProductoDAO($con);
        }

        // OBTENER UN COMENTARIO
        public function getOne($id){
            $sql = "SELECT id,email,comentario,rank,fecha,producto,ip,activo FROM $this->table WHERE id = $id";
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'CommentEntity')->fetch();
            $resultado->setProducto($this->ProductoDao->getOne($resultado->getProducto()));

            return $resultado;
        }

        // OBTENER TODOS LOS COMENTARIOS
        public function getAll($where = array()){

            $sqlWhereStr = ' WHERE 1=1 ';

            if(!empty($where['id'])){
                $sqlWhereStr .= ' AND producto = '.$where['id'];
            }

            $sql = "SELECT  id,
                            email,
                            comentario,
                            rank,
                            fecha,  
                            producto,
                            ip,
                            activo 
                    FROM $this->table $sqlWhereStr";

            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'CommentEntity')->fetchAll();
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'ProductoEntity')->fetchAll();

            foreach($resultado as $index=>$res){
                $resultado[$index]->setProducto($this->ProductoDao->getOne($res->getProducto()));
            }

            return $resultado;
        }

    }

?>