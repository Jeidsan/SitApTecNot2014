<div id="main">
    <?php                
        if (!is_null($noticias)) {
            $noticia = $noticias[0];            
        }
    ?>
    <section id="noticia_editar" class="two">
        <div class="container">            
            <header>
                <h2 id="topo"><?php if(!is_null($noticias)) { echo "Edição de Notícia"; } else {echo "Nova Notícia";}?></h2>
            </header>         
            <?php echo form_open("noticia/salvar", "id='form-noticia'"); ?>
                <input type="hidden" name="idnoticia" value="<?php if(!is_null($noticias)) {echo $noticia->idnoticia;} ?>" />
                <div class="row half">
                            <div class="12u">
                                <select name="idcategoria" value="">
                                    <!-- Aqui vão as categorias -->
                                    <option value=""></option>
                                </select>
                            </div>
                </div>
                <div class="row half">
                    <div class="12u"><input type="text" name="titulo" placeholder="Título" value="<?php if(!is_null($noticias)) {echo $noticia->titulo;} ?>"/><div class="error"><?php echo form_error('titulo'); ?></div></div>                    
                </div>
                <div class="row half">
                    <div class="12u">
                        <textarea name="texto" placeholder="Insira seu texto aqui." ><?php if(!is_null($noticias)) echo $noticia->texto; ?></textarea>                    
                    </div>
                </div>            
                <div class="row">
                    <div class="12u">
                        <input type="submit" value="Salvar" />
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </section>    
</div>