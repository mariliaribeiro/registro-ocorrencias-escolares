<?php               
    include_once '../class/curso.class.php';
    include '../mongo/conexao.php';
    
    $formulario= new curso;
                   
    $formulario->setNomeCurso(filter_input(\INPUT_POST, 'nome_curso'));
    $formulario->setOferta(filter_input(\INPUT_POST, 'oferta'));
    $formulario->setDescricao(filter_input(\INPUT_POST, 'descricao_curso'));
    
    $formulario->insertCurso($colecao);
?>
