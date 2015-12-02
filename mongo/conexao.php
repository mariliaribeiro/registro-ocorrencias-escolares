<?php
    try{
        $conexao = new Mongo('mongodb://localhost');
        $db = $conexao->selectDB('secretaria_escolar');
        $colecao = $db->selectCollection('dados_secretaria');
    }
    catch (MongoConnectionException $e){
        die($e->getMessage());
    }

?>
