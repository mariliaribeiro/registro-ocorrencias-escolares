<?php include 'base.php' ?>

<?php startblock('title') ?>
Listagem de Professores
<?php endblock('title') ?>          

<?php startblock('article') ?>
    <h1>Listagem de Alunos</h1>
    <table class="ui fixed table">
        <thead>
            <tr>
                <th>Nome</td>
                <th>E-mail</th>
                <th>CPF</th>
                <th>Matrícula</th>
            </tr>
        </thead>
            
        <tbody>
            <?php
               include_once '../model/professor.class.php';
                $professor = new professor;
                $professor->getProfessores();
                //unset($professor);
            ?>
        </tbody>
    </table>
                
<?php endblock('article') ?>                 
