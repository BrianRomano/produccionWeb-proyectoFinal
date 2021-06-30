<?php

    require_once('DAO.php');
    require_once('CategoryDAO.php');
    require_once('ModelsDAO.php');
    require_once('./../models/ProductoEntity.php');
    require_once('./../models/CategoryEntity.php');
    require_once('./../models/ModelsEntity.php');

    class ProductoDAO extends DAO{

        protected $CategoryDao;
        protected $ModelsDao;

        function __construct($con){
            parent::__construct($con);
            $this->table = 'productos';
            $this->CategoryDao = new CategoryDAO($con);
            $this->ModelsDao = new ModelsDAO($con);  
        }

        // OBTENER UN PRODUCTO
        public function getOne($id){
            $sql = "SELECT id,titulo,descripcion,precio,imagen,activo,destacado,categoria,modelo FROM $this->table WHERE id = $id";
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'ProductoEntity')->fetch();

            $resultado->setCategoria($this->CategoryDao->getOne($resultado->getCategoria()));
            $resultado->setModelo($this->ModelsDao->getOne($resultado->getModelo()));

            return $resultado;
        }

        // OBTENER TODOS LOS PRODUCTOS
        public function getAll($where = array()){

            $sqlWhereStr = ' WHERE 1=1 ';

            $sqlOrderBy = ' titulo ';

            if(!empty($where['cat'])){
                $sqlWhereStr .= ' AND categoria = '.$where['cat'];
            }

            if(!empty($where['mod'])){
                $sqlWhereStr .= ' AND modelo = '.$where['mod'];
            }

            if(!empty($where['dest'])){ 
                $sqlWhereStr .= ' AND destacado = '.$where['dest'];
            }

            if(!empty($where['asc'])){
                $sqlOrderBy .= $where['asc'];
            }

            if(!empty($where['desc'])){
                $sqlOrderBy .= $where['desc'];
            }

            if(!empty($where['rank'])){
                return getAllByRank();
            }

            $sql = "SELECT  id,
                            titulo,
                            descripcion,
                            precio,
                            imagen,  
                            activo,
                            destacado,
                            categoria, 
                            modelo
                    FROM $this->table $sqlWhereStr ORDER BY $sqlOrderBy";

            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'ProductoEntity')->fetchAll();

            foreach($resultado as $index=>$res){
                $resultado[$index]->setCategoria($this->CategoryDao->getOne($res->getCategoria()));
                $resultado[$index]->setModelo($this->ModelsDao->getOne($res->getModelo()));
            }

            return $resultado;
        }

        // OBTENER TODOS LOS PRODUCTOS SEGUN RANK
        public function getAllByRank(){

            $sql = "SELECT  id,
                            titulo,
                            descripcion,
                            precio,
                            imagen,  
                            activo,
                            destacado,
                            categoria, 
                            modelo
                            FROM $this->table INNER JOIN comments ON comments.producto = productos.id ORDER BY rank ASC";
                            
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'ProductoEntity')->fetchAll();

            foreach($resultado as $index=>$res){
                $resultado[$index]->setCategoria($this->CategoryDao->getOne($res->getCategoria()));
                $resultado[$index]->setModelo($this->ModelsDao->getOne($res->getModelo()));
            }

            return $resultado;
        }

        // GUARDAR PRODUCTO
        public function save($datos = array()){
            $save = parent::save($datos);
            return $save;
        }  

        // MODIFICAR PRODUCTO
        public function modify($id, $datos = array()){
            $modify = parent::modify($id, $datos);
            return $modify;
        }

        // ELIMINAR PRODUCTO
        public function delete($id){
            $delete = parent::delete($id); 
            return $delete;
        }

    }

?> 
