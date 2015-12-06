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

        if(!is_null( $_POST['nome_aluno'])) {
            $getId = $_POST['id'];
          
            $id = new MongoId($getId);
            $ocorrencia= new ocorrencia;                   
            $ocorrencia->setNomeProf(filter_input(\INPUT_POST, 'nome_professor'));
            $ocorrencia->setNomeAluno(filter_input(\INPUT_POST, 'nome_aluno'));
            $ocorrencia->setCpf(filter_input(\INPUT_POST, 'cpf_aluno'));
            $ocorrencia->setMatricula(filter_input(\INPUT_POST, 'matricula'));            
            $ocorrencia->setTurma(filter_input(\INPUT_POST, 'turma'));
            $ocorrencia->setDisciplina(filter_input(\INPUT_POST, 'disciplina'));
            $ocorrencia->setOcorrencia(filter_input(\INPUT_POST, 'ocorrencia'));                
            
            $formulario->updateOcorrencia($colecao, $id);
		}
    ?>
    
    <form class="ui form" name="enviar" method="post" action="update_ocorrencia.php">
        <h1 class="ui dividing header">Editar Ocorrência</h1>

        <div class="field">
            <label>Identificação do Curso</label>
            <div class="ui fluid icon input">                            
                <input type="text" name="id" placeholder="Identificação" value="<?php echo($id_ocorrencia); ?>" required="required" readonly>
            </div>
        </div>

        <div class="field">
            <label>Tipo</label>
            <div class="ui fluid icon input">                            
                <input type="text" name="tipo" placeholder="Tipo de Usuário" value="<?php echo($tipo); ?>" required="required" readonly>
            </div>
        </div>

        <div class="field">
            <label>Professor</label>
            <div class="ui fluid icon input"> 
                <input type="text" name="nome_professor" placeholder="Professor" value="<?php echo($nome_professor); ?>" required="required" readonly>
                <i class="write icon"></i>
            </div>
        </div>
        
        <div class="field">
            <label>Aluno</label>
            <div class="ui fluid icon input">
              <input type="text" name="nome_aluno" value="<?php echo($nome_aluno); ?>" placeholder="Aluno" required="required">
              <i class="search icon"></i>
            </div>
        </div>
        
        <div class="two fields">
            <div class="field">
                <label>CPF do Aluno</label>
                <div class="ui fluid icon input">                         
                    <input type="text" value="" name="cpf_aluno" value="<?php echo($cpf_aluno); ?>" placeholder="xxx.xxx.xxx-xx" required="required" accesskey="c" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" title="xxx.xxx.xxx-xx" maxlength="14" onKeyPress="return numeros(event);" OnKeyUp="mascaraCPF(this);">
                </div>
            </div>
            
            <div class="field">
                <label>Matrícula</label>
                <div class="ui fluid icon input">
                  <input type="text" name="matricula" value="<?php echo($matricula_aluno); ?>" placeholder="Matrícula" required="required">
                  <i class="search icon"></i>
                </div>
            </div>
                    
        </div>
        
        <div class="two fields">
            <div class="field">    
                <label>Turma</label>
                <select name="turma" id="select_turma" required>
                    <option><?php echo($turma); ?></option>
                    <?php
                        include_once '../model/turma.class.php';           
                        $turma = new turma;
                        $turma->selectTurma();
                    ?>
                </select>
            </div>
            
              <div class="field">                            
                <label>Disciplina</label>
                <select name="disciplina" id="select_disciplina" required>
                    <option><?php echo($disciplina); ?></option>
                    <?php
                        include_once '../model/disciplina.class.php';           
                        $disciplina = new disciplina;
                        $disciplina->selectDisciplina();
                    ?>
                </select>
            </div>
        </div>
        
        <div class="field">
            <label>Descrição da Ocorrência</label>
            <textarea rows="3" name="ocorrencia" required="required"><?php echo($descricao_ocorrencia); ?></textarea>
        </div>
        
        <!--<button class="ui button" type="submit">Alterar</button>-->
        <button class="ui button" id="singlebutton" name="singlebutton">Alterar</button>
    </form>
<?php endblock('article') ?>
