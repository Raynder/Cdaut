<?php

    #Esta class tem o Objetivo de fazer a conexão com o banco e realizar todas as SQL que retornam valores de uma busca especifica

    class Sql {

        private $conn;

        public function __construct(){ #Fazer a Conexão instantaneamente
            /* EPIZY
            $host = "sql105.epizy.com";
            $user = "epiz_27027660";
            $pass = "6NSZN2PLXoKv";
            $db = "epiz_27027660_cdaut";
            */
            /* LOCALHOST*/
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "cdaut";
            
            $this->conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        }

        public function query($sql, $params = array()){#Receber a query, os parametros e iniciar o processo
            $stmt = $this->conn->prepare($sql);
            $this->setParam($stmt, $params);
            $stmt->execute();

            return $this->toArray($stmt);
        }

        public function setParam($statemant, $param){ #Setar os parametros da Query
            foreach($param as $paramSql => $paramToSql){
                $statemant->bindParam($paramSql, $paramToSql);
            } 
        }

        public function toArray($statemant){ #Converter o resultado para um Array simples
            $results = $statemant->fetchALL(PDO::FETCH_ASSOC);
            $dados = array();

            foreach($results[0] as $key => $value){
                array_push($dados, $value);
            }
            return $dados;
        }
    }