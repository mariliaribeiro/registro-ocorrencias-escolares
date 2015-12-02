<?php               
    include_once '../class/curso.class.php';
    $formulario= new curso;
                   
    $formulario->setNomeTurma(filter_input(\INPUT_POST, 'nome_turma'));
    $formulario->setOferta(filter_input(\INPUT_POST, 'curso'));                
    //$formulario->apresentaDados();
    $formulario->insertTurma();
?>
