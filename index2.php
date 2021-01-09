<html>
<head>
	<title>Alterando propriedades do HTML dinamicamente</title>
    <script>
    var codcor = "";
    var nomecor = "";
    var lotacaocor = "";
    var estadocor = "";
        function altercor(cor, labe){
            idcheck = labe.value
            console.log(idcheck)
            if(cor == "green"){
                labe.style.backgroundImage = "linear-gradient(red, white)"
                document.getElementById(idcheck).checked = 0
                cor = "red"
            }
            else{
                labe.style.backgroundImage = "linear-gradient(green, white)"
                document.getElementById(idcheck).checked = 1
                cor = "green"
            }
            return cor;
        }
    
        function changcolor(labe){
            if(labe.value == "Codigo")
                codcor = altercor(codcor, labe)
            if(labe.value == "Nome")
                nomecor = altercor(nomecor, labe)
            if(labe.value == "Lotacao")
                lotacaocor = altercor(lotacaocor, labe)
            if(labe.value == "Estado")
                estadocor = altercor(estadocor, labe)
        }
    </script>
</head>

<body>
    <form if="formu" method="post">
    codigo<input type="checkbox" id="Codigo" name="cod" value="cod">
    nome<input type="checkbox" id="Nome" name="nome" value="nome">
    lotacao<input type="checkbox" id="Lotacao" name="lotacao" value="lotacao">
    estado<input type="checkbox" id="Estado" name="estado" value="estado">

    <input class="radio" type="button" value="Codigo"  id="lab1" onclick="changcolor(this)">
    <input class="radio" type="button" value="Nome" onclick="changcolor(this)">
    <input class="radio" type="button"value="Lotacao" onclick="changcolor(this)">
    <input class="radio" type="button" value="Estado" onclick="changcolor(this)">

    <input type="submit" value="entrar">

    </form>
    <style>
        .radio{background-color: red;background-image: linear-gradient(red, white)}
    </style>
</body>
<?php
$lista = array();
    if(isset($_POST['cod'])){
        if(!empty($_POST['cod']))
            array_push($lista, $_POST['cod']);
    }
    if(isset($_POST['nome'])){
        if(!empty($_POST['nome']))
            array_push($lista, $_POST['nome']);
    }
    if(isset($_POST['lotacao'])){
        if(!empty($_POST['lotacao']))
            array_push($lista, $_POST['lotacao']);
    }
    if(isset($_POST['estado'])){
        if(!empty($_POST['estado']))
            array_push($lista, $_POST['estado']);
    }

    $sql = "SELECT (";

    foreach($lista as $key => $value){
        if($sql != "SELECT (")
            $sql .= ",";
        $sql .= $value;
    }

    $sql .= ") FROM dados WHERE nome = :NOME";

    echo $sql;