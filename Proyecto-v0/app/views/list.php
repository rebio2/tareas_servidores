<form>
    <button type="submit" name="orden" value="Nuevo"> Cliente Nuevo </button><br>
</form>
<br>
<table>
    <thead>
        <tr>
            <th><a href="?ordenacion=id-Asc">ID ↑</a>  <a href="?ordenacion=id-Desc">ID ↓</a></th>
            <th><a href="?ordenacion=fname-Asc">Nombre ↑</a> | <a href="?ordenacion=fname-Desc">Nombre ↓</a></th>
            <th><a href="?ordenacion=email-Asc">Email ↑</a>  <a href="?ordenacion=email-Desc">Email ↓</a></th>
            <th><a href="?ordenacion=gender-ASC">Gender ↑</a>  <a href="?ordenacion=gender-Desc">Gender ↓</a></th>
            <th><a href="?ordenacion=ip_address-Asc">IP Address ↑</a>  <a href="?ordenacion=ip_address-Desc">IP Address ↓</a></th>
            <th>Teléfono</th>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tclientes as $cli): ?>
            <tr>
                <td><?= htmlspecialchars($cli->id) ?></td>
                <td><?= htmlspecialchars($cli->first_name) ?></td>
                <td><?= htmlspecialchars($cli->email) ?></td>
                <td><?= htmlspecialchars($cli->gender) ?></td>
                <td><?= htmlspecialchars($cli->ip_address) ?></td>
                <td><?= htmlspecialchars($cli->telefono) ?></td>
                <td>
                    <a href="index.php?orden=Detalles&id=<?= $cli->id ?>">Detalles</a>
                    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1): ?>
                        | <a href="index.php?orden=Modificar&id=<?= $cli->id ?>">Modificar</a>
                        | <a href="index.php?orden=Borrar&id=<?= $cli->id ?>" onclick="return confirm('¿Estás seguro?')">Borrar</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<form>
    <button name="nav" value="Primero">
        << </button>
            <button name="nav" value="Anterior">
                < </button>
                    <button name="nav" value="Siguiente"> > </button>
                    <button name="nav" value="Ultimo"> >> </button>
</form>