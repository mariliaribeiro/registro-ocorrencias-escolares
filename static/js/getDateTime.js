function getDateTime(label){                                
    var diaSemana = new Array ("Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado")
    
    var data = new Date
    
    //obtem as horas e minutos
    var horas = data.getHours();
    var minutos = data.getMinutes();
    var dia = data.getDate ();
    var mes = (data.getMonth()+1);
    
    //converte as horas, minutos e segundos para string
    var str_horas = new String(horas);
    var str_minutos = new String(minutos);
    var str_dia = new String(dia);
    var str_mes = new String(mes);
    
    //HORAS - se tiver menos que 2 digitos, acrescenta o 0
    if (str_horas.length < 2)
        str_horas = 0 + str_horas;
    if (str_minutos.length < 2)
        str_minutos = 0 + str_minutos;

    //DIA e MÊS - se tiver menos que 2 digitos, acrescenta o 0
    if (str_dia.length < 2)
        str_dia = 0 + str_dia;
    if (str_mes.length < 2)
        str_mes = 0 + str_mes;    
    //cria a string que sera exibida na div
    data = diaSemana[data.getDay() ] + " " + str_dia + "/" + str_mes + "/" + data.getFullYear() + " " + str_horas + ':' + str_minutos;

    //exibe a string na div
    document.getElementById(label).innerHTML = data;
}
