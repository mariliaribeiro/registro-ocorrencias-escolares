<html>
    <head>  
        <title>Sistema de Ocorrências IFC</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-whidth, initial-scale=1.0">
       
        <link rel="stylesheet" type="text/css" href="../../repositorios_interface/semantic/dist/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="static/css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../repositorios_interface/semantic/dist/components/dropdown.css">

        <script defer="defer" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>
        <script type="text/javascript" src="static/js/jquery.js"></script>
        <script src="static/js/js.js"></script>
        <script src="../../repositorios_interface/semantic/dist/semantic.min.js"></script>
        <script src="../../repositorios_interface/semantic/dist/components/dropdown.js"></script>
        <script type="text/javascript" src="../static/js/getDateTime.js"></script>
        <script type="text/javascript" src="../static/js/numeros.js"></script>
        <script type="text/javascript" src="../static/js/mascaraCPF.js"></script>
        <script type="text/javascript" src="../static/js/mascaraData.js"></script>    
        
    </head>

    <body onload="javascript:getDateTime('dataHora');">
        <section>
            <!-- cabeçalho da página -->
            <header>
                <div class="row">
                    <div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;"> 
                        <ul id="menu-barra-temp" style="list-style:none;">
                            <li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED"><a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a></li> 
                            <li><a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a></li>
                        </ul>
                    </div>
                </div>

                 <!--<div class="row menu">                    
                    <div class="three wide column"></div>                    
                    <div class="ten wide column">                        
                        <nav class="ui inverted menu">
                            <a class="item active" href="./base.php">Home</a>
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
                            <div class="ui right dropdown item">
                                Usuario
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <div class="item">Perfil</div>
                                    <div class="item"><a href="login.php">Sair</div>
                                </div>                               
                            </div>
                        </nav>
                    </div>
                                
                    <div class="three wide column"></div>
                </div>-->
                
                <?php                 
                    include_once 'class/menu.class.php';
                    $menu = new menu;
                    $tipo =$menu->getTipo();
                    echo($tipo)
                    //$menu->exibeMen($tipo);
                ?>
                       
            </header>
                        
            <!-- article -->
            <article class="ui grid">
                    <div class="row">
                        <div class="three wide column"></div>
                    
                        <div class="ten wide column">                            
                            <?php
                                //include_once 'class/login.class.php';
                                //$login = new login;
                                //$login->exibeTelaLogin();

                                //include_once 'cadastros/cadastro_aluno.php'; //erro
                                //include_once 'cadastros/cadastro_curso.php';
                                //include_once 'cadastros/cadastro_disciplina.php';
                                //include_once 'cadastros/cadastro_ocorrencia.php'; //erro
                                //include_once 'cadastros/cadastro_professor.php';

                                
                                //include_once 'listar/lista_alunos.php';
                                //include_once 'listar/lista_cursos.php';
                                //include_once 'listar/lista_disciplinas.php'; //erro
                                //include_once 'listar/lista_professores.php';  //erro
                                //include_once 'listar/lista_turmas.php';   //erro
                                                                
                                /*include_once 'class/divisao_conteudo.class.php';
                                $layout = new divisao;
                                $layout->setUser($_SESSION['tipos']);*/
                                
                                /*$layout->setInclusao(filter_input(\INPUT_GET,'pg'));
                                $layout->setLocal(filter_input(\INPUT_GET,'loc'));
                                $layout->divideLayout();
                            */
                            ?>
                            
                        </div>

                        <div class="three wide column"></div>
                    </div>
            </article>

            <!-- rodapé da página -->
            <footer class="ui grid">
                <div class="row">                    
                    <div class="three wide column"></div>
                    
                    <div class="ten wide column">
                        <div class="ui mini image">
                            <img src="static/img/ifc.svg.png">
                        </div>
                    </div>
              
                    <div class="three wide column"></div>
                </div>
            </footer> 
            
        </section>        
    </body>
</html>
