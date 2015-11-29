<?php
    include_once '../class/disciplina.class.php';
    $disciplina = new disciplina;
    $disciplina->listaDisciplinas();
    unset($disciplina);
?>
