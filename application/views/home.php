<!-- Main -->
<div id="main">

    <!-- Intro -->
    <section id="top" class="one dark cover">
        <div class="container">

            <header>
                <h2 class="alt">Hi! I'm <strong>Prologue</strong>, a <a href="http://html5up.net/license">free</a> responsive<br />
                    site template designed by <a href="http://html5up.net">HTML5 UP</a>.</h2>
                <p>Ligula scelerisque justo sem accumsan diam quis<br />
                    vitae natoque dictum sollicitudin elementum.</p>
            </header>

            <footer>
                <a href="#portfolio" class="button scrolly">Magna Aliquam</a>
            </footer>

        </div>
    </section>

    <!-- Portfolio -->
    <section id="portfolio" class="two">
        <div class="container">

            <header>
                <h2>Portfolio</h2>
            </header>

            <p>Vitae natoque dictum etiam semper magnis enim feugiat convallis convallis
                egestas rhoncus ridiculus in quis risus amet curabitur tempor orci penatibus.
                Tellus erat mauris ipsum fermentum etiam vivamus eget. Nunc nibh morbi quis 
                fusce hendrerit lacus ridiculus.</p>

            <div class="row">
                <div class="4u">
                    <article class="item">
                        <a href="#" class="image fit"><img src="<?php echo base_url('assets/images/pic02.jpg'); ?>" alt="" /></a>
                        <header>
                            <h3>Ipsum Feugiat</h3>
                        </header>
                    </article>
                    <article class="item">
                        <a href="#" class="image fit"><img src="<?php echo base_url('assets/images/pic03.jpg'); ?>" alt="" /></a>
                        <header>
                            <h3>Rhoncus Semper</h3>
                        </header>
                    </article>
                </div>
                <div class="4u">
                    <article class="item">
                        <a href="#" class="image fit"><img src="<?php echo base_url('assets/images/pic04.jpg'); ?>" alt="" /></a>
                        <header>
                            <h3>Magna Nullam</h3>
                        </header>
                    </article>
                    <article class="item">
                        <a href="#" class="image fit"><img src="<?php echo base_url('assets/images/pic05.jpg'); ?>" alt="" /></a>
                        <header>
                            <h3>Natoque Vitae</h3>
                        </header>
                    </article>
                </div>
                <div class="4u">
                    <article class="item">
                        <a href="#" class="image fit"><img src="<?php echo base_url('assets/images/pic06.jpg'); ?>" alt="" /></a>
                        <header>
                            <h3>Dolor Penatibus</h3>
                        </header>
                    </article>
                    <article class="item">
                        <a href="#" class="image fit"><img src="<?php echo base_url('assets/images/pic07.jpg'); ?>" alt="" /></a>
                        <header>
                            <h3>Orci Convallis</h3>
                        </header>
                    </article>
                </div>
            </div>

        </div>
    </section>				

    <!-- Contact -->
    <section id="contact" class="three">
        <div class="container">

            <header>
                <h2>Contact</h2>
            </header>

            <p>Elementum sem parturient nulla quam placerat viverra 
                mauris non cum elit tempus ullamcorper dolor. Libero rutrum ut lacinia 
                donec curae mus. Eleifend id porttitor ac ultricies lobortis sem nunc 
                orci ridiculus faucibus a consectetur. Porttitor curae mauris urna mi dolor.</p>

            <form method="post" action="#">
                <div class="row half">
                    <div class="6u"><input type="text" name="name" placeholder="Name" /></div>
                    <div class="6u"><input type="text" name="email" placeholder="Email" /></div>
                </div>
                <div class="row half">
                    <div class="12u">
                        <textarea name="message" placeholder="Message"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="12u">
                        <input type="submit" value="Send Message" />
                    </div>
                </div>
            </form>

        </div>
    </section>

    <!-- Cadastro -->
    <section id="cadastro" class="four">
        <div class="container">

            <header>
                <h2>Cadastre-se</h2>
            </header>
            <p>Isso só vai levar um minuto.</p>

            <?php echo form_open('usuarios/inserir#cadastro', 'id="form-usuarios"'); ?>

            <div class="row half">
                <div class="6u"><input type="text" name="nome" placeholder="Nome"/><div class="error"><?php echo form_error('nome'); ?></div></div>
                <div class="6u"><input type="text" name="foto" placeholder="Foto"/><div class="error"><?php echo form_error('foto'); ?></div></div>
            </div>

            <div class="row half">              
                <div class="6u"><input type="password" name="senha" placeholder="Senha"/><div class="error"><?php echo form_error('senha'); ?></div></div>
                <div class="6u"><input type="text" name="dtnascimento" placeholder="Data de Nascimento"/><div class="error"><?php echo form_error('dtnascimento'); ?></div></div>
            </div>                        

            <div class="row">              
                <div class="12u"><input type="text" name="email" placeholder="E-mail"/><div class="error"><?php echo form_error('email'); ?></div></div>                
            </div>

            <div class="row half">              
                <div class="6u"><input type="text" name="telefone" placeholder="Telefone"/><div class="error"><?php echo form_error('telefone'); ?></div></div>
                <div class="6u"><input type="text" name="celular" placeholder="Celular"/><div class="error"><?php echo form_error('celular'); ?></div></div>
            </div>                                                                      

            <div class="row">
                <div class="12u"><input type="text" name="endereco" placeholder="Endereço"/><div class="error"><?php echo form_error('endereco'); ?></div></div>
            </div>

            <div class="row half">
                <div class="6u"><input type="text" name="bairro" placeholder="Bairro"/><div class="error"><?php echo form_error('bairro'); ?></div></div>
                <div class="6u"><input type="text" name="cep" placeholder="CEP"/><div class="error"><?php echo form_error('cep'); ?></div></div>
            </div>

            <div class="row half">
                <div class="6u"><input type="text" name="cidade" placeholder="Cidade"/><div class="error"><?php echo form_error('cidade'); ?></div></div>
                <div class="6u"><input type="text" name="estado" placeholder="Estado"/><div class="error"><?php echo form_error('estado'); ?></div></div>
            </div>

            <div class="row">
                <div class="12u"><input type="submit" name="cadastrar" value="Cadastrar" /></div>
            </div>

            <?php echo form_close(); ?>

            <!-- Lista as Pessoas Cadastradas -->
            <div class="row">
                <?php foreach ($usuarios as $usuario): ?>                
                    <div class="4u">
                        <article class="item">
                            <a href="#" class="image fit"><img src="<?php echo base_url("assets/images/{$usuario->foto}"); ?>" alt="" /></a>
                            <header>
                                <h3><a title="Editar" href="<?php echo base_url() . 'usuarios/editar/' . $usuario->idusuario; ?>"><?php echo $usuario->nome; ?></a></h3>
                            </header>
                            <!--<p><?php echo $usuario->email; ?></p>
                            <p><?php echo $usuario->dtNascimento; ?></p>
                            <p><?php echo $usuario->senha; ?></p>
                            <p><?php echo $usuario->endereco; ?></p>
                            <p><?php echo $usuario->cidade; ?></p>
                            <p><?php echo $usuario->estado; ?></p>
                            <p><?php echo $usuario->bairro; ?></p>
                            <p><?php echo $usuario->cep; ?></p>
                            <p><?php echo $usuario->telefone; ?></p>
                            <p><?php echo $usuario->celular; ?></p>-->
                        </article>                                      
                    </div>
                <?php endforeach ?>
            </div>                                                       
            <!-- Fim Lista -->


        </div>
    </section>

</div>