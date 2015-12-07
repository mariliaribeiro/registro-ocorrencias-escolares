<?php include 'base.php' ?>

<?php startblock('title') ?>
Login
<?php endblock('title') ?>

<?php startblock('article') ?>
    <form class="ui form" name="enviar" method="post" role="form" action="executa_login.php">
        <h1 class="ui dividing header">Login</h1>

        <div class="field">
            <label>E-mail</label>
            <div class="ui left icon input">
                <input type="text" name="email" placeholder="E-mail" required="required">
                <i class="mail icon"></i>
            </div>
        </div>

        <div class="field">
            <label>Senha</label>
            <div class="ui left icon input">
              <input type="password" name="senha" placeholder="Senha" required="required">
              <i class="lock icon"></i>
            </div>
        </div>

         <button class="ui button" type="submit">Entrar</button>

    </form>  
<?php endblock('article') ?>
