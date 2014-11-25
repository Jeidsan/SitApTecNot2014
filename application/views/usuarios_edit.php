<div id="main">
    <section id="usuarios_edit" class="four">
        <div class="container">
            <?php
                if (!is_null($usuarios)) {
                    $edit = TRUE;
                    $usuario = $usuarios[0];                    
                } else {
                    $edit = FALSE;                    
                } ?>
            <header>
                <h2><?php if($edit) { echo 'Atualize seus dados'; } else { echo 'Cadastre-se'; } ?></h2>
                <p>Isso só vai levar um minuto.</p>
            </header>    
            <?php echo form_open_multipart('usuarios/salvar', 'id="form-usuarios"'); ?>
            <div class="row">             
                <div class="4u image">                    
                        <?php
                        if ($edit) {                        
                            echo '<img class="figure fit" src="'. base_url("assets/images/{$usuario->foto}") .'" alt="Sua imagem" />';
                        } else {
                            echo '<img class="figure fit" src="'. base_url("assets/images/usuario.jpg") .'" alt="Imagem padrão" />';
                        }
                        ?>
                        <input type="file" name="foto" size="20" />                         
                </div>
            </div>            
            <input type="hidden" name="idusuario" value="<?php if($edit) { echo $usuario->idusuario; } ?>" />
            <div class="row half">
                <div class="6u"><input type="text" name="nome" placeholder="Nome" value="<?php if($edit) { echo $usuario->nome; } ?>" /><div class="error"><?php echo form_error('nome'); ?></div></div>
                <div class="6u"><input type="password" name="senha" placeholder="Senha"/><div class="error"><?php echo form_error('senha'); ?></div></div>
            </div>

            <div class="row half">                              
                <div class="6u"><input type="text" name="dtnascimento" placeholder="Data de Nascimento" value="<?php if($edit) { echo $usuario->dtNascimento; } ?>"/><div class="error"><?php echo form_error('dtnascimento'); ?></div></div>
                <div class="6u"><input type="password" name="senha2" placeholder="Repita a Senha"/></div>
            </div>                        

            <div class="row">              
                <div class="12u"><input type="text" name="email" placeholder="E-mail" value="<?php if($edit) { echo $usuario->email; } ?>"/><div class="error"><?php echo form_error('email'); ?></div></div>                
            </div>

            <div class="row half">              
                <div class="6u"><input type="text" name="telefone" placeholder="Telefone"  value="<?php if($edit) { echo $usuario->telefone; } ?>"/><div class="error"><?php echo form_error('telefone'); ?></div></div>
                <div class="6u"><input type="text" name="celular" placeholder="Celular"  value="<?php if($edit) { echo $usuario->celular; } ?>"/><div class="error"><?php echo form_error('celular'); ?></div></div>
            </div>                                                                      

            <div class="row">
                <div class="12u"><input type="text" name="endereco" placeholder="Endereço"  value="<?php if($edit) { echo $usuario->endereco; } ?>"/><div class="error"><?php echo form_error('endereco'); ?></div></div>
            </div>

            <div class="row half">
                <div class="6u"><input type="text" name="bairro" placeholder="Bairro" value="<?php if($edit) { echo $usuario->bairro; } ?>"/><div class="error"><?php echo form_error('bairro'); ?></div></div>
                <div class="6u"><input type="text" name="cep" placeholder="CEP" value="<?php if($edit) { echo $usuario->cep; } ?>"/><div class="error"><?php echo form_error('cep'); ?></div></div>
            </div>

            <div class="row half">
                <div class="6u"><input type="text" name="cidade" placeholder="Cidade" value="<?php if($edit) { echo $usuario->cidade; } ?>"/><div class="error"><?php echo form_error('cidade'); ?></div></div>
                <div class="6u"><input type="text" name="estado" placeholder="Estado" value="<?php if($edit) { echo $usuario->estado; } ?>"/><div class="error"><?php echo form_error('estado'); ?></div></div>
            </div>

            <div class="row">
                <div class="12u"><input type="submit" name="cadastrar"  value="<?php if($edit) { echo 'Atualizar'; } else { echo 'Cadastrar'; } ?>" /></div>
            </div>

            <?php echo form_close(); ?>
        </div><!-- Container -->
    </section>
</div><!--mail-->