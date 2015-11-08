<!DOCTYPE html>
<html>

    <head>  
        <title>Cadastro de Ocorrências</title>
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
                            <form class="ui form" name="enviar" method="post" action="../recebe_form/recebe_ocorrencia.php">
                                <h1 class="ui dividing header">Cadastro de Ocorrências</h1>
                              
                                <div class="ui label">
                                    <i class="wait icon"></i>
                                    <label id="dataHora" name="data"></label>
                                </div>
                                
                                <!-- input search-->
                                <div class="field">
                                    <label>Professor</label>
                                    <div class="ui fluid icon input">                            
                                        <!--<input type="text" name="nome_professor" placeholder="Professor" required="required">-->
                                        <input type="text" name="nome_professor" placeholder="Professor" value="Ivo Riegel" required="required" readonly>
                                        <i class="write icon"></i>
                                    </div>
                                </div>
                                
                                <div class="field">
                                    <label>Aluno</label>
                                    <div class="ui fluid icon input">
                                      <input type="text" name="nome_aluno" placeholder="Aluno" required="required">
                                      <i class="search icon"></i>
                                    </div>
                                </div>
                                
                                <div class="two fields">
                                    <div class="field">
                                        <label>CPF do Aluno</label>
                                        <div class="ui fluid icon input">                         
                                            <input type="text" value="" name="cpf_aluno" placeholder="xxx.xxx.xxx-xx" required="required" accesskey="c" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" title="xxx.xxx.xxx-xx" maxlength="14" onKeyPress="return numeros(event);" OnKeyUp="mascaraCPF(this);">
                                        </div>
                                    </div>
                                    
                                    <div class="field">
                                        <label>Matrícula</label>
                                        <div class="ui fluid icon input">
                                          <input type="text" name="matricula" placeholder="Matrícula" required="required">
                                          <i class="search icon"></i>
                                        </div>
                                    </div>
                                            
                                </div>
                                
                                <div class="two fields">
                                    <div class="field">    
                                        <label>Turma</label>
                                        <select name="turma">
                                            <option>Turma 1</option>
                                            <option>Turma 2</option>
                                            <option>Turma 3</option>
                                        </select>
                                    </div>
                                    
                                      <div class="field">                            
                                        <label>Disciplina</label>
                                        <select name="disciplina"> 
                                            <option>Disciplina 1</option>
                                            <option>Disciplina 2</option>
                                            <option>Disciplina 3</option>
                                        </select>
                                    </div>
                                </div>
                                
                              
                                
                                <div class="field">
                                    <label>Descrição da Ocorrência</label>
                                    <textarea rows="3" name="ocorrencia" required="required"></textarea>
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
