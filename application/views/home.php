<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed'); ?>

<!-- Main -->
<div id="main">

    <!-- Intro -->
    <section id="top" class="one dark cover">
        <div class="container">

            <header>
                <h2 class="alt">Bem vindo ao  <strong>Portal Contêxtil</strong>!
                    <p>Aqui você fica por dentro de todas as novidades da Contêxtil Ltda.</p>
            </header>

            <footer>
                <a href="#portfolio" class="button scrolly">Notícias</a>                              
            </footer>

        </div>
    </section>

    <!-- Portfolio -->
    <section id="portfolio" class="two">
        <div class="container">

            <header>
                <h2>Notícias</h2>
            </header>

            <p>Acompanhe aqui as nossas novidades e o que de melhor separamos para você.</p>            

            <div class="row">
                <?php
                $noticias_por_linha = sizeof($noticias) > 3 ? floor(sizeof($noticias) / 3) : 1;
                $resto = sizeof($noticias) > 3 ? sizeof($noticias) % 3 : 0;                
                for ($i = 0; $i < 3; $i++):
                ?>
                    <div class="4u">
                        <?php                        
                        for ($j = ($i * $noticias_por_linha); $j < (($i + 1) * $noticias_por_linha); $j++)
                        {
                            if(isset($noticias[$j])):
                        ?>
                            <article class="item">
                                <a href="<?php echo base_url("noticia/ver/{$noticias[$j]->idnoticia}"); ?>" class="image fit"><img src="<?php echo base_url("noticia/ver/{$noticias[$j]->idnoticia}"); ?>" alt="" /></a>
                                <header>
                                    <h3><?php echo $noticias[$j]->titulo; ?></h3>
                                </header>
                            </article>
                            <?php
                                if ($resto > 0):                                    
                            ?>                            
                                <article class="item">
                                    <a href="<?php echo base_url("noticia/ver/{$noticias[sizeof($noticias) - $resto]->idnoticia}"); ?>" class="image fit"><img src="<?php echo base_url("noticia/ver/{$noticias[sizeof($noticias) - $resto]->idnoticia}"); ?>" alt="" /></a>
                                    <header>
                                        <h3><?php echo $noticias[sizeof($noticias) - $resto]->titulo; ?></h3>
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
</div>