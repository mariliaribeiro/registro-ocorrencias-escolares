<?php

 
	$conexao = new MongoClient();// Estabelece uma conexão com o MongoDB
	$db = $conexao->selectDB('secretaria');// Seleciona um banco, caso não exista o MongoDB cria.
	$colecao = $db->ifc;//Cria a coleção ifc(Caso nao exista).
    
    /*try{
        $conexao = new Mongo('mongodb://localhost');
        $db = $conexao->selectDB('secretaria_escolar');
        $colecao = $db->selectCollection('dados_secretaria');
    }
    catch (MongoConnectionException $e){
        die($e->getMessage());
    }*/
?>
