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

        include_once 'menu.class.php';
        $menu = new menu;
        $menu->setTipo($type);
        
        //echo('tipo: '.$this->getTipo());
        echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/base.php">';
        
    }
    
    function efetuarLogout(){
        session_destroy();
        echo'<meta http-equiv="refresh" content=1;url="http://localhost/web1/projeto/base.php">';
        echo '<script> localStorage.clear()</script>';
    }
    
    function exibeTelaLogin(){
        echo('
            <form class="ui form" name="enviar" method="post" role="form" action="recebe_form/recebe_login.php">
                <h1 class="ui dividing header">Login</h1>

                <div class="field">
                    <label>E-mail</label>
                    <div class="ui left icon input">
                        <input type="text" name="email" placeholder="E-mail" required="required">
                        <i class="mail icon"></i>
                    </div>
                </div>

                <div class="field">
                    <label>Senha</label>
                    <div class="ui fluid icon input">
                      <input type="password" name="senha" placeholder="Senha" required="required">
                    </div>
                </div>

                 <button class="ui button" type="submit">Entrar</button>

            </form>  
        ');        
    }
}
