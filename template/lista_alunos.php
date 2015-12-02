<?php include 'base.php' ?>

<?php startblock('title') ?>
Listagem de Cursos
<?php endblock('title') ?>          

<?php startblock('article') ?>
    <h1>Listagem de Alunos</h1>
    <table class="ui fixed table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</td>
                <th>Data de Nascimento</th>
                <th>Data de Matrícula</th>
                <th>Matrícula</th>
                <th>Turma</th>
            </tr>
        </thead>
            
        <tbody>
            <?php
                include_once '../model/aluno.class.php';
                $aluno = new aluno;
                $aluno->listaAlunos();
                //unset($aluno);
            ?>

        </tbody>
    </table>
                
<?php endblock('article') ?>    




