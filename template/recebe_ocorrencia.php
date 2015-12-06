<?php               
    include_once '../model/form.class.php';
    include '../mongo/conexao.php';
    
    $ocorrencia= new form;
                   
    $ocorrencia->setNomeProf(filter_input(\INPUT_POST, 'nome_professor'));
    $ocorrencia->setNomeAluno(filter_input(\INPUT_POST, 'nome_aluno'));
    $ocorrencia->setCpf(filter_input(\INPUT_POST, 'cpf_aluno'));
    $ocorrencia->setMatricula(filter_input(\INPUT_POST, 'matricula'));            
    $ocorrencia->setTurma(filter_input(\INPUT_POST, 'turma'));
    $ocorrencia->setDisciplina(filter_input(\INPUT_POST, 'disciplina'));
    $ocorrencia->setOcorrencia(filter_input(\INPUT_POST, 'ocorrencia'));       
                
    $ocorrencia->insertOcorrencia($colecao);
?>
