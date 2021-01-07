<?php
require "config.php";
$buscas = new Buscas();

if(isset($_GET['nome'])){
    $nome = $_GET['nome'];
    $cpf = $_GET['cpf'];
    $cod = $_GET['cod'];
    $mes = $_GET['mes'];
    $decla = $_GET['dec'];

    switch($mes){
        case 1:
            $nomemes = "janeiro";
            break;

        case 2:
            $nomemes = "fevereiro";
            break;
           
        case 3:
            $nomemes = "marco";
            break;
          
        case 4:
            $nomemes = "abril";
            break;
          
        case 5:
            $nomemes = "maio";
            break;
          
        case 6:
            $nomemes = "junho";
            break;
         
        case 7:
            $nomemes = "julho";
            break;
         
        case 8:
            $nomemes = "agosto";
            break;
         
        case 9:
            $nomemes = "setembro";
            break;
         
        case 10:
            $nomemes = "outubro";
            break;
         
        case 11:
            $nomemes = "novembro";
            break;
         
        case 12:
            $nomemes = "dezembro";
            break;
                         
    }

    function insertInPosition($str, $pos, $c){
        return substr($str, 0, $pos) . $c . substr($str, $pos, 3). $c . substr($str, 6, 3)."-".substr($str, 9, 2) ;
    }

    $cpf = insertInPosition($cpf, 3, '.');

    $inss = $buscas->searchEspec("inss", $nomemes, "cod", $cod);

    $valor = explode(",", $inss);

    $realnome = $buscas->searchEspec("nome", "tablereal","valor", $valor[0]);
    $centnome = $buscas->searchEspec("nome", "tablecentavos","valor", $valor[1]);
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<style>
    *{
        padding: 0;
        margin: 0;
    }
    body, html{
        width:100%;
        height: 100%;        
    }
    .externo{
        overflow: hidden; /* para que não tenha rolagem se a imagem de fundo for maior que a tela */
        width: 100%;
        height: 100%;
        position: relative;
    }

    .container{
        position: relative;
        width: 612px;
        height: 792px;
        box-shadow: 1px 1px 3px 1px #333;
        border-collapse: separate;
    }
    img{
        width: 100%;
        height: 97%;
        position: absolute;
    }
    .cntLateral{
        width: 358px;
        left: 340px;
        height:50px;
        top: 67px;
        font-size: 11.5px;
        font-weight: bolder;
        margin: 0 0 0 9px;
        position: absolute;
    }
    .titu{
        font-weight: bolder;
        left: 50%;
        transform: translate(-50%);
        top: 189px;
        position: absolute;
    }
    .cod{
        top: 214px;
        left: 50%;
        transform: translate(-50%);
        position: absolute;
    }
    .conteudo{
        font-size: 20px;
        left: 4px;
        right: 25px;
        top: 289px;
        position: absolute;
    }
    .conteudo p{
        font-family: Times New Womam;
        text-indent: 2.5em;
        margin-top:11px;
    }
    .assinatura{
        position:absolute;
        left: 150px;
        width: 260px;
        bottom:200px;
    }
    .assinatura p{
        font-family: Times New Womam;
        margin: 0;
    }
    .l1{
        left: 19px;
        bottom: 60px;
        font-size: 20px;
    }
    .l2{
        left: 37px;
        bottom: 42px;
        font-size: 18px;  
    }
    .l3{
        left: 57px;
        bottom: 26px;
        font-size: 18px;  
    }
    .l4{
        left: 57px;
        bottom: 9px;
        font-size: 18px;  
    }
    .f{
        position: absolute;
        color: white;
        opacity: 0;
    }
    .end2 {
        font-size: 10px;
        position: relative;
        bottom: 135px;
    }
    .end2 p {
        width: 750px;
    }
    div#final {
        position: absolute;
        left: 15px;
        bottom: 50px;
        font-size: 11px;
    }
    
    .total{
        position: fixed; /* posição fixa para que a possível rolagem da tela não revele espaços em branco */
        width: 100%;
        height: 100%;
    }
    .fon{
        font-size: 22px;
    }
    .t0{
        font-size: 19px;
    }
    
</style>
<div class="externo">
    <div class="total">
    <img src="fundo.png">

        <div class="cntLateral">
        <p>Secretaria Municipal da Saude<br>Superintendencia de Administração e Gestão de Pessoas<br>Diretoria de Gestão de Desenvolvimento de Pessoas<br>Gerencia de Administração e Controle de Pessoal</p>

        </div>
        <p class="titu fon">DECLARAÇÃO</p>
        <p class="cod fon"><?php echo $decla; ?>/2021</p>
        
        <div class="conteudo" align="justify">
        
            <p>Declaramos para os devidos fins que o(a) profissional <b><?php echo $nome; ?>, Médico,</b> portador(a) do CPF n° <?php echo $cpf; ?>, <b>é prestador(a) de serviços autônomo(a) – credenciado(a)</b>, lotado(a) nesta Secretaria Municipal de Saúde.</p>
        <p></p><p>Informamos ainda que é descontado mensalmente<b> 11%</b> INSS – Instituto Nacional do Seguro Social, sendo que no mês de <b><?php echo $nomemes; ?>/2020</b>, foi deduzido o valor de R$ <?php echo $inss; ?>   (<?php echo "$realnome e $centnome"; ?>). </p>
        <p></p><p>Ressaltamos que, ocorrendo quaisquer alterações no salário de contribuição e ou seu desligamento, caberá ao (à) contratado (a) a responsabilidade de comunicar aos interessados.</p>
        <p></p><p>Por ser verdade, firmamos e entregamos a presente declaração, conforme assinatura coletada.</p>

        <br><br><p></p><p></p><p class="t0">Gerência de Administração e Controle de Pessoal, <?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
echo strftime('%d de %B de %Y', strtotime('today')); ?>.</p>

        </div>

        <div class="assinatura">
        <p class="f l1"></p>
        <p class="f l2"><b></p>
        <p class="f l3"></p>
        <p class="f l4"></b></p>
        </div>

        </div>
        <div id="final">
        ____________________________________________________________________________________________________________________
        <p class="">Palácio das Campinas Prof. Venerando de Freitas Borges - Paço Municipal</p>
        <p class="">Avenida do Cerrado, n° 999 - Parque Lozandes - Goiânia  GO CEP 74.884-900</p>
        <p class="">Fone/Fax: 3524-1602 / 3524-1069 | e-mail: divcadastrofuncional@sms.goiania.go.gov.br</p>
        </div>
        -->
        </div>
</body>
</html>
