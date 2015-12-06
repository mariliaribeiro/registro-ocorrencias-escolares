<?php include 'base.php' ?>

<?php startblock('title') ?>
Listagem de Ocorrêcias
<?php endblock('title') ?>          

<?php startblock('article') ?>
    <h1>Listagem de Ocorrências</h1>
    <table class="ui compact celled definition table">
        <thead>
            <tr>
                <th></th>
                <th>Data/Hora</th>
                <th>Aluno</th>
                <th>Descricao da Ocorrência</th>
            </tr>
        </thead>
            
        <tbody>
            <?php
                include_once '../model/ocorrencia.class.php';
                $ocorrencia = new ocorrencia;
                $ocorrencia->getOcorrencias();
            ?>

        </tbody>
    </table>
                
<?php endblock('article') ?>    
