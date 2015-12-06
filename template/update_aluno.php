<?php include 'base.php' ?>

<?php startblock('title') ?>
Editar Aluno
<?php endblock('title') ?>          

<?php startblock('article') ?>    
    <?php
        include_once '../model/aluno.class.php';
        include '../mongo/conexao.php';
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $busca = array('_id' => new MongoId($id));
            $query = $colecao->findOne($busca); //Realiza a busca

            $id_aluno = $query['_id'];
            $tipo = $query['tipo'];
            $nome = $query['nome'];
            $cpf = $query['cpf'];
            $email = $query['email'];
            $senha = $query['senha'];
            $data_nascimento = $query['data_nascimento'];
            $matricula = $query['matricula'];
            $data_matricula = $query['data_matricula'];
            $turma = $query['turma'];
        }        

        if(!is_null( $_POST['nome']) && !is_null( $_POST['email']) && !is_null($_POST['senha'])) {
            $getId = $_POST['id'];
          
            $id = new MongoId($getId);
            $formulario= new aluno;                                                  
            $formulario->setNome(filter_input(\INPUT_POST, 'nome'));
            $formulario->setCpf(filter_input(\INPUT_POST, 'cpf'));
            $formulario->setEmail(filter_input(\INPUT_POST, 'email'));    
            $formulario->setSenha(filter_input(\INPUT_POST, 'senha'));
            $formulario->setDataNascimento(filter_input(\INPUT_POST, 'data_nascimento'));
            $formulario->setDataMatricula(filter_input(\INPUT_POST, 'data_matricula'));            
            $formulario->setTurma(filter_input(\INPUT_POST, 'turma'));     

            
            $formulario->updateAluno($colecao, $id);
		}
    ?>
    
    <form class="ui form" name="enviar" method="post" action="update_aluno.php">
        <h1 class="ui dividing header">Editar Aluno</h1>

        <div class="field">
            <label>Identificação do Usuário</label>
            <div class="ui fluid icon input">                            
                <input type="text" name="id" placeholder="Identificação" value="<?php echo($id_aluno); ?>" required="required" readonly>
            </div>
        </div>

        <div class="field">
            <label>Tipo de Usuário</label>
            <div class="ui fluid icon input">                            
                <input type="text" name="tipo" placeholder="Tipo de Usuário" value="<?php echo($tipo); ?>" required="required" readonly>
            </div>
        </div>
                                                          
        <div class="field">
            <label>Nome</label>
            <div class="ui fluid icon input">                            
                <input type="text" name="nome" placeholder="Nome" value="<?php echo($nome); ?>" required="required">
            </div>
        </div>                       

        <div class="field">
            <label>E-mail</label>
            <div class="ui left icon input">
                <input type="text" name="email" value="<?php echo($email); ?>" placeholder="E-mail" required="required">
                <i class="mail icon"></i>
            </div>
        </div>

        <div class="field">
            <label>Senha</label>
            <div class="ui left icon input">
                <input type="password" name="senha" value="<?php echo($senha); ?>" placeholder="Senha" required="required">
                <i class="lock icon"></i>
            </div>
        </div>

        <div class="field">
            <label>CPF</label>
            <div class="ui fluid icon input">                         
                <input type="text" name="cpf" value="<?php echo($cpf); ?>" placeholder="xxx.xxx.xxx-xx" required="required" accesskey="c" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}" title="xxx.xxx.xxx-xx" maxlength="14" onKeyPress="return numeros(event);" OnKeyUp="mascaraCPF(this);">
            </div>
        </div>

        <div class="field">
            <label>Data de Nascimento</label>
            <div class="ui left icon input">
                <input type="text" name="data_nascimento" value="<?php echo($data_nascimento); ?>" placeholder="dd/mm/aaaa" required="required"
              accesskey="c" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" title="dd/mm/aaaa" maxlength="10" onKeyPress="return numeros(event);" OnKeyUp="mascaraData(this);">
              <i class="calendar icon"></i>
            </div>
        </div>

        <div class="field">
            <label>Matrícula</label>
            <div class="ui fluid icon input">
              <input type="text" name="matricula" value="<?php echo($matricula); ?>" placeholder="Matrícula" required="required">
            </div>
        </div>

        <div class="field">
            <label>Date de Matrícula</label>
            <div class="ui fluid icon input">
              <input type="text" name="data_matricula" value="<?php echo($data_matricula); ?>" placeholder="Matrícula" required="required" readonly>
            </div>
        </div>

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
          
        <!--<button class="ui button" type="submit">Alterar</button>-->
        <button class="ui button" id="singlebutton" name="singlebutton">Alterar</button>
    </form>
<?php endblock('article') ?>
