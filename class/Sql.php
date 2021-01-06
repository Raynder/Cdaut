<?php

    class Sql extends PDO{
        private $conn;

        public function __construct(){
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "cdaut";

            $this->conn = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
        }

        public function toquery($sqlExecut, $param = array()){
            $stmt = $this->conn->prepare($sqlExecut);
            $this->setParams($stmt, $param);
            $stmt->execute();
            return $stmt;
        }

        public function setParams($statement, $params = array()){
            echo "entro no set params";
            foreach ($params as $paramSql => $paramToSql){
                $this->setParam($statement, $paramSql, $paramToSql);
            }
        }

        public function setParam($statement, $paramSql, $paramToSql){
            echo "entro no set param";
            $statement->bindParam($paramSql, $paramToSql);
        }

        public function mostrar(){
            $cone = $this->conn->prepare("SELECT * FROM novembro WHERE cod = 6962");
            $dados = $cone->execute();
        }
    }

    $teste = new Sql();

    $teste->mostrar();