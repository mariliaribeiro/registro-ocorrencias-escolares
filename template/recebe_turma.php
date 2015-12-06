<?php               
    include_once '../model/turma.class.php';
    include '../mongo/conexao.php';

    
    $formulario= new turma;
                   
    $formulario->setTurma(filter_input(\INPUT_POST, 'nome_turma'));
    $formulario->setNomeCurso(filter_input(\INPUT_POST, 'curso'));                
    
    $formulario->insertTurma($colecao);
?>
