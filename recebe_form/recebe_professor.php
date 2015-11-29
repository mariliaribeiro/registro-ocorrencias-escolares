<?php               
    include_once '../class/professor.class.php';
    $formulario= new professor;
                   
    $formulario->setNome(filter_input(\INPUT_POST, 'nome'));
    $formulario->setCpf(filter_input(\INPUT_POST, 'cpf'));
    $formulario->setEmail(filter_input(\INPUT_POST, 'email'));
    $formulario->setMatricula(filter_input(\INPUT_POST, 'matricula'));
                                            
    //$formulario->apresentaDados();
    $formulario->insertProfessor();
?>
