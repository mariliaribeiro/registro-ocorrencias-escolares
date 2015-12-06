<?php               
    include_once '../model/aluno.class.php';
    include '../mongo/conexao.php';

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $aluno = new aluno;
        $aluno->deleteAluno($colecao, $id);
    }
?>
