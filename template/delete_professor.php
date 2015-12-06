<?php               
    include_once '../model/professor.class.php';
    include '../mongo/conexao.php';

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $professor = new professor;
        $professor->deleteProfessor($colecao, $id);
    }
?>
