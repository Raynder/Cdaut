<?php
    require_once "Sql.php"; //Isso só é necessário quando os testes serão feitos dentro de alguma class

    class Buscas{

        private $conn;

        public function __construct(){
            $this->conn = new Sql();
            return $this->conn;
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

        public function searchInss($cod, $mes){
            $sql = "SELECT inss FROM :MES WHERE cod = :COD";
            $params = array(":COD"=>$cod,":MES"=>$mes);
            return $this->conn->query($sql, $params);
        }
    }