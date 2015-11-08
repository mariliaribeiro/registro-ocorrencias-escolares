<?php 

//$conexao = new MongoClient('mongodb://localhost'); //servidor sem autenticação ainda
//$datb=$conexao->selectDB('siteIvo'); //base a ser acessada
//$colecao=$datb->selectCollection('progweb');//coleção para manipulação dos dados
//$conexao->close();  

try{
	
    
    $conexao = new Mongo('mongodb://localhost');
    $datb=$conexao->selectDB('secretaria_escolar');
    $colecao=$datb->selectCollection('aluno');    
    $conexao->close();      
}
 catch (MongoConnectionException $e){
    die($e->getMessage());
 }     
?>
