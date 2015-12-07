<?php               
    include_once '../model/aluno.class.php';
    include '../mongo/conexao.php';
    
    $formulario = new aluno;
                   
    $formulario->setNome(filter_input(\INPUT_POST, 'nome'));
    $formulario->setCpf(filter_input(\INPUT_POST, 'cpf'));
    $formulario->setEmail(filter_input(\INPUT_POST, 'email'));    
    $formulario->setSenha(filter_input(\INPUT_POST, 'senha'));
    $formulario->setDataNascimento(filter_input(\INPUT_POST, 'data_nascimento'));
    $formulario->setDataMatricula(filter_input(\INPUT_POST, 'data_matricula'));            
    $formulario->setTurma(filter_input(\INPUT_POST, 'turma'));     

    $formulario->insertAluno($colecao);
?>
