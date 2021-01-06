<?php

    class Buscas{

        private $dados array();

        public function __construct($cnome = " "){
            if($cnome != " "){
                $conn = new Sql();
                $sql = "SELECT * FROM dados WHERE cnome = :CNOME";
                $params = array(":CNOME"=>$cnome);

                return $conn->query($sql, $params);
            }
        }
        
    }