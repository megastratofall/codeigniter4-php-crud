<?= $cabecera ?>
<br />
<div class="container">

    <!-- MENSAJE DE ALERTA----------------------->

    <?php if (session('mensaje')) { ?>
        <div class="alert alert-danger" role="alert">
            <?php
            echo session('mensaje');
            ?>
        </div>
    <?php } ?>

    <!--FIN DE MENSAJE DE ALERTA----------------------->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">EDITAR DATOS DEL LIBRO</h5>
            <p class="card-text">

            <form method="post" action="<?= site_url('/actualizar') ?>" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $libro['id'] ?>">

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" value="<?= $libro['nombre'] ?>" class="form-control" type="text" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input id="autor" value="<?= $libro['autor'] ?>" class="form-control" type="text" name="autor" required>
                </div>
                <div class="form-group">
                    <label for="fecha_de_edicion">Fecha de edicion</label>
                    <input id="fecha_de_edicion" class="form-control" type="date" name="fecha_de_edicion" required>
                </div><br />
                <button class="btn btn-primary" type="submit">Actualizar</button>
                <a class="btn btn-danger" href="<?= base_url('/libros') ?>">Cancelar</a>

            </form>

            </p>
        </div>
    </div>

    <?= $pie ?>