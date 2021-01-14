<?php
ini_set( 'display_errors', 0 ); //Só usei isso, pois o array dados tem 22 posiçoes e usaria muita memoria pra fizer um try/catch para cada
require_once "config.php";

while($con < $cont){
    $dado[$con] = " ";
    $con++;
}

if (isset($_POST['cnome']) || isset($_POST['cod'])){
    $buscas = new Buscas(); //A variavel tem que estão fora do escoplo dos If´s para funcionar em ambos os metodos.
    if(!empty($_POST['cnome'])){
        $cnome = $_POST['cnome'];
        $dado = $buscas->byName($cnome);
    
        echo("<script>document.getElementById('cons').style.display='block';</script>");
        echo("<script>document.getElementById('cnome').value ='';</script>");
    }
    else{
        if (isset($_POST['cod'])){
            if ($_POST['cod'] > 0){
                $cod = $_POST['cod'];
                $dado = $buscas->byCod($cod);

                echo("<script>document.getElementById('cons').style.display='block';</script>");
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cdaut</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <link href="front-end/estyle.css" type="text/css" rel="stylesheet">
    <script src="front-end/script.js"></script>
</head>
<body>
<header>
    <p>
    <a>Cadastros</a>
    <a onclick="gerarRelatorios()">Relatorios</a>
    <a>Configurações</a>
    </p>
</header>
<div class="header2">
    <input src="img/icone-profissionais.png" type="image" value="" class="cons hidden" onclick="mostrar()">
</div>

<form method="post" action="" name="form" id="formu">
    <div id="cons">

        <input type="text" class="cod l" id="cod" name="cod" value="<?php echo $dado[0];?>">
        <input type="text" class="cnome" id="cnome" name="cnome" onclick="rt()">

        <input type="text" class="info1 l" id="nome" value="<?php echo $dado[1];?>">
        <input type="text" class="info1 l" id="rua"  value="<?php echo $dado[4];?>">
        <input type="text" class="info2 l" id="bairro" value="<?php echo $dado[5];?>">
        <input type="text" class="cep" id="cep" value="<?php echo $dado[8];?>">
        <input type="text" class="info2 l" id="cidade" value="<?php echo $dado[6];?>">
        <input type="text" class="estado" id="estado" value="<?php echo $dado[7];?>">
        <input type="text" class="l w102" id="cpf" value="<?php echo $dado[2];?>">
        <input type="text" class="info3" id="ci" value="<?php echo $dado[3];?>">
        <input type="text" class="info3 l" id="cel" value="<?php echo $dado[10];?>">
        <input type="text" class="info3" id="pis" value="<?php echo $dado[12];?>">
        <input type="text" class="l" id="cbo" value="<?php ?>">
        <input type="text" class="lot" id="lot" value="<?php echo $dado[19];?>">
        <input type="text" class="l w102" id="processo" value="<?php echo $dado[13];?>">
        <input type="text" class="info3" id="empenho" value="<?php echo $dado[14];?>">
        <input type="text" class="l w102" id="saldo" value="<?php echo $dado[15];?>">
        <input type="text" class="i" id="inss" value="<?php if ($dado[16] == '') echo ""; elseif ($dado[16] == 1) echo "contribuinte"; else echo "isento"; ?>">
        <input type="text" class="i" id="iss" value="<?php if ($dado[18] == '') echo ""; elseif ($dado[18] == 1) echo "contribuinte"; else echo "isento";?>">

        <input type="button" value="" class="hidden fin grav" onclick="gravar()">
        <input type="button" value="" class="hidden fin excl" onclick="excluir()">
        <input type="reset" value="" class="hidden fin limp" onclick="limpar()">
        <input type="submit" value="" class="hidden">
        <input id="gerar" onclick="abrirGerar()" class="gerar fin" type="button" value="Gerar Declaração">
        <input id="conf" onclick="" class="fin conf" type="button" value="Avançado">
  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <script>
        $(function () {
            $("#cnome").autocomplete({
                source: 'pesq.php'
            });
        });
        </script>

        <style>
            
        </style>
        <img src="img/consulta.png">
    </div>
</form>

<form id=complet class="complet" method="post" action="">

    <div style="" class="teste LoginContainer padding-3 ThemeGrid_Width5" id="wt10_wtMainContent_wtLoginContainer">
    <div>
            <div id="wt10_wtMainContent_wtFormLogin" class="OSAutoMarginTop">
                <div align="center">
                    <p>Gerar Declaração</p>
                    <input class="gerarinp" name="dec" type="text" class="OSFillParent" placeholder="Informe o Codigo" id="dec" style="margin-top: 0px;">
                    
                    <input type="text" name="cod" style="display: none;" value="<?php echo $cod; ?>">
                    <input type="text" name="cpf" style="display: none;" value="<?php echo $cpf; ?>">
                    <input type="text" name="nome" style="display: none;" value="<?php echo $nome; ?>">
                    
                    <input name="mes" type="text" maxlength="20" id="mes" tabindex="2" class="gerarinp" placeholder="Informe o Mes">
                </div>
                        
                <input class="btnGerar" onclick="criardoc()" type="button" name="wt10$wtMainContent$wt23" value="GERAR" id="wt10_wtMainContent_wt23">
            </div>
        </div>
        <div align="left" style="margin-top: 20px;">
            <div class="ThemeGrid_Width1">
                <span style="display: none;" class="ValidationMessage" role="alert" id="ValidationMessage_wt10_wtMainContent_wt8"></span></div><div class="ThemeGrid_Width10 ThemeGrid_MarginGutter">
            </div>
        </div>
    </div>   

</form>

<div class="campoDeFiltros" id="Relatorio">
    <img src="https://www.freeiconspng.com/uploads/red-closed-icon-5.png" width="20" class="close">
    <form action="">
        <h1>Filtro para gerar relatorio</h1>
        <hr></hr>
        <p class="pCampo">Dados:
            <input class="radioDados" type="button" value="Codigo"  id="lab1" onclick="changcolor(this)">
            <input class="radioDados" type="button" value="Nome" onclick="changcolor(this)">
            <input class="radioDados" type="button"value="Lotacao" onclick="changcolor(this)">
            <input class="radioDados" type="button" value="Contrato" onclick="changcolor(this)">
            </p>    <hr></hr>
        <p class="pCampo">Filtro:
            <input class="radioFiltro" type="button" value="Nome" onclick="changcolor(this)">
            <input class="radioFiltro" type="button"value="Lotacao" onclick="changcolor(this)">
            <input class="radioFiltro" type="button" value="Mes do Contrato" onclick="changcolor(this)">
            <input class="radioFiltro" type="button" value="Ano do Contrato" onclick="changcolor(this)">
        </p>
        <hr></hr>
        <p class="pCampo">Condição:
            <input type="text" class="cond" placeholder="Igual a?">
        </p>
        <hr></hr>
        <input type="submit" value="Enviar" class="gerarRel">
        <img alt="" class="load" src="img/load.gif">
            </form>

</div>
    
<style>
    
    #ui-id-1{
        width: 380px;
        border-color: gray;
    }
    .complet{
        display: none;
        position: absolute;
        top:50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .gerar{
        box-shadow: 1px 1px 0px black;
        position: relative;
        left: 185px;
    }
</style>

<?php
if (isset($_POST['cnome'])){
    echo("<script>document.getElementById('cons').style.display='block';</script>");
}
if (isset($_POST['cod'])){
    if ($_POST['cod'] > 0){
        
        echo("<script>document.getElementById('cons').style.display='block';</script>");

    }
}
?>

</body>
</html>
