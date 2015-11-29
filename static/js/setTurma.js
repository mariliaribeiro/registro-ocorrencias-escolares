function setTurma(select, label, ){
    
	var x = document.getElementById(select);
    valor = x.options[x.selectedIndex].value;
	texto = x.options[x.selectedIndex].text;
	
    if(valor !== null){
            div.style.display = 'block';
            x.value = valor;
        }
}
