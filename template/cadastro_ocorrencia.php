<?php include 'base.php' ?>

<?php startblock('title') ?>
Cadastro de Ocorrências
<?php endblock('title') ?>

<?php
    include_once '../model/aluno.class.php';
    include '../mongo/conexao.php';
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $busca = array('_id' => new MongoId($id));
        $query = $colecao->findOne($busca); //Realiza a busca

        $cpf_aluno = $query['cpf'];
        $matricula_aluno = $query['matricula'];
    }        
?>

<?php startblock('article') ?>
    <form class="ui form" name="enviar" method="post" action="recebe_ocorrencia.php">
        <h1 class="ui dividing header">Cadastro de Ocorrências</h1>
      
        <div class="ui label">
            <i class="wait icon"></i>
            <label id="dataHora" name="data"></label>
        </div>
        
        <!-- input search-->
        <div class="field">
            <label>Professor</label>
            <div class="ui fluid icon input"> 
                <input type="text" name="nome_professor" placeholder="Professor" value="<?php echo $_SESSION['nome'] ?>" required="required" readonly>
                <!--<i class="write icon"></i>-->
            </div>
        </div>
        
        <!--<div class="field">
            <label>Aluno</label>
            <div class="ui fluid icon input">
              <input type="text" name="nome_aluno" placeholder="Aluno" required="required">-->
              <!--<i class="search icon"></i>-->
            <!--</div>
        </div>-->

        <div class="field">    
                <label>Aluno</label>
                
                <select name="nome_aluno" id="select_aluno" onChange='setDadosAlunos()' required>
                    <option>Selecione um aluno</option>
                    <?php
                        include_once '../model/aluno.class.php';           
                        $aluno = new aluno;
                        $aluno->selectAlunos();
                    ?>
                </select>
        </div>
        
        <div class="two fields">
            <div class="field">
                <label>CPF do Aluno</label>
                <div class="ui fluid icon input">                         
                    <input type="text" value="<?php echo($cpf_aluno); ?>" id="cpf_aluno" name="cpf_aluno" placeholder="xxx.xxx.xxx-xx" required="required" accesskey="c" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" title="xxx.xxx.xxx-xx" maxlength="14" onKeyPress="return numeros(event);" OnKeyUp="mascaraCPF(this);" readonly>
                </div>
            </div>
            
            <div class="field">
                <label>Matrícula</label>
                <div class="ui fluid icon input">
                  <input type="text" id="matricula" name="matricula" value="<?php echo($matricula); ?>" placeholder="Matrícula" required="required" readonly>
                  <!--<i class="search icon"></i>-->
                </div>
            </div>
                    
        </div>
        
        <div class="two fields">
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
            
              <div class="field">                            
                <label>Disciplina</label>
                <select name="disciplina" id="select_disciplina" required>
                    <option>Selecione uma disciplina</option>
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
            <textarea rows="3" name="ocorrencia" required="required"></textarea>
        </div>
          
        <button class="ui button" type="submit">Cadastrar</button>
    </form>
<?php endblock('article') ?>
