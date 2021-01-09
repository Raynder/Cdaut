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