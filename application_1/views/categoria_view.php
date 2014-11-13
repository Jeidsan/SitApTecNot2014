<form method="post" action="<?php echo base_url()."index.php/Categoria/create" ?>" class="form">
    <label>
        Identificador:
        <input type="number" name="idcategoria" value="<?php echo $categoria['idcategoria'];  ?>" />
    </label>    
    <label>
        Nome:
        <input type="text" name="nome" value="<?php echo $usuario['nome'];  ?>" />
    </label>        
    <input type="submit" value="Gravar" />
</form>       