<?= $cabecera ?>
<br /><br />
<div class="container my-5">
    <h3>BÚSQUEDA POR ID</h3>
    <form id='form' class="d-flex" action="<?= base_url('/libros/buscarId') ?>" method="get">
        <input id="query" class="form-control me-2" type="text" name="query" required><br />
        <input id='buscar' class="btn btn-primary" type="submit" name="enviar"></input>
        <a class="btn btn-danger" href="<?= base_url('/libros') ?>">Cancelar</a>
    </form>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Fecha de edicion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $row) : ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nombre']; ?></td>
                    <td><?= $row['autor']; ?></td>
                    <td><?= $row['fecha_de_edicion']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<br />
<?= $pie ?>