<?php
class login{
/*------------------VAR------------------------*/
    private $login;
    private $senha;
    private $tipo;

/*------------------GET------------------------*/
    function getLogin() {
        return $this->login;
    }
    function getSenha() {
        return $this->senha;
    }
    function getTipo(){
        return $this->tipo;
    }

/*------------------SET------------------------*/
    function setLogin($login) {
        $this->login = $login;
    }
    function setSenha($senha) {
        $this->senha = $senha;
    }
    function setTipo($tipo){
        $this->tipo = $tipo;
    }

/*------------------DEMAIS FUNÇÕES------------------------*/
    function efetuarLogin($colecao){
        //echo $colecao;
        $condicao = array("email" => $this->login);
        $busca = $colecao->findone($condicao);
        //print_r($busca);

        session_start($busca['tipo']);                
        $_SESSION['nome'] = $busca['nome'];
        $_SESSION['email'] = $busca['email'];
        $_SESSION['tipo'] = $busca['tipo'];
        $type = $busca['tipo'];
        $this->setTipo($type);
        //echo('tipo: '.$this->getTipo());
        echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/home.php">';
        
    }
    
    function efetuarLogout(){
        session_destroy();
        echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/home.php">';
        echo '<script> localStorage.clear()</script>';
    }
}
