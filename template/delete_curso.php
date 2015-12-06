<?php               
    include_once '../model/curso.class.php';
    include '../mongo/conexao.php';

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $curso = new curso;
        $curso->deleteCurso($colecao, $id);
    }
?>
