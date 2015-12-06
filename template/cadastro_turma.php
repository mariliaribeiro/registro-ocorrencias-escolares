<?php include 'base.php' ?>

<?php startblock('title') ?>
Cadastro de Cursos
<?php endblock('title') ?>  

<?php startblock('article') ?>
    <form class="ui form" name="enviar" method="post" action="recebe_turma.php">
        <h1 class="ui dividing header">Cadastro de Turmas</h1>
        
        <div class="field">
            <label>Curso</label>
            <?php
                include_once '../model/curso.class.php';
                $curso = new curso;
                $curso->selectCurso();
            ?>
        </div>

        <div class="field">
            <label>Turma</label>
            <div class="ui fluid icon input">                            
                <input type="text" name="nome_turma" placeholder="Turma" value="" required="required">
            </div>
        </div>
          
        <button class="ui button" type="submit">Cadastrar</button>
    </form>
<?php endblock('article') ?>

