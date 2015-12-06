<?php               
    include_once '../model/disciplina.class.php';
    include '../mongo/conexao.php';
    $formulario= new disciplina;
                   
    $formulario->setNomeDisciplina(filter_input(\INPUT_POST, 'nome_disciplina'));
    $formulario->setDescricao(filter_input(\INPUT_POST, 'descricao_disciplina'));
    $formulario->setPeriodoOferta(filter_input(\INPUT_POST, 'periodo_oferta'));
    $formulario->setCursoOferta(filter_input(\INPUT_POST, 'curso'));            
              
    $formulario->insertDisciplina($colecao);
?>
