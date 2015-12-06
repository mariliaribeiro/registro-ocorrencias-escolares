<?php include 'base.php' ?>

<?php startblock('title') ?>
Editar Curso
<?php endblock('title') ?>          

<?php startblock('article') ?>    
    <?php
        include_once '../model/curso.class.php';
        include '../mongo/conexao.php';
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $busca = array('_id' => new MongoId($id));
            $query = $colecao->findOne($busca); //Realiza a busca

            $id_curso = $query['_id'];
            $tipo = $query['tipo'];
            $nome_curso = $query['nome_curso'];
            $oferta = $query['ofeta'];
            $descricao_curso = $query['descricao'];
        }        

        if(!is_null( $_POST['nome_curso'])) {
            $getId = $_POST['id'];
          
            $id = new MongoId($getId);
            $formulario= new curso;
            $formulario->setNomeCurso(filter_input(\INPUT_POST, 'nome_curso'));
            $formulario->setOferta(filter_input(\INPUT_POST, 'oferta'));
            $formulario->setDescricao(filter_input(\INPUT_POST, 'descricao_curso'));

            
            $formulario->updateCurso($colecao, $id);
		}
    ?>
    
    <form class="ui form" name="enviar" method="post" action="update_curso.php">
        <h1 class="ui dividing header">Editar Curso</h1>

        <div class="field">
            <label>Identificação do Curso</label>
            <div class="ui fluid icon input">                            
                <input type="text" name="id" placeholder="Identificação" value="<?php echo($id_curso); ?>" required="required" readonly>
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
            <div class="ui fluid icon input">                            
                <input type="text" name="nome_curso" placeholder="Curso" value="<?php echo($nome_curso); ?>" required="required">
            </div>
        </div>                       

         <div class="field">
            <label>Oferta</label>
                <select name="oferta">
                    <option><?php echo($oferta); ?></option>
                    <?php
                        include_once '../model/curso.class.php';
                        $curso = new curso;
                        $curso->selectOferta();
                    ?>
            </select>
        </div>
        
        <div class="field">
            <label>Descrição do Curso</label>
            <textarea rows="3" name="descricao_curso" required="required"><?php echo($descricao_curso); ?></textarea>
        </div>

          
        <!--<button class="ui button" type="submit">Alterar</button>-->
        <button class="ui button" id="singlebutton" name="singlebutton">Alterar</button>
    </form>
<?php endblock('article') ?>
