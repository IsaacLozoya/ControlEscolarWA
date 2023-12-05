<?= $this->extend('layouts/base'); ?>

<?php $this->section('title'); ?> Kardex <?php $this->endSection(); ?>

<?= $this->section('content'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Boleta de Calificaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
            <div class="col-xl-6">
            <a href="<?= base_url('boletas/kardex') ?>" class="btn btn-primary" style="color: white;">
                <i class="bi bi-arrow-left-circle-fill"  style="color: white;"></i> <strong style="color: white;">Volver atrás</strong>
            </a>
            </div>
    <h1 class="text-center">Boleta de Calificaciones</h1>
    <p class="text-center">Nombre: <?= $user['nombre']; ?></p>
    <p class="text-center">Número de cuenta: <?= $user['no_cuenta']; ?></p>
    <p class="text-center">Carrera: <?= $user['carrera_id']; ?></p>
    <p class="text-center">Semestre: <?= $user['semestre_id']; ?></p>
</div>

<div class="container mt-5">

    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Materia</th>
                        <th>Semestre</th>
                        <th>Calificación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($curriculo as $row): ?>
                        <tr>
                        <td><?= $row['materia']; ?></td>
                        <td><?= $row['semestre']; ?></td>
                        <td><?= $row['calificacion']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
            <div class="col">
                <?php
                $totalCalificaciones = 0;
                $totalMaterias = count($curriculo);

                foreach ($curriculo as $row) {
                    $totalCalificaciones += $row['calificacion'];
                }

                $promedioGeneral = ($totalMaterias > 0) ? $totalCalificaciones / $totalMaterias : 0;
                ?>
                <p class="fw-bold">Promedio General: <?= number_format($promedioGeneral, 2); ?></p>
            </div>
</div>

<!-- Bootstrap JS y Popper.js (si los necesitas) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iKVAqzTU7sI5sFwnfDZg3p0yF/xr7LMEs5Bo12US9n9CJnG9aLb4J7f8" crossorigin="anonymous"></script>

</body>

<?= $this->endSection(); ?>
