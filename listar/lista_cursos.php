<?php
    include_once 'class/curso.class.php';
    $curso = new curso;
    $curso->listaCursos();
    unset($curso);
?>

