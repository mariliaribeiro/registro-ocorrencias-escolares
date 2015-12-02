<?php

include_once '../model/login.class.php';

include '../mongo/conexao.php';
$login=new login;

$login->setLogin(filter_input(\INPUT_POST, 'email'));
$login->setSenha(filter_input(\INPUT_POST, 'senha'));
$login->efetuarLogin($colecao);

unset($login);
