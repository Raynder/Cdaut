function gerarRelatorios(){
    document.getElementById('cons').style.display = 'none';
    document.getElementById('Relatorio').style.display = 'block';
}
function closeRelatorio(){
    document.getElementById('Relatorio').style.display = 'none';
}
function mostrar(){
    document.getElementById('cons').style.display = 'block';
}
function gravar() {
    alert('Mudanção feitas qui, não serão salvas no Cdaut original, faça alteraçoes no Cdaut original.')
}
function excluir() {
    alert('Mudanção feitas qui, não serão salvas no Cdaut original, faça alteraçoes no Cdaut original.')
}
function limpar(){
    document.getElementById('cod').value = "";
    form = document.getElementById('formu');
    form.submit();
}
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
function abrirGerar(){
    var cont = 2;
    var te = document.getElementById('complet');
    var te2 = document.getElementById('dec');
    var te3 = document.getElementById('mes');
    var wpx = 50;
    var hpx = 20;

    te.style.display = 'block';

    setInterval(function (){
        if(wpx < 300){
            te.style.width = wpx+'px';
            te.style.height = hpx+'px';

            if(cont < 21){
                te3.style.fontSize = cont+'px';
                te2.style.fontSize = cont+'px';
            }
            wpx += 20;
            hpx += 7;
            if(cont > 9)
                cont += 1;
            if(cont > 11)
                cont += 2;
            else
                cont += 1;

        }
    }, 15);    
    
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
function direcDoc(){
    var nome = document.getElementById('nome').value;
    var cpf = document.getElementById('cpf').value;
    var cod = document.getElementById('cod').value;
    var dec = document.getElementById('dec').value;
    var mes = document.getElementById('mes').value;


    
    window.location.href = "print.php?nome="+nome+"&cpf="+cpf+"&cod="+cod+"&dec="+dec+"&mes="+mes;
}
//Colocar um event para quando clicar no nome equivalente ao solicitado
var clic = document.getElementById('ui-id-1');
clic.addEventListener('click', rt);