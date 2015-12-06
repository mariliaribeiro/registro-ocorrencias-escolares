<?php  require_once '../static/phpti-0.9/ti.php' ?>
<html>

    <head>  
        <title>
            <?php startblock('title') ?>
            <?php endblock() ?>
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-whidth, initial-scale=1.0">
       
        <link rel="stylesheet" type="text/css" href="../../../repositorios_interface/semantic/dist/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="../static/css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../../repositorios_interface/semantic/dist/components/dropdown.css">

        <script defer="defer" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>
        <script type="text/javascript" src="../static/js/jquery.js"></script>
        <script src="../static/js/js.js"></script>
        <script src="../../../repositorios_interface/semantic/dist/semantic.min.js"></script>
        <script src="../../../repositorios_interface/semantic/dist/components/dropdown.js"></script>
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
                
                <?php                 
                    include_once '../model/menu.class.php';
                    //include_once 'model/login.class.php';
                    $menu = new menu;
                    //$login = new login;
                    //$tipo = $login->getTipo();
                    //echo($tipo);
                    $menu->exibeMenu('professor');
                ?>
            </header>
                        
            <!-- article -->
            <article class="ui grid">
                    <div class="row">
                        <div class="three wide column"></div>
                    
                        <div class="ten wide column">
                            <?php emptyblock('article') ?>                                             
                        </div>

                        <div class="three wide column"></div>        
            </article>

            <!-- rodapé da página -->
            <footer class="ui grid">
                <div class="row">                    
                    <div class="three wide column"></div>
                    
                    <div class="ten wide column">
                        <div class="ui mini image">
                            <img src="../static/img/ifc.svg.png">
                        </div>
                    </div>
              
                    <div class="three wide column"></div>
                </div>
            </footer>             
        </section>        
    </body>
</html>
