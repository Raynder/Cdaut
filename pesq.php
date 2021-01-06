<?php
require_once "config.php";

$cnome = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

$buscas = new Buscas();
$data = $buscas->byName2($cnome);

echo json_encode($data);