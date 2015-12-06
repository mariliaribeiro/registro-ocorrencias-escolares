<?php
    include_once '../class/turma.class.php';
    include '../mongo/conexao.php';
    $id =  0;

    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        $turma = new turma;
        $turma->deleteTurma($colecao, $id);
    }
?>
