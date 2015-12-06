<?php include 'base.php' ?>

<?php startblock('title') ?>
Listagem de Cursos
<?php endblock('title') ?>          

<?php startblock('article') ?>
    <h1>Listagem de Alunos</h1>
    <table class="ui compact celled definition table">
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Turma</th>
            </tr>
        </thead>
            
        <tbody>
            <?php
                include_once '../model/aluno.class.php';
                $aluno = new aluno;
                $aluno->listaAlunos();
            ?>

        </tbody>
    </table>
                
<?php endblock('article') ?>    




