<?php               
    include_once '../model/disciplina.class.php';
    include '../mongo/conexao.php';

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $disciplina = new disciplina;
        $disciplina->deleteDisciplina($colecao, $id);
    }
?>
