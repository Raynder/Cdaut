<?php
require_once "config.php";

if (isset($_POST['cnome']) || isset($_POST['cod'])){
    if(!empty($_POST['cnome'])){
        $cnome = $_POST['cnome'];
        
        $sql = "SELECT * FROM dados WHERE cnome = '$cnome'";
        $dados = $mysqli->query($sql) or die ($mysqli->error);
        $dado = $dados->fetch_array();
        
        echo("<script>document.getElementById('cons').style.display='block';</script>");
        echo("<script>document.getElementById('cnome').value ='';</script>");
    }
    else{
        if (isset($_POST['cod'])){
            if ($_POST['cod'] > 0){
                $cod = $_POST['cod'];

                $sql = "SELECT * FROM dados WHERE cod = '$cod'";
                $dados = $mysqli->query($sql) or die ($mysqli->error);
                $dado = $dados->fetch_array();
                echo("<script>document.getElementById('cons').style.display='block';</script>");

            }
        }
    }
}


if(isset($_POST['cnome']) || isset($_POST['cod'])){

    $cod = $dado['cod'];
    $nome = $dado['nome'];
    $cpf = $dado['cpf'];
    $ci = $dado['nid'];
    $rua = $dado['rua'];
    $bairro = $dado['bairro'];
    $cidade = $dado['cidade'];
    $estado = $dado['estado'];
    $cep = $dado['cep'];
    $tel = $dado['tel'];
    $cel = $dado['cel'];
    $matricula = $dado['matricula'];
    $pis = $dado['pis'];
    $processo = $dado['processo'];
    $empenho = $dado['empenho'];
    $saldo = $dado['saldo'];
    $stinss = $dado['stinss'];
    $vlinss = $dado['vlinss'];
    $stiss = $dado['stiss'];
    $lotacao = $dado['lotacao'];
    $contrato = $dado['contrato'];
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

<input type="button" value="" class="cons hidden" onclick="mostrar()">
<form method="post" action="" name"form" id="formu">
    <div id="cons">

        <input type="text" class="cod l" id="cod" name="cod" value="<?php echo $cod;?>">
        <input type="text" class="cnome" id="cnome" name="cnome" onclick="rt()">

        <input type="text" class="info1 l" id="nome" value="<?php echo $nome;?>">
        <input type="text" class="info1 l" id="rua"  value="<?php echo $rua;?>">
        <input type="text" class="info2 l" id="bairro" value="<?php echo $bairro;?>">
        <input type="text" class="cep" id="cep" value="<?php echo $cep;?>">
        <input type="text" class="info2 l" id="cidade" value="<?php echo $cidade;?>">
        <input type="text" class="estado" id="estado" value="<?php echo $estado;?>">
        <input type="text" class="l w102" id="cpf" value="<?php echo $cpf;?>">
        <input type="text" class="info3" id="ci" value="<?php echo $ci;?>">
        <input type="text" class="info3 l" id="cel" value="<?php echo $cel;?>">
        <input type="text" class="info3" id="pis" value="<?php echo $pis;?>">
        <input type="text" class="l" id="cbo" value="<?php ?>">
        <input type="text" class="lot" id="lot" value="<?php echo $lotacao;?>">
        <input type="text" class="l w102" id="processo" value="<?php echo $processo;?>">
        <input type="text" class="info3" id="empenho" value="<?php echo $empenho;?>">
        <input type="text" class="l w102" id="saldo" value="<?php echo $saldo;?>">
        <input type="text" class="i" id="inss" value="<?php if ($stinss == ''){
            echo "";
        }
        elseif ($stinss == 1){
         echo "contribuinte";
        }
        else{
            echo "isento";
        }?>">
        <input type="text" class="i" id="iss" value="<?php if ($stiss == ''){
            echo "";
        }
        elseif ($stiss == 1){
         echo "contribuinte";
        }
        else{
            echo "isento";
        }?>">

        <input type="button" value="" class="hidden fin grav" onclick="gravar()">
        <input type="button" value="" class="hidden fin excl" onclick="excluir()">
        <input type="reset" value="" class="hidden fin limp" onclick="limpar()">
        <input type="submit" value="" class="hidden">
        <input id="gerar" onclick="abrirGerar()" class="gerar fin" type="button" value="Gerar Declaração">
        <input id="conf" onclick="" class="fin conf" type="button" value="Avançado">
        

        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        

        <script>
            
            var tes = 0;
            function rt(){
                console.log(tes);
                tes = tes + 1;
            }
            function limpar(){
                document.getElementById('cod').value = "";
                form = document.getElementById('formu');
                form.submit();
            }
            $(function () {
                $("#cnome").autocomplete({
                    source: 'pesq.php'
                });
            });
            function abrirGerar(){
                var te = document.getElementById('complet');
                var wpx = 50;
                var hpx = 50;

                te.style.display = 'block';

                setInterval(function (){
                    if(wpx < 300){
                        te.style.width = wpx+'px';
                        te.style.height = wpx+'px';
                        wpx += 20;
                    }
                }, 8);    
                
            }
            function criardoc(){
                var nome = document.getElementById('nome').value;
                var cpf = document.getElementById('cpf').value;
                var cod = document.getElementById('cod').value;
                var dec = document.getElementById('dec').value;
                var mes = document.getElementById('mes').value;


                var iFrame = document.createElement("iframe");
                iFrame.addEventListener("load", function () { 
                iFrame.contentWindow.focus();
                iFrame.contentWindow.print();
                window.setTimeout(function () {
                    document.body.removeChild(iFrame);
                }, 0);
                });        
                iFrame.style.display = "none";
                iFrame.src = "print.php?nome="+nome+"&cpf="+cpf+"&cod="+cod+"&dec="+dec+"&mes="+mes;
                document.body.appendChild(iFrame);
                }
                //Colocar um event para quando clicar no nome equivalente ao solicitado
                var clic = document.getElementById('ui-id-1');
                clic.addEventListener('click', rt);
        </script>

        <style>
            .gerarinp {
                font-size: 20px;
                text-align: center;
                font-family: fangsong;
                border-radius: 20px;
                border-width: 0.01px;
                outline: none;
                margin-top: 4px;
                }
                .tnGerar {
                    transform: translateX(-50%);
                    background-color: #019CE5;
                    color: #fff;
                    margin-left: 50%;
                    position: relative;
                    padding: 7px;
                    border-radius: 20px;
                    }
                .teste {
                    border-radius: 30px;
                    background-color: #d5e2f0;
                }
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
                <input class="gerarinp" name="dec" type="text" maxlength="50" tabindex="1" class="OSFillParent" placeholder="Informe o Codigo" id="dec" onkeydown="return OsEnterKey(&#39;wt10_wtMainContent_wt23&#39;, arguments[0] || window.event);" aria-invalid="false" style="margin-top: 0px;">
                
                <input type="text" name="cod" style="display: none;" value="<?php echo $cod; ?>">
                <input type="text" name="cpf" style="display: none;" value="<?php echo $cpf; ?>">
                <input type="text" name="nome" style="display: none;" value="<?php echo $nome; ?>">
                
                
                <input name="mes" type="text" maxlength="20" id="mes" tabindex="2" class="gerarinp" placeholder="Informe o Mes" class="inpmes">
                    </span></div>
                    
                    <input class="btnGerar" onclick="criardoc()" type="button" name="wt10$wtMainContent$wt23" value="GERAR" id="wt10_wtMainContent_wt23" tabindex="3"  style="margin-left: 0px;background-color: #019CE5; color: #fff; transform: translateX(-50%);background-color: #019CE5;color: #fff;margin-left: 50%;position: relative;padding: 7px;border-radius: 20px;   top: 13px;">
                    </div>
                    </div>
                    <div align="left" style="margin-top: 20px;">
                        <div class="ThemeGrid_Width1">
                            <span style="display: none;" class="ValidationMessage" role="alert" id="ValidationMessage_wt10_wtMainContent_wt8"></span></div><div class="ThemeGrid_Width10 ThemeGrid_MarginGutter"></div></div></div></div>

    




</form>
    
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
