<?php include 'base.php' ?>

<?php startblock('title') ?>
Listagem de Disciplinas
<?php endblock('title') ?>          

<?php startblock('article') ?>
    <h1>Listagem de Disciplinas</h1>
    <table class="ui compact celled definition table">
        <thead>
            <tr>
                <th></th>
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
