<?php               
    include_once '../model/turma.class.php';
    include '../mongo/conexao.php';

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $turma = new turma;
        $turma->deleteTurma($colecao, $id);
    }
?>
