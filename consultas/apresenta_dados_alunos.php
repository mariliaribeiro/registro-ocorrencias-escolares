<!DOCTYPE html>
<html>
    <head>
        <title>Dados dos Alunos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-whidth, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../../repositorios_interface/semantic/dist/semantic.min.css">
        <script src="../../../repositorios_interface/semantic/dist/semantic.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../static/css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../static/css/apresenta_dados_alunos.css">
        <link rel="stylesheet" type="text/css" href="../static/css/animation.css">
        <link rel="stylesheet" type="text/css" href="../static/css/menu.css">
        <script type="text/javascript" src="../static/js/getDateTime.js"></script>
        <script type="text/javascript" src="../static/js/numeros.js"></script>
        <script type="text/javascript" src="../static/js/mascaraCPF.js"></script>
        <script type="text/javascript" src="../static/js/mascaraData.js"></script>

    </head>
    <body>
        <!-- begin section -->
        <section>
            
            <!-- cabeçalho da página -->
            <header class="ui grid">
                <div class="row">                    
                    <div class="three wide column">
                        <div class="ui three column grid">
                            <div class="column"></div>
                            <div class="column">
                                <a href="#">
                                    <img class="rotacao" src="../static/img/perfil.png" alt="perfil" />
                                </a>
                            </div>
                            <div class="column"></div>
                        </div>                          
                    </div>
                    
                    
                    <div class="ten wide column"></div>
                            
                    <div class="three wide column">
                        <div class="ui three column grid">
                            <div class="column"></div>
                            <div class="column">
                                <nav>                        
                                    <ul id='menu'>
                                        <li class='menuSimples'><a href='#'>Usuário</a>
                                            <ul class='sub-menu hidden'>
                                                <li><a href='#'>Configurações</a></li>
                                                <li><a href='#'>Sair</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <!--<div class="ui dropdown">
                                      Usuário <i class="dropdown icon"></i>
                                      <div class="menu">
                                        <div class="item">Configurações</div>
                                        <div class="item">Sair</div>
                                      </div>
                                    </div>-->
                                </nav>               
                            <div class="column"></div>
                        </div>
                    </div>
                </div>
            </header>
                        
            <!-- conteúdo principal -->
            <article class="ui grid">
                
                
                <?php
					include_once '../class/aluno.class.php';
					$aluno = new aluno;
					$aluno->listaAlunos();
					unset($aluno);
				?>
                
             </article>

            <!-- rodapé da página-->
            <footer class="ui grid">
                <div class="row">                    
                    <div class="three wide column"></div>
                    <div class="ten wide column">
                        <img class="logo" src="../static/img/ifc.svg.png"/>
                    </div>
                    <div class="three wide column"></div>
                </div>
            </footer> 
            
        </section>
        <!-- end section -->
        
    </body>
</html>


