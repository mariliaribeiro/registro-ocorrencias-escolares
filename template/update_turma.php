<?php include 'base.php' ?>

<?php startblock('title') ?>
Editar Turma
<?php endblock('title') ?>          

<?php startblock('article') ?>    
    <?php
        include_once '../model/turma.class.php';
        include '../mongo/conexao.php';
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $busca = array('_id' => new MongoId($id));
            $query = $colecao->findOne($busca); //Realiza a busca

            $id_turma = $query['_id'];
            $tipo = $query['tipo'];
            $nome_turma = $query['nome_turma'];
            $curso = $query['curso'];
        }        

        if(!is_null( $_POST['nome_turma'])) {
            $getId = $_POST['id'];
          
            $id = new MongoId($getId);
            $formulario= new turma;
                       
            $formulario->setTurma(filter_input(\INPUT_POST, 'nome_turma'));
            $formulario->setNomeCurso(filter_input(\INPUT_POST, 'curso'));                
            
            $formulario->updateTurma($colecao, $id);
		}
    ?>
    
    <form class="ui form" name="enviar" method="post" action="update_turma.php">
        <h1 class="ui dividing header">Editar Turma</h1>

        <div class="field">
            <label>Identificação do Curso</label>
            <div class="ui fluid icon input">                            
                <input type="text" name="id" placeholder="Identificação" value="<?php echo($id_turma); ?>" required="required" readonly>
            </div>
        </div>

        <div class="field">
            <label>Tipo</label>
            <div class="ui fluid icon input">                            
                <input type="text" name="tipo" placeholder="Tipo de Usuário" value="<?php echo($tipo); ?>" required="required" readonly>
            </div>
        </div>

        <div class="field">
            <label>Curso</label>
            <select name="curso" id="select_curso" required>
                    <option><?php echo($curso); ?></option>
                    <?php
                        include_once '../model/curso.class.php';           
                        $curso = new curso;
                        $curso->selectCurso();
                    ?>
            </select>
        </div>

        <div class="field">
            <label>Turma</label>
            <div class="ui fluid icon input">                            
                <input type="text" name="nome_turma" placeholder="Turma" value="<?php echo($nome_turma); ?>" required="required">
            </div>
        </div>

                                                          
   
        <!--<button class="ui button" type="submit">Alterar</button>-->
        <button class="ui button" id="singlebutton" name="singlebutton">Alterar</button>
    </form>
<?php endblock('article') ?>
