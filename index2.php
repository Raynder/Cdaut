<?php

require_once "config.php";

$conn = new Sql();

$sql = "select * from tablereal where valor = :COD";
$param = array(":COD"=>'20');

$dados = $conn->toquery($sql, $param);

//echo json_encode($dados);