<?php include 'base.php' ?>

<?php startblock('title') ?>
Editar Disciplina
<?php endblock('title') ?>          

<?php startblock('article') ?>    
    <?php
        include_once '../model/disciplina.class.php';
        include '../mongo/conexao.php';
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $busca = array('_id' => new MongoId($id));
            $query = $colecao->findOne($busca); //Realiza a busca

            $id_disciplina = $query['_id'];
            $tipo = $query['tipo'];
            $nome_disciplina = $query['nome_disciplina'];
            $descricao_disciplina = $query['descricao'];
            $periodo_oferta = $query['periodo_ofeta'];
            $curso_oferta = $query['curso_ofeta'];
        }        

        if(!is_null( $_POST['nome_disciplina'])) {
            $getId = $_POST['id'];
          
            $id = new MongoId($getId);
             $formulario= new disciplina;
                   
            $formulario->setNomeDisciplina(filter_input(\INPUT_POST, 'nome_disciplina'));
            $formulario->setDescricao(filter_input(\INPUT_POST, 'descricao_disciplina'));
            $formulario->setPeriodoOferta(filter_input(\INPUT_POST, 'periodo_oferta'));
            $formulario->setCursoOferta(filter_input(\INPUT_POST, 'curso')); 
            
            $formulario->updateDisciplina($colecao, $id);
		}
    ?>
    
    <form class="ui form" name="enviar" method="post" action="update_disciplina.php">
        <h1 class="ui dividing header">Editar Disciplina</h1>

        <div class="field">
            <label>Identificação do Curso</label>
            <div class="ui fluid icon input">                            
                <input type="text" name="id" placeholder="Identificação" value="<?php echo($id_disciplina); ?>" required="required" readonly>
            </div>
        </div>

        <div class="field">
            <label>Tipo</label>
            <div class="ui fluid icon input">                            
                <input type="text" name="tipo" placeholder="Tipo de Usuário" value="<?php echo($tipo); ?>" required="required" readonly>
            </div>
        </div>
                                                          
    <div class="field">
            <label>Disciplina</label>
            <div class="ui fluid icon input">   
                <input type="text" name="nome_disciplina" value="<?php echo($nome_disciplina); ?>" placeholder="Disciplina" required="required">
            </div>
        </div>

         <div class="field">
            <label>Descrição da Disciplina</label>
            <textarea rows="3" name="descricao_disciplina" value="<?php echo($descricao_disciplina); ?>" required="required"></textarea>
        </div>                        
        
        <div class="field">    
            <label>Curso</label>
            <select name="curso" id="select_curso" required>
                    <option><?php echo($curso_oferta); ?></option>
                    <?php
                        include_once '../model/curso.class.php';           
                        $curso = new curso;
                        $curso->selectCurso();
                    ?>
            </select>
        </div>
        
        <div class="field">                            
            <label>Período de Oferta</label>
            <select name="periodo_oferta" id="select_perido_oferta" required>
                    <option><?php echo($periodo_oferta); ?></option>
                    <?php
                        $curso->selectPeriodoOferta();
                    ?>
            </select>
        </div>
          
        <!--<button class="ui button" type="submit">Alterar</button>-->
        <button class="ui button" id="singlebutton" name="singlebutton">Alterar</button>
    </form>
<?php endblock('article') ?>
