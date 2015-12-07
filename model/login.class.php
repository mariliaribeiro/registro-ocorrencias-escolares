<?php
class login{
/*------------------VAR------------------------*/
    private $login;
    private $senha;

/*------------------GET------------------------*/
    function getLogin() {
        return $this->login;
    }
    function getSenha() {
        return $this->senha;
    }

/*------------------SET------------------------*/
    function setLogin($login) {
        $this->login = $login;
    }
    function setSenha($senha) {
        $this->senha = $senha;
    }

/*------------------DEMAIS FUNÇÕES------------------------*/
    function efetuarLogin($colecao){
        $condicao = array("email" => $this->login);
        $busca = $colecao->findone($condicao);
        
        if(password_verify($this->senha, $busca['senha'])){
            session_start($busca['tipo']);                
            $_SESSION['nome'] = $busca['nome'];
            $_SESSION['email'] = $busca['email'];
            $_SESSION['tipo'] = $busca['tipo'];
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/home.php">';
        }else{
            echo('Senha incorreta!');
            echo'<meta http-equiv="refresh" content=2;url="http://localhost/web1/projeto/template/login.php">';
        }
    }
    
    function efetuarLogout(){
            session_destroy();
            echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/template/login.php">';
    }
}
