<?php               
    include_once '../model/professor.class.php';
    include '../mongo/conexao.php';
    
    $formulario= new professor;
                   
    $formulario->setNome(filter_input(\INPUT_POST, 'nome'));
    $formulario->setCpf(filter_input(\INPUT_POST, 'cpf'));
    $formulario->setEmail(filter_input(\INPUT_POST, 'email'));
    $formulario->setSenha(filter_input(\INPUT_POST, 'senha'));
    $formulario->setMatricula(filter_input(\INPUT_POST, 'matricula'));
                                            
    $formulario->insertProfessor($colecao);
?>
