<?php include 'base.php' ?>

<?php startblock('title') ?>
Cadastro de Disciplinas
<?php endblock('title') ?>

<?php startblock('article') ?>
    <form class="ui form" name="enviar" method="post" action="recebe_disciplina.php">
        <h1 class="ui dividing header">Cadastro de Disciplinas</h1>

        <div class="field">
            <label>Disciplina</label>
            <div class="ui fluid icon input">   
                <input type="text" name="nome_disciplina" placeholder="Disciplina" required="required">
            </div>
        </div>

         <div class="field">
            <label>Descrição da Disciplina</label>
            <textarea rows="3" name="descricao_disciplina" required="required"></textarea>
        </div>                        
        
        <div class="field">    
            <label>Curso</label>
            <?php
                include_once '../model/curso.class.php';           
                $curso = new curso;
                $curso->selectCurso();
            ?>
        </div>
        
        <div class="field">                            
            <label>Período de Oferta</label>
            <?php
                $curso->selectPeriodoOferta();
            ?>
        </div>
        
        <button class="ui button" type="submit">Cadastrar</button>
    </form>
<?php endblock('article') ?>
