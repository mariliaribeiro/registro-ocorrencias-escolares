<?php
    session_start();
    include_once '../model/login.class.php';
    session_start();

    $login = new login;
    echo($_SESSION['nome'].' saindo ...');
    $login->efetuarLogout();

    unset($login);
?>
