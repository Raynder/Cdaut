<?php

    require_once "config.php";
    $buscar = new Buscas();

    $dado = $buscar->byName("PABLINE LUCIO PRUDENTE CAMPOS 3544 ");
    $cont = 0;
    $tam = count($dado);

    while($cont < $tam){
        echo $cont." => ".$dado[$cont];
        echo "<br>==========<br>";
        $cont++;
    }