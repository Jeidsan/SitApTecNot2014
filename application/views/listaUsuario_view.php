<h1>Usuários</h1>
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
        foreach ($usuarios as $user) {
            echo "<tr>";
            echo "<td>{$user['idusuario']}</td>";
            echo "<td>{$user['nome']}</td>";
            echo "<td><a href='".base_url()."index.php/Usuario/get/{$user['idusuario']}'>Editar</a></td>";
            echo "<td><a href='".base_url()."index.php/Usuario/delete/{$user['idusuario']}'>Deletar</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
