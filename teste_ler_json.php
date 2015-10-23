<?php
    $arquivo = 'dados.json';
    $info = file_get_contents($arquivo);
    $lendo = json_decode($info);

    foreach($lendo->usuarios as $campo){
        echo '<b>Nome:</b>'.$campo->nome;
        echo '<br><b>Idade:</b>'.$campo->idade;
        echo '<br><b>E-mail:</b>'.$campo->email;
        echo '<br><b>Profissão:</b>'.$campo->profissao;
        echo '<br><b>Matrícula:</b>'.$campo->matricula;
        echo '<br><b>CPF:</b>'.$campo->cpf;
        echo '<br><b>Turma:</b>'.$campo->turma;
        echo '<br><br>';
    }

    
//json encode
// json decode - decodificar para formato php - array

?>



