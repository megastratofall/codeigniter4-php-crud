<?= $cabecera ?>
<h2>LISTA DE LIBROS</h2>
<div class="container">
    <a id="buscadores" href="<?= base_url('/libros/buscar_nombre') ?>" class="btn btn-primary">Buscar por nombre</a>
    <a id="buscadores" href="<?= base_url('/libros/buscar_autor') ?>" class="btn btn-primary">Buscar por autor</a>
    <a id="buscadores" href="<?= base_url('/libros/buscarId') ?>" class="btn btn-primary">Buscar por Id</a>
</div>
<div class="container my-5">
    <a href="<?= base_url('crear') ?>" class="btn btn-primary">Ingresar nuevo libro</a><br /><br />
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Fecha de edicion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libros as $row) : ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nombre']; ?></td>
                    <td><?= $row['autor']; ?></td>
                    <td><?= $row['fecha_de_edicion']; ?></td>
                    <td>
                        <a href="<?= base_url('editar/' . $row['id']); ?>" class="btn btn-primary" type="button">Editar</a>
                        <a href="<?= base_url('borrar/' . $row['id']); ?>" class="btn btn-danger" type="button">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pie ?>