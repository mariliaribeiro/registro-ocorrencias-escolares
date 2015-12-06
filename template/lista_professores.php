<?php include 'base.php' ?>

<?php startblock('title') ?>
Listagem de Professores
<?php endblock('title') ?>          

<?php startblock('article') ?>
    <h1>Listagem de Professores</h1>
    <table class="ui compact celled definition table">
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>E-mail</th>               
            </tr>
        </thead>
            
        <tbody>
            <?php
                include_once '../model/professor.class.php';
                $professor = new professor;
                $professor->getProfessores();
            ?>
        </tbody>
    </table>                
<?php endblock('article') ?>                 
