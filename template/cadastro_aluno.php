<?php include 'base.php' ?>

<?php startblock('title') ?>
Cadastro de Alunos
<?php endblock('title') ?>          

<?php startblock('article') ?>    

    <form class="ui form" name="enviar" method="post" action="recebe_aluno.php">
        <h1 class="ui dividing header">Cadastro de Alunos</h1>
        <div class="ui label">
            <i class="wait icon"></i>
            <label id="dataHora" name="data"></label>
        </div>

        <div class="field">
            <label>Nome</label>
            <div class="ui fluid icon input">                            
                <input type="text" name="nome" placeholder="Nome" value="" required="required">
            </div>
        </div>

        <div class="field">
            <label>CPF</label>
            <div class="ui fluid icon input">                         
                <input type="text" value="" name="cpf" placeholder="xxx.xxx.xxx-xx" required="required" accesskey="c" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" title="xxx.xxx.xxx-xx" maxlength="14" onKeyPress="return numeros(event);" OnKeyUp="mascaraCPF(this);">
            </div>
        </div>

        <div class="field">
            <label>Data de Nascimento</label>
            <div class="ui left icon input">
                <input type="text" name="data_nascimento" placeholder="dd/mm/aaaa" required="required"
              accesskey="c" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" title="dd/mm/aaaa" maxlength="10" onKeyPress="return numeros(event);" OnKeyUp="mascaraData(this);">
              <i class="calendar icon"></i>
            </div>
        </div>

        <div class="field">
            <label>E-mail</label>
            <div class="ui left icon input">
                <input type="text" name="email" placeholder="E-mail" required="required">
                <i class="mail icon"></i>
            </div>
        </div>

        <div class="field">
            <label>Senha</label>
            <div class="ui left icon input">
                <input type="password" name="senha" placeholder="Senha" required="required">
                <i class="lock icon"></i>
            </div>
        </div>

        <div class="field">
            <label>Matrícula</label>
            <div class="ui fluid icon input">
              <input type="text" name="matricula" placeholder="Matrícula" required="required">
            </div>
        </div>

        <div class="field">    
            <label>Turma</label>
            <select name="turma" id="select_turma" required>
                <option>Selecione uma turma</option>

                <?php
                    include_once '../model/turma.class.php';           
                    $turma = new turma;
                    $turma->selectTurma();
                ?>
            </select>
        </div>                                
        <button class="ui button" type="submit">Cadastrar</button>
    </form>
<?php endblock('article') ?>                                                 
       
      


            
