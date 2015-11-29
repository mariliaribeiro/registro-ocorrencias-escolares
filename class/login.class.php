<?php
class login{
    private $login;
    private $senha;
    private $fim;
    function getFim() {
        return $this->fim;
    }

    function setFim($fim) {
        $this->fim = $fim;
    }

        function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    
        
    function efetuarLogin(){
        include '../mongo/conexao.php';
        $filtro = ['tipo' => ['$exists' => true], 'email'=>  $this->login];
        $projecao = ['nome' => 1, 'email' => 1, 'senha' => 1,'tipo'=>1, '_id' => 0];
        $cursor = $colecao->find($filtro, $projecao);        
           foreach ($cursor as $campo) {
               if(password_verify($this->senha, $campo['senha'])){
                   //print'Oi senhor(a): '.$campo['nome'];
                   session_start('professor');                
                $_SESSION['nome'] = $campo['nome'];
                $_SESSION['email'] = $campo['email'];
                $_SESSION['tipo'] = $campo['tipo'];               
                
                $conexao->close();
                echo'<meta http-equiv="refresh" content="3;url=http://localhost/web1/projeto/base.php">';
                
                echo' <script>
                    // Check browser support
                    if (typeof(Storage) !== "undefined") {
                        // Store
                        localStorage.setItem("lastname","';echo $_SESSION['nome'].'" );
                        // Retrieve
                        document.getElementById("result").innerHTML = localStorage.getItem("lastname");
                    } else {
                        document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
                    }
                    </script>';
                
               }                       
           }
    }
    
    function efetuarLogout(){
        if($this->fim === '1'){
        session_destroy();
        //echo $this->fim;
        //header("location:http://localhost/ProgWebAraquari/proj/home.php");
        echo'<meta http-equiv="refresh" content="2;url=http://localhost/ProgWebAraquari/proj/home.php">';
        echo '<script> localStorage.clear()</script>';
        }
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
