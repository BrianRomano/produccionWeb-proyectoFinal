<?php

    abstract class DAO{

        protected $con;
        protected $table;

        public abstract function getOne($id);
        public abstract function getAll($where = array());

        public function __construct($con){
            $this->con = $con;
        }
        
        // GUARDAR
        public function save($datos = array()){

            $column =array();
            $values = array();
            
            foreach($datos as $key=>$value){
                if(!empty($value)){
                    $column[] = $key;
                    $values[] = $value;
                }
            }

            $sql = "INSERT INTO ".$this->table."(".implode(',',$column).") VALUES ('".implode("','",$values)."')";
            return $this->con->exec($sql);
        }

        // MODIFICAR 
        public function modify($id, $datos = array()){
            $set=array(); 
            
            foreach($datos as $key=>$value){
                if(!empty($value)){
                    $set[] = $key."='".$value."'"; 
                }
            }

            $sql = "UPDATE ".$this->table." SET ".implode(',',$set).",WHERE id = ".$id;

            return $this->con->exec($sql);
        }

        // ELIMINAR
        public function delete($id){
            $sql = "DELETE FROM $this->table WHERE id = $id";
            
            return $this->con->exec($sql);
        }

    }

?>