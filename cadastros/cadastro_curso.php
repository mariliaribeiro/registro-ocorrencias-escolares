<!DOCTYPE html>
<html>

    <head>  
        <title>Cadastro de Cursos</title>
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
            <!-- nome curso, oferta (anual, semestral), descrição do curso.-->
            <article class="ui grid">
                
                <!--<div class="ui internally celled grid">-->
                    <div class="row">
                        <div class="three wide column"></div>
                    
                        <div class="ten wide column">                      
                            <form class="ui form" name="enviar" method="post" action="../recebe_form/recebe_curso.php">
                                <h1 class="ui dividing header">Cadastro de Cursos</h1>
                              
                                <div class="field">
                                    <label>Curso</label>
                                    <div class="ui fluid icon input">                            
                                        <input type="text" name="nome_curso" placeholder="Curso" value="" required="required">
                                    </div>
                                </div>
                                
                                
                                <div class="field">    
                                    <label>Oferta</label>
                                    <select name="oferta">
                                        <option>Anual</option>
                                        <option>Semestral</option>
                                    </select>
                                </div>
                                
                                <div class="field">
                                    <label>Descrição do Curso</label>
                                    <textarea rows="3" name="descricao_curso" required="required"></textarea>
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
