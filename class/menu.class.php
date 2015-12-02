<?php
class menu {
    private $tipo;
    
    function getTipo() {
        return $this->tipo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function exibeMenu($type){
        switch ($type) {
            case 'professor' :
                echo('
                <div class="row menu">                    
                    <div class="three wide column"></div>                    
                    <div class="ten wide column">                        
                        <nav class="ui inverted menu">
                            <a class="item active">Home</a>
                            <div class="ui dropdown item">
                                Cadastros
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <div class="item"><a href="./base.php?pg=./cadastros/cadastro_aluno.php&loc=esq">Aluno</a></div>
                                    <div class="item"><a href="./base.php?pg=./cadastros/cadastro_professor.php&loc=esq">Professor</a></div>
                                    <div class="item"><a href="./base.php?pg=./cadastros/cadastro_curso.php&loc=esq">Curso</a></div>
                                    <div class="item"><a href="./base.php?pg=./cadastros/cadastro_disciplina.php&loc=esq">Disciplina</a></div>
                                    <div class="item"><a href="./base.php?pg=./cadastros/cadastro_turma.php&loc=esq">Turma</a></div>
                                </div>
                            </div>
                            <a class="item" href="./base.php?pg=./cadastros/cadastro_ocorrencia.php&loc=esq">Ocorrência</a>
                            <div class="ui right dropdown item active item">
                                <form class="navbar-form navbar-left" method="POST" role="search" action=".">');
                                    echo($_SESSION['nome'].'
                                        <i class="dropdown icon"></i>
                                        <div class="menu">
                                            <div class="item">Perfil</div>
                                            <div class="item">Sair</div>

                                        </div>
                                </form>
                            </div>
                        </nav>
                    </div>
                                
                    <div class="three wide column"></div>
                </div>
                ');            
                break;
            case 'aluno':
                echo('
                <div class="row menu">                    
                    <div class="three wide column"></div>                    
                    <div class="ten wide column">                        
                        <nav class="ui inverted menu">
                            <a class="item active">Home</a>
                            <a class="item" href="./base.php?pg=./visualizacoes/visualiza_ocorrencia.php&loc=esq">Visualizar Ocorrências</a>
                            <div class="ui right dropdown item active item">
                                <form class="navbar-form navbar-left" method="POST" role="search" action=".">');
                                    echo($_SESSION['nome'].'
                                        <i class="dropdown icon"></i>
                                        <div class="menu">
                                            <div class="item">Perfil</div>
                                            <div class="item">Sair</div>

                                        </div>
                                </form>
                            </div>
                        </nav>
                    </div>
                                
                    <div class="three wide column"></div>
                </div>
                '); 
                break;
            default:
                echo('');
                
        }
    }
}
