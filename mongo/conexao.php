<?php 
    try{
        //$conexao = new Mongo('mongodb://localhost');
        $conexao = new Mongo('mongodb://root:root@localhost'); //usuario:senha@localhost
        $datb=$conexao->selectDB('secretaria_escolar');
        $colecao=$datb->selectCollection('dados_secretaria');    
        $conexao->close();      
    }
     catch (MongoConnectionException $e){
        die($e->getMessage());
     }     
?>
