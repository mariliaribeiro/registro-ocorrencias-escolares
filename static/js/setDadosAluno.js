function setDadosAluno(){
    var x = document.getElementById('select_aluno');
    valor = x.options[x.selectedIndex].value;
    texto = x.options[x.selectedIndex].text;
    
    setMatricula = document.getElementById('matricula');
    setCpf = document.getElementById('cpf_aluno');
     if(valor !== null)
     {
            div.style.display = 'block';
            setMatricula.value=valor;
            setCpf.value=texto;
     }
}
