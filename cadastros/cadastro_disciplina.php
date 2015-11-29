<form class="ui form" name="enviar" method="post" action="../recebe_form/recebe_disciplina.php">
    <h1 class="ui dividing header">Cadastro de Disciplinas</h1>
  
    
    
    <!-- input search-->
    <!-- período de oferta, curso de oferta, descrição disciplina, nome disciplina. -->
    <div class="field">
        <label>Disciplina</label>
        <div class="ui fluid icon input">   
            <input type="text" name="nome_disciplina" placeholder="Disciplina" required="required">
        </div>
    </div>

     <div class="field">
        <label>Descrição da Disciplina</label>
        <textarea rows="3" name="descricao_disciplina" required="required"></textarea>
    </div>                        
    
    <div class="field">    
        <label>Curso</label>
        <?php
            include_once '../class/curso.class.php';           
            $curso = new curso;
            $curso->selectCurso();
        ?>
    </div>
    
    <div class="field">                            
        <label>Período de Oferta</label>
        <select name="periodo_oferta"> 
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
    </div>
    
    <button class="ui button" type="submit">Cadastrar</button>
</form>
