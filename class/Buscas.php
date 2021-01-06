<?php
    require_once "Sql.php"; //Isso só é necessário quando os testes serão feitos dentro de alguma class

    class Buscas{

        private $conn;

        public function __construct(){
            $this->conn = new Sql();
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

    $tes = new Buscas();
    $res = $tes->searchInss(8974, "dezembro");
    print_r($res);