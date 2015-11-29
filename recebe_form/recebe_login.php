<?php

include_once '../class/login.class.php';

$exelog=new login;

$exelog->setLogin(filter_input(\INPUT_POST, 'email'));
$exelog->setSenha(filter_input(\INPUT_POST, 'senha'));
$exelog->efetuarLogin();

unset($exelog);
