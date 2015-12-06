<?php include 'base.php' ?>

<?php startblock('title') ?>
Listagem de Cursos
<?php endblock('title') ?>          

<?php startblock('article') ?>
    <h1>Listagem de Cursos</h1>

   <table class="ui compact celled definition table">
        <thead>
            <tr>
                <th></th>
                <th>Curso</th>
                <th>Descrição</th>
            </tr>
        </thead>
            
        <tbody>
            <?php
                include_once '../model/curso.class.php';
                $curso = new curso;
                $curso->getCursos();
            ?>
        </tbody>
    </table>
                
<?php endblock('article') ?>    

