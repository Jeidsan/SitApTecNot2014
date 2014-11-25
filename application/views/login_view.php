<div id="main">
<section id="cadastro" class="four">
    <div class="container">
        <header>
            <h2>Acesso ao Sistema</h2>
        </header>
        <p>Para acessar todas as funcionalidades, informe login e senha nos campos abaixo.</p>
        
        <?php echo form_open('login/autentica', 'id="login"'); ?>        
        <div class="row half">
            <div class="6u"><input type="text" name="email" placeholder="E-mail" /><div class="error"><?php echo form_error('login'); ?></div></div>
        </div>
        <div class="row half">
            <div class="6u"><input type="password" name="senha" placeholder="Senha" /><div class="error"><?php echo form_error('senha'); ?></div></div>
        </div>
        <div class="row">
            <div class="12u"><input type="submit" name="acessar" value="Acessar" /></div>
        </div>
        <?php echo form_close(); ?>
    </div>
</section>
</div>