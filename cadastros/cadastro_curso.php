<form class="ui form" name="enviar" method="post" action="../recebe_form/recebe_curso.php">
    <h1 class="ui dividing header">Cadastro de Cursos</h1>
  
    <div class="field">
        <label>Curso</label>
        <div class="ui fluid icon input">                            
            <input type="text" name="nome_curso" placeholder="Curso" value="" required="required">
        </div>
    </div>
    
    
    <div class="field">    
        <label>Oferta</label>
        <select name="oferta">
            <option>Anual</option>
            <option>Semestral</option>
        </select>
    </div>
    
    <div class="field">
        <label>Descrição do Curso</label>
        <textarea rows="3" name="descricao_curso" required="required"></textarea>
    </div>
      
    <button class="ui button" type="submit">Cadastrar</button>
</form>

