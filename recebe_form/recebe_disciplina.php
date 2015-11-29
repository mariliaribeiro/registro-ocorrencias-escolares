<?php               
    include_once '../class/disciplina.class.php';
    $formulario= new disciplina;
                   
    $formulario->setNomeDisciplina(filter_input(\INPUT_POST, 'nome_disciplina'));
    $formulario->setDescricao(filter_input(\INPUT_POST, 'descricao_disciplina'));
    $formulario->setPeriodoOferta(filter_input(\INPUT_POST, 'periodo_oferta'));
    $formulario->setCursoOferta(filter_input(\INPUT_POST, 'curso'));            
              
    //$formulario->apresentaDados();
    $formulario->insertDisciplina();
?>
