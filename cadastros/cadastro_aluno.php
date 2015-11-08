<!DOCTYPE html>
<html>

    <head>  
        <title>Cadastro de Alunos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-whidth, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../../repositorios_interface/semantic/dist/semantic.min.css">
        <script src="../../../repositorios_interface/semantic/dist/semantic.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../static/css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../static/css/animation.css">
        <link rel="stylesheet" type="text/css" href="../static/css/menu.css">
        <script type="text/javascript" src="../static/js/getDateTime.js"></script>
        <script type="text/javascript" src="../static/js/numeros.js"></script>
        <script type="text/javascript" src="../static/js/mascaraCPF.js"></script>
        <script type="text/javascript" src="../static/js/mascaraData.js"></script>
    </head>

    <body onload="javascript:getDateTime('dataHora');">
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
                
                <!--<div class="ui internally celled grid">-->
                    <div class="row">
                        <div class="three wide column"></div>
                    
                        <div class="ten wide column">                      
                            <form class="ui form" name="enviar" method="post" action="../recebe_form/recebe_aluno.php">
                                <h1 class="ui dividing header">Cadastro de Alunos</h1>
                              
                                <div class="ui label">
                                    <i class="wait icon"></i>
                                    <label id="dataHora" name="data"></label>
                                </div>
                                
                                <div class="field">
                                    <label>Nome</label>
                                    <div class="ui fluid icon input">                            
                                        <input type="text" name="nome" placeholder="Nome" value="" required="required">
                                    </div>
                                </div>                                                               
                               
                                <div class="field">
                                    <label>CPF</label>
                                    <div class="ui fluid icon input">                         
                                        <input type="text" value="" name="cpf" placeholder="xxx.xxx.xxx-xx" required="required" accesskey="c" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" title="xxx.xxx.xxx-xx" maxlength="14" onKeyPress="return numeros(event);" OnKeyUp="mascaraCPF(this);">
                                    </div>
                                </div>

                                 <div class="field">
                                    <label>Data de Nascimento</label>
                                    <div class="ui left icon input">
                                        <input type="text" name="data_nascimento" placeholder="dd/mm/aaaa" required="required"
                                      accesskey="c" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" title="dd/mm/aaaa" maxlength="10" onKeyPress="return numeros(event);" OnKeyUp="mascaraData(this);">
                                      <i class="calendar icon"></i>
                                    </div>
                                </div>

                                <div class="field">
                                    <label>E-mail</label>
                                    <div class="ui left icon input">
                                        <input type="text" name="email" placeholder="E-mail" required="required">
                                        <i class="mail icon"></i>
                                    </div>
                                </div>

                                <div class="field">
                                    <label>Matrícula</label>
                                    <div class="ui fluid icon input">
                                      <input type="text" name="matricula" placeholder="Matrícula" required="required">
                                    </div>
                                </div>

                                <div class="field">    
                                    <label>Turma</label>
                                    <select name="turma">
                                        <option>Turma 1</option>
                                        <option>Turma 2</option>
                                        <option>Turma 3</option>
                                    </select>
                                </div>
                                    
                                <button class="ui button" type="submit">Cadastrar</button>
                            </form>
                        </div>
                    
                        <div class="three wide column"></div>
                    </div>
                <!--</div>-->
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
