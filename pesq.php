<?php
require_once "config.php";

$cnome = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

$buscas = new Buscas();
$data = $buscas->byName2($cnome);

echo json_encode($data);

/*

$mysqli = new mysqli("localhost", "root", "", "cdaut");

$cnome = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

$sql = "SELECT * FROM dados WHERE cnome LIKE '".$cnome."%' ORDER BY cnome ASC LIMIT 5";

$con = $mysqli->query($sql) or die ($mysqli->error);

while($dado = $con->fetch_array()){
    $nome = $dado['cnome'];
    $data[] = $nome;
}

echo json_encode($data);*/