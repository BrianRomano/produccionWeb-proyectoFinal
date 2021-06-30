<?php

require_once('./../data/ProductoDAO.php');

class ProductoBusiness{ 

    protected $ProductoDao;

    function __construct($con){
        $this->ProductoDao = new ProductoDAO($con);
    }

    // OBTENER TODOS LOS PRODUCTOS
    public function getProductos($datos = array()){
        $productos = $this->ProductoDao->getAll($datos); 
        return $productos;
    } 

    // OBTENER UN PRODUCTO
    public function getProducto($id){
        $productos = $this->ProductoDao->getOne($id); 
        return $productos;
    }

    // GUARDAR PRODUCTO
    public function saveProducto($datos){
        $this->ProductoDao->save($datos);
    }

    // MODIFICAR PRODUCTO
    public function modifyProducto($id, $datos){
        $this->ProductoDao->modify($id, $datos);
    }

    // ELIMINAR PRODUCTO
    public function deleteProducto($datos){
        $this->ProductoDao->delete($datos);
    }

}