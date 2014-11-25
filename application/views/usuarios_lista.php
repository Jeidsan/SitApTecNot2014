<div id='main'>
    <!-- Portfolio -->
    <section id="usuarios_lista" class="two">
        <div class="container">
            <header>
                <h2>Usuários</h2>
                <p>Essas são as pessoas que colaboram com nosso portal.</p>
            </header>            

            <div class="row">
                <?php                
                $usuarios_por_linha = sizeof($usuarios) > 3 ? floor(sizeof($usuarios) / 3) : 1;
                $resto = sizeof($usuarios) > 3 ? sizeof($usuarios) % 3 : 0;                
                for ($i = 0; $i < 3; $i++):
                ?>
                    <div class="4u">
                        <?php                        
                        for ($j = ($i * $usuarios_por_linha); $j < (($i + 1) * $usuarios_por_linha); $j++)
                        {
                            if(isset($usuarios[$j])):
                        ?>
                            <article class="item">
                                <a href="<?php echo base_url("usuarios/ver/{$usuarios[$j]->idusuario}"); ?>" class="image fit"><img src="<?php echo base_url("assets/images/{$usuarios[$j]->foto}"); ?>" alt="<?php echo $usuarios[$j]->nome; ?>" /></a>
                                <header>
                                    <h3>
                                    <?php
                                        echo $usuarios[$j]->nome;
                                        if($usuarios[$j]->idusuario == $this->session->userdata['idusuario']) {
                                            echo '&nbsp;&nbsp;';
                                            echo '<a href="usuarios/editar/'.$this->session->userdata['idusuario'].'" title="Editar"><span class="icon fa-edit"></span></a>';
                                            echo '&nbsp;&nbsp;';
                                            echo '<a href="usuarios/deletar/'.$this->session->userdata['idusuario'].'" title="Excluir"><span class="icon fa-trash-o"></span></a>';
                                        }
                                    ?>
                                    </h3>
                                </header>
                            </article>
                            <?php
                                if ($resto > 0):                                    
                            ?>                            
                                <article class="item">
                                    <a href="<?php echo base_url("usuarios/ver/{$usuarios[sizeof($usuarios) - $resto]->idusuario}"); ?>" class="image fit"><img src="<?php echo base_url("assets/images/{$usuarios[sizeof($usuarios) - $resto]->foto}"); ?>" alt="<?php echo $usuarios[sizeof($usuarios) - $resto]->nome; ?>" /></a>
                                    <header>
                                        <h3>
                                            <?php
                                                echo $usuarios[sizeof($usuarios) - $resto]->nome;                                                
                                                if($usuarios[sizeof($usuarios) - $resto]->idusuario == $this->session->userdata['idusuario']) {
                                                    echo '&nbsp;&nbsp;';
                                                    echo '<a href="usuarios/editar/'.$this->session->userdata['idusuario'].'" title="Editar"><span class="icon fa-edit"></span></a>';
                                                    echo '&nbsp;&nbsp;';
                                                    echo '<a href="usuarios/deletar/'.$this->session->userdata['idusuario'].'" title="Excluir"><span class="icon fa-trash-o"></span></a>';
                                                }
                                            ?>
                                        </h3>
                                    </header>
                                </article>
                            <?php               
                                $resto--;
                                endif;
                            ?>                            
                         <?php 
                            endif;
                        }
                        ?>                        
                    </div>  
                    <?php                    
                endfor;
                ?>                
            </div>

        </div>
    </section>	
</div>