<?= $this->extend('layouts/base'); ?>

<?php $this->section('title'); ?>  Solicitar Justificante <?php $this->endSection(); ?>

<?= $this->section('content'); ?>

<head> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>

<div class="container">
    <div class="row py-4">
        <div class="col-xl-12 text-end">
            <a href="<?= base_url('menuprincipal') ?>" class="btn btn-primary" style="color: white;">
                <i class="bi bi-arrow-left-circle-fill"  style="color: white;"></i> <strong style="color: white;">Volver atrás</strong>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 m-auto">
        <form action="<?= base_url('menuprincipal') ?>" method="post">
                <?= csrf_field() ?>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title text-center">Solicitar Justificante</h5>
                                <div class="form-group mb-3">
                                    <label class="form-label">Fecha a justificar</label>
                                    <input class="form-control datepicker" name="fecha_justificar"/>
                                    <small>En caso de requerir mas de un día especificar en el apartado <strong>"Describa el motivo"</strong></small>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Motivo</label>
                                    <select class="form-control" name="motivo" required>
                                        <option value="S">Salud</option>
                                        <option value="P">Personal</option>
                                        <option value="C">Covid-19</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Decriba el motivo</label>
                                    <input type="text" class="form-control" name="descripcion_motivo" required/>
                                </div>
                                <div class="container" id="drop-area">
                                <h1>Subir Varios Archivos</h1>
                                <form action="#" method="post" enctype="multipart/form-data" id="upload-form">
                                <label for="file-input" id="file-label">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span>Arrastra y suelta tus archivos aquí o haz clic para seleccionar</span>
                                </label>
                                <input type="file" id="file-input" name="files[]" multiple />
                                <ul id="file-list"></ul>
                                </form>
                            </div>    
                               <div class="text-center">
                               <br> <button type="submit" class="btn btn-success">Solicitar</button>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        // Inicializa el selector de fechas
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
</script>


<?= $this->endSection(); ?>