<div id="main">
    <section id='usuario_ver' class="four">
        <?php foreach($usuarios as $usuario): ?>
        <div class="container">
            <header>
                <h2><?php echo $usuario->nome; ?></h2>
            </header>
            <div class="row half">                
                <div class="4u image">
                    <div class="row half">
                        <img class="figure fit" src="<?php echo base_url("assets/images/{$usuario->foto}"); ?>" alt="<?php echo $usuario->nome; ?>" />
                    </div>
                </div>
                <div class="8u">
                    <div class="row half">
                        <div class="8u" style="text-align: left;"><strong>E-mail: </strong><?php echo $usuario->email; ?></div>
                    </div>
                    <div class="row half">
                        <div class="8u" style="text-align: left;"><strong>Data de Nascimento: </strong><?php echo $usuario->dtNascimento; ?></div>
                    </div>
                    <div class="row half">
                        <div class="8u" style="text-align: left;"><strong>Telefone: </strong><?php echo $usuario->telefone; ?></div>
                    </div>
                    <div class="row half">
                        <div class="8u" style="text-align: left;"><strong>Celular: </strong><?php echo $usuario->celular; ?></div>
                    </div>
                    <div class="row half">
                        <div class="8u" style="text-align: left;"><strong>Data de Cadastro: </strong><?php echo $usuario->dtCriacao; ?></div>
                    </div>
                    <div class="row half">
                        <div class="8u" style="text-align: left;"><strong>Última Atualização: </strong><?php echo $usuario->dtAtualizacao; ?></div>
                    </div>
                </div>                
            </div>                       
            <div class="row half">
                <div class="12u" style="text-align: left;"><strong>Endereço: </strong><?php echo $usuario->endereco; ?></div>
            </div>
            <div class="row half">
                <div class="6u" style="text-align: left;"><strong>Bairro: </strong><?php echo $usuario->bairro; ?></div>
                <div class="6u" style="text-align: left;"><strong>CEP: </strong><?php echo $usuario->cep; ?></div>
            </div>
            <div class="row half">
                <div class="6u" style="text-align: left;"><strong>Cidade: </strong><?php echo $usuario->cidade; ?></div>
                <div class="6u" style="text-align: left;"><strong>Estado: </strong><?php echo $usuario->estado; ?></div>
            </div>
        </div>
        <?php endforeach; ?>
    </section>
</div>