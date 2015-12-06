<?php include 'base.php' ?>

<?php startblock('title') ?>
Perfil
<?php endblock('title') ?>          

<?php startblock('article') ?>
    <form class="ui form" name="enviar" method="post" action=".">
        <h1 class="ui dividing header">Perfil</h1>
        <?php
            include_once '../model/professor.class.php';
            $professor = new professor;
            $professor->getPerfil();
            unset($professor);
        ?>
    </form>
<?php endblock('article') ?>                 
