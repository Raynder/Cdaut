<?php

    #Esta class tem o Objetivo de fazer a conexão com o banco e realizar todas as SQL que retornam valores de uma busca especifica

    class Sql extends PDO{

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
        public function byLike($sql, $params = array()){
            $stmt = $this->conn->prepare($sql);
            $this->setParam($stmt, $params);
            $stmt->execute();
            $res = $stmt->fetchALL(PDO::FETCH_ASSOC);
            $dados = array();

            foreach($res as $key => $value){ #Similar ao toArray() porem não se trata de uma matriz e sim de só um objeto
                array_push($dados, $this->convert($value)[0]); #Essa merda ta trazendo em forma de array não sei pq rsrsrs fiz puxar o primeiro valor e pronto!!
            }   #Ahhh ele elimina os 4 nomes e por fim fica so um, porem o tipo continua sendo um array, por isso e preciso pegar a casa [0]
            return $dados;
            #Só pra deixar claro isso aqui e sobre o autocomplete que tem na busca por nome
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

            return $this->convert($results[0]); #Estamos mandando com o valor 0 pois aqui se trata de uma matriz, portanto queremos os valores do primeiro objeto dessa matriz [0][...]
        }
        public function convert($resulFetch = array()){ #Essa função e especial, ela converte a segunda casa de um objeto em um array ;-)
            $dados = array();
            foreach($resulFetch as $key => $value){
                array_push($dados, $value);
            }
            return $dados;
        }
    }