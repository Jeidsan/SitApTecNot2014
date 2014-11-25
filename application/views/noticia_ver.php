<div id="main">
    <?php foreach ($noticias as $noticia): ?>
        <section id="noticia_ver" class="two">
            <div class="container">
                <header>
                    <h2 id="topo"><?php echo $noticia->titulo; ?></h2>
                    <p>
                        <!-- Gostar -->
                        <a href="<?php echo base_url("noticia/pontuar/1/{$noticia->idnoticia}"); ?>"><span class="icon fa-thumbs-o-up"> &nbsp;&nbsp; <?php echo $noticia->positivo; ?></span></a>
                        <!-- Separador -->
                        &nbsp;&nbsp; | &nbsp;&nbsp;
                        <!--Desgostar -->
                        <a href="<?php echo base_url("noticia/pontuar/-1/{$noticia->idnoticia}"); ?>"><span class="icon fa-thumbs-o-down"> &nbsp;&nbsp; <?php echo $noticia->negativo; ?></span></a>                        
                    </p>
                    <?php if ($this->session->userdata('logado') === TRUE): ?>
                    <p>                                               
                        <!-- Edição -->
                        <a href="<?php echo base_url("noticia/editar/{$noticia->idnoticia}"); ?>"><span class="icon fa-edit"> &nbsp;&nbsp; Editar</span></a>
                         <!-- Separador -->
                        &nbsp;&nbsp; | &nbsp;&nbsp;
                        <!-- Exclusão -->
                        <a href="<?php echo base_url("noticia/deletar/{$noticia->idnoticia}"); ?>"><span class="icon fa-trash-o"> &nbsp;&nbsp; Apagar</span></a>
                    </p>
                    <?php endif; ?>
                </header>                
                <div class="row">
                    <div class="12u">
                        <p><?php echo nl2br($noticia->texto); ?></p>
                        <p><a href="#topo"><span class="icon fa-chevron-up"> Topo </span></a></p>
                    </div>
                </div>              
            </div>
        </section>
    <?php endforeach; ?>
</div>