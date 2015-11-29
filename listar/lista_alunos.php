<?php
    include_once '../class/aluno.class.php';
    $aluno = new aluno;
    $aluno->listaAlunos();
    unset($aluno);
?>
