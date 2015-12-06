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
            <select name="curso" id="select_curso" required>
                    <option>Selecione um curso</option>
                    <?php
                        include_once '../model/curso.class.php';           
                        $curso = new curso;
                        $curso->selectCurso();
                    ?>
            </select>
        </div>
        
        <div class="field">                            
            <label>Período de Oferta</label>
            <select name="periodo_oferta" id="select_perido_oferta" required>
                    <option>Selecione um período</option>
                    <?php
                        $curso->selectPeriodoOferta();
                    ?>
            </select>
        </div>
        
        <button class="ui button" type="submit">Cadastrar</button>
    </form>
<?php endblock('article') ?>
