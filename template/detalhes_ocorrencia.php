<?php include 'base.php' ?>

<?php startblock('title') ?>
Editar  Ocorrência
<?php endblock('title') ?>          

<?php startblock('article') ?>    
    <?php
        include_once '../model/ocorrencia.class.php';
        include '../mongo/conexao.php';
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $busca = array('_id' => new MongoId($id));
            $query = $colecao->findOne($busca); //Realiza a busca

            $id_ocorrencia = $query['_id'];
            $tipo = $query['tipo'];
            $nome_professor = $query['nome_professor'];
            $nome_aluno = $query['nome_aluno'];
            $cpf_aluno = $query['cpf_aluno'];
			$matricula_aluno = $query['matricula_aluno'];
			$turma = $query['turma'];
			$disciplina = $query['disciplina'];
			$descricao_ocorrencia = $query['descricao_ocorrencia'];
			$hora = $query['hora'];
        }
    ?>
    
    <form class="ui form" name="enviar" method="post" action="visualiza_ocorrencias.php">
        <h1 class="ui dividing header">Detalhes da Ocorrência</h1>

        <div class="field">
            <label>Professor</label>
            <div class="ui fluid icon input"> 
                <input type="text" name="nome_professor" placeholder="Professor" value="<?php echo($nome_professor); ?>" required="required" readonly>
            </div>
        </div>
        
        <div class="field">
            <label>Aluno</label>
            <div class="ui fluid icon input">
              <input type="text" name="nome_aluno" value="<?php echo($nome_aluno); ?>" placeholder="Aluno" required="required" readonly>
            </div>
        </div>
        
        <div class="two fields">
            <div class="field">
                <label>CPF do Aluno</label>
                <div class="ui fluid icon input">                         
                    <input type="text" value="" name="cpf_aluno" value="<?php echo($cpf_aluno); ?>" placeholder="xxx.xxx.xxx-xx" required="required" accesskey="c" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" title="xxx.xxx.xxx-xx" maxlength="14" onKeyPress="return numeros(event);" OnKeyUp="mascaraCPF(this);" readonly>
                </div>
            </div>
            
            <div class="field">
                <label>Matrícula</label>
                <div class="ui fluid icon input">
                  <input type="text" name="matricula" value="<?php echo($matricula_aluno); ?>" placeholder="Matrícula" required="required" readonly>
                </div>
            </div>
        </div>

        <div class="field">
            <label>Turma</label>
            <div class="ui fluid icon input">
              <input type="text" name="turma" value="<?php echo($turma); ?>" placeholder="Turma" required="required" readonly>
            </div>
        </div>
        <div class="field">
            <label>Disciplina</label>
            <div class="ui fluid icon input">
              <input type="text" name="disciplina" value="<?php echo($disciplina); ?>" placeholder="Disciplina" required="required" readonly>
            </div>
        </div>
        
        <div class="field">
            <label>Descrição da Ocorrência</label>
            <textarea rows="3" name="ocorrencia" required="required" readonly><?php echo($descricao_ocorrencia); ?></textarea>
        </div>
        
        <button class="ui button" id="singlebutton" name="singlebutton">Voltar</button>
    </form>
<?php endblock('article') ?>
