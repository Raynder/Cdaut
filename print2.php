<!DOCTYPE html>
<html lang="pt-br">

<head>

</head>
<body>
    <header>
        <p class="titulo">Relatorio de Urgencia 24 Horas mes de Novembro</p>
    </header>
</body>
<style>
    table{border: none}
    b{font-size: 13pt;}
    .impar {
        background-color: #1f0d0db8;
        color: white;
        font-weight: bold;
        font-size: 12pt;
    }
</style>
<?php
require_once "config.php";
$buscas = new Buscas();

$res = $buscas->relatorio("lotacao","URGENCIA 24 Horas");
$buscas->exibir($res);
?>

</html>