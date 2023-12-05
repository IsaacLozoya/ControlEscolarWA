<?= $this->extend('layouts/base'); ?>

<?php $this->section('title'); ?> Editar Kardex <?php $this->endSection(); ?>

<?= $this->section('content'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Boleta de Calificaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<div class="container">
    <div class="row py-4">
        <div class="col-xl-12 text-start">
            <a href="<?= base_url('boletas/kardex') ?>" class="btn btn-primary" style="color: white;">
                <i class="bi bi-arrow-left-circle-fill"  style="color: white;"></i> <strong style="color: white;">Volver atrás</strong>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-10 m-auto">
            <form action="<?= base_url('editkardex/' . $usuario['no_cuenta']) ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                
                        <div class="card">
                            <div class="card-header text-center">
                            <h5>ACTA DE CALIFICACIONES</h5>
                            </div>
                                <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>NUMERO DE CUENTA</th>
                                                    <th>ALUMNO</th>
                                                    <th>CALIFICACION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($alumno as $row): ?>
                                                    <tr>
                                                    <td><?= $row['no_cuenta']; ?></td>
                                                    <td><?= $row['alumno_nombre']; ?></td>
                                                    <td>
                                                    <div class="form-group mb-auto">                                                                               
                                                        <label class="form-label"></label>
                                                        <input type="text" class="form-control" name="calificacion" value="<?php if($row['calificacion']):echo $row['calificacion'];else: set_value('calificacion'); endif ?>"/>
                                                    </div>
                                                        
                                                    </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                </div>
                                <div class = "text-center" >
                                <button type="submit" class="btn btn-success">Subir Calificaciones</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>