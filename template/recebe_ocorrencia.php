<?php               
    include_once '../model/form.class.php';
    $formulario= new form;
                   
    $formulario->setNomeProf(filter_input(\INPUT_POST, 'nome_professor'));
    $formulario->setNomeAluno(filter_input(\INPUT_POST, 'nome_aluno'));
    $formulario->setCpf(filter_input(\INPUT_POST, 'cpf_aluno'));
    $formulario->setMatricula(filter_input(\INPUT_POST, 'matricula'));            
    $formulario->setTurma(filter_input(\INPUT_POST, 'turma'));
    $formulario->setDisciplina(filter_input(\INPUT_POST, 'disciplina'));
    //$formulario->setHora(filter_input(\INPUT_POST, 'hora'));
    $formulario->setOcorrencia(filter_input(\INPUT_POST, 'ocorrencia'));       
                
    //$formulario->ApresentaDados();
    $formulario->insertOcorrencia();
?>
