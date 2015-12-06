<?php include 'base.php' ?>

<?php startblock('title') ?>
Listagem de Turmas
<?php endblock('title') ?>          

<?php startblock('article') ?>
<h1>Listagem de Turmas</h1>
    <table class="ui fixed table">
        <thead>
            <tr>
                <th>Turma</th>
            </tr>
        </thead>
            
        <tbody>
            <?php
                include_once '../model/turma.class.php';
                $turma = new turma;
                $turma->getTurmas();
                unset($turma);
            ?>
        </tbody>
    </table>                        
<?php endblock('article') ?>
                                   

        

