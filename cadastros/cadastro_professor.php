<form class="ui form" name="enviar" method="post" action="../recebe_form/recebe_professor.php">
    <h1 class="ui dividing header">Cadastro de Professores</h1>

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
        <label>E-mail</label>
        <div class="ui left icon input">
            <input type="text" name="email" placeholder="E-mail" required="required">
            <i class="mail icon"></i>
        </div>
    </div>

    <div class="field">
        <label>Matrícula</label>
        <div class="ui fluid icon input">
          <input type="text" name="matricula" placeholder="Matrícula" required="required">
        </div>
    </div>
      
    <button class="ui button" type="submit">Cadastrar</button>
</form>
