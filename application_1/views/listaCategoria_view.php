<h1>Categorias</h1>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($categorias as $categoria) {
            echo "<tr>";
            echo "<td>{$categoria['idcategoria']}</td>";
            echo "<td>{$categoria['nome']}</td>";
            echo "<td><a href='" . base_url() . "index.php/Categoria/get/{$categoria['idcategoria']}'>Editar</a></td>";
            echo "<td><a href='" . base_url() . "index.php/Categoria/delete/{$categoria['idcategoria']}'>Deletar</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<br/><br/><br/>
<form method="post" action="<?php echo base_url('Categoria/create') ?>" class="form">
<input type="text" name="nome" id="nome"/>
<input type="submit" value="Gravar" />
</form>
