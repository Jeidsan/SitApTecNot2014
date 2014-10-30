<form method="post" action="<?php echo base_url()."index.php/Usuario/create" ?>" class="form">
    <label>
        Identificador:
        <input type="number" name="idusuario" value="<?php echo $usuario['idusuario'];  ?>" />
    </label>    
    <label>
        Nome:
        <input type="text" name="nome" value="<?php echo $usuario['nome'];  ?>" />
    </label>    
    <label>
        E-mail:
        <input type="email" name="email" value="<?php echo $usuario['email'];  ?>" />
    </label>    
    <label>
        Login:
        <input type="login" name="login" value="<?php echo $usuario['login'];  ?>" />
    </label>    
    <label>
        Senha:
        <input type="password" name="password" value="<?php echo $usuario['senha'];  ?>" />
    </label>    
    <label>
        Data de Nascimento:
        <input type="number" name="dataNascimento" value="<?php echo $usuario['dataNascimento'];  ?>" />
    </label>    
    <label>
        Telefone:
        <input type="number" name="telefone" value="<?php echo $usuario['telefone'];  ?>" />
    </label>
    <input type="submit" value="Gravar" />
</form>       