function getDateTime(label){                                
    var diaSemana = new Array ("Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado")
    
    var data = new Date
    
    //obtem as horas e minutos
    var horas = data.getHours();
    var minutos = data.getMinutes();
    
    //converte as horas, minutos e segundos para string
    var str_horas = new String(horas);
    var str_minutos = new String(minutos);
    
    //se tiver menos que 2 digitos, acrescenta o 0
    if (str_horas.length < 2)
        str_horas = 0 + str_horas;
    if (str_minutos.length < 2)
        str_minutos = 0 + str_minutos;
    
    //cria a string que sera exibida na div
    data = diaSemana[data.getDay() ] + " " + data.getDate () + "/" + (data.getMonth()+1) + "/" + data.getFullYear() + " " + str_horas + ':' + str_minutos;

    //exibe a string na div
    document.getElementById(label).innerHTML = data;
}
