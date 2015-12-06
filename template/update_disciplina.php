<?php include 'base.php' ?>

<?php startblock('title') ?>
Listagem de Disciplinas
<?php endblock('title') ?>          

<?php startblock('article') ?>
    <h1>Listagem de Disciplinas</h1>
    <table class="ui fixed table">
        <thead>
            <tr>
                <th>Disciplina</th>
                <th>Descrição</th>
            </tr>
        </thead>
            
        <tbody>
            <?php
                include_once '../model/disciplina.class.php';
                $disciplina = new disciplina;
                $disciplina->getDisciplinas();
            ?>

        </tbody>
    </table>
                
<?php endblock('article') ?>    
