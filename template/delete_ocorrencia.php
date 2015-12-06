<?php               
    include_once '../model/ocorrencia.class.php';
    include '../mongo/conexao.php';

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $ocorrencia = new ocorrencia;
        $ocorrencia->deleteOcorrencia($colecao, $id);
    }
?>
