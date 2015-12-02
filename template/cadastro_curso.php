<?php include 'base.php' ?>

<?php startblock('title') ?>
Cadastro de Cursos
<?php endblock('title') ?>  

<?php startblock('article') ?>
    <form class="ui form" name="enviar" method="post" action="recebe_curso.php">
        <h1 class="ui dividing header">Cadastro de Cursos</h1>
      
        <div class="field">
            <label>Curso</label>
            <div class="ui fluid icon input">                            
                <input type="text" name="nome_curso" placeholder="Curso" value="" required="required">
            </div>
        </div>
        
        
        <div class="field">
            <label>Oferta</label>
            <?php
                include_once '../model/curso.class.php';
                $curso = new curso;
                $curso->selectOferta();
            ?>
        </div>
        
        <div class="field">
            <label>Descrição do Curso</label>
            <textarea rows="3" name="descricao_curso" required="required"></textarea>
        </div>
          
        <button class="ui button" type="submit">Cadastrar</button>
    </form>
<?php endblock('article') ?>

