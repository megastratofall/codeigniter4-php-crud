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
            <h5 class="card-title">INSERTAR DATOS DEL LIBRO</h5>
            <p class="card-text">

            <form method="post" action="<?= site_url('guardar') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" value="<?= old('nombre') ?>" class="form-control" type="text" name="nombre">
                </div>
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input id="autor" value="<?= old('autor') ?>" class="form-control" type="text" name="autor">
                </div>
                <div class="form-group">
                    <label for="fecha_de_edicion">Fecha de edicion</label>
                    <input id="fecha_de_edicion" value="<?= old('fecha_de_edicion') ?>" class="form-control" type="date" name="fecha_de_edicion">
                </div><br />
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a class="btn btn-danger" href="<?= base_url('/libros') ?>">Cancelar</a>
            </form>

            </p>
        </div>
    </div>



    <?= $pie ?>