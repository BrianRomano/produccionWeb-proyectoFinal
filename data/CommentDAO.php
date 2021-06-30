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

            if(!empty($where['prod'])){
                $sqlWhereStr .= ' AND producto='.$where['prod'];
            }

            if(!empty($where['activo'])){
                $sqlWhereStr .= ' AND activo='.$where['activo'];
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

            foreach($resultado as $index=>$res){
                $resultado[$index]->setProducto($this->ProductoDao->getOne($res->getProducto()));
            }

            return $resultado;
        }

        // GUARDAR COMENTARIO
        public function save($datos = array()){
            $save = parent::save($datos);
            return $save;
        }  

        // MODIFICAR COMENTARIO
        public function modify($id, $datos = array()){
            $modify = parent::modify($id, $datos);
            return $modify;
        }

        // ELIMINAR COMENTARIO 
        public function delete($id){
            $delete = parent::delete($id); 
            return $delete;
        }

    }

?>