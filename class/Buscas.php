<?php
    //require_once "Sql.php"; //Isso só é necessário quando os testes serão feitos dentro de alguma class

    class Buscas{

        private $conn;

        public function __construct(){
            $this->conn = new Sql();
        }

        public function byName2($cnome){
            $sql = "SELECT cnome FROM dados WHERE cnome LIKE :CNOME ORDER BY cnome ASC LIMIT 5";
            $param = array(":CNOME"=>$cnome."%");
            return $this->conn->byLike($sql, $param);
        }

        public function byName($cnome){
            $sql = "SELECT * FROM dados WHERE cnome = :CNOME";
            $params = array(":CNOME"=>$cnome);
            return $this->conn->query($sql, $params);
        }

        public function byCod($cod){
            $sql = "SELECT * FROM dados WHERE cod = :COD";
            $params = array(":COD"=>$cod);
            return $this->conn->query($sql, $params);
        }

        //Esta função proucara qualquer valor especifico retornando um resultado
        public function searchEspec($value, $location, $paramName, $param){
            $sql = "SELECT $value FROM $location WHERE $paramName = :VAL";
            $params = array(":VAL"=>$param);
            return $this->conn->query($sql, $params)[0]; //O valor vem como array com apenas uma posição, então pegamos essa posição.
        }

        public function convert($array = array()){
            return $this->conn->convert($array);
        }
    }