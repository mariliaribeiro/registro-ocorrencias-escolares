<?php include 'base.php' ?>

<?php startblock('title') ?>
Listagem de Cursos
<?php endblock('title') ?>          

<?php startblock('article') ?>
    <h1>Listagem de Cursos</h1> 
    <table class="ui fixed table">
        <thead>
            <tr>
                <th>Curso</th>
                <th>Oferta</th>
                <th>Descrição</th>
            </tr>
        </thead>
            
        <tbody>
            <?php
                include_once '../model/curso.class.php';
                $curso = new curso;
                $curso->getCursos();
                //unset($curso);
            ?>
        </tbody>
    </table>
                
<?php endblock('article') ?>    

