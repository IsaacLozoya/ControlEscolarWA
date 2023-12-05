<?= $this->extend('layouts/base'); ?>

<?php $this->section('title'); ?> Kardex <?php $this->endSection(); ?>

<?= $this->section('content'); ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<a href="<?= base_url('menuprincipal') ?>" class="btn btn-primary" style="color: white;">
    <i class="bi bi-arrow-left-circle-fill" style="color: white;"></i> <strong style="color: white;">Volver atrás</strong>
</a>

<?php if ($user['rol_id'] == 1): ?>

    <div class="container">
        <div class="row py-4">
            <div class="col-xl-12">
                <h3>Seleccione su unidad académica para generar la boleta</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ESCUELA</th>
                            <th>CARRERA</th>
                            <th>PLAN EST.</th>
                            <th>PERIODO</th>
                            <th>GRUPO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="<?= base_url('boletas/visualkardex') ?>"><?= $user['unidad_academica_id'] ?></td>
                            <td><?= $user['carrera_id'] ?></td>
                            <td><?= $user['plan_estudio_id'] ?></td>
                            <td><?= $user['semestre_id'] ?></td>
                            <td><?= $user['grupo_id'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php elseif ($user['rol_id'] == 2): ?>

    <div class="container">
        <div class="row py-4">
            <div class="col-xl-12">
                <h3>Seleccione grupo a calificar</h3>
            </div>
        </div>

        <!-- Contenido específico para el rol 2 -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Cursos Disponibles</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Semestre</th>
                                <th>Materia</th>
                                <th>Grupo</th>
                                <th>Acciones</th> <!-- Nueva columna para las acciones -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($informacionProfesor) > 0) : ?>
                                <?php foreach ($informacionProfesor as $infoP) : ?>
                                    <tr>
                                        <td><?= $infoP->semestre_id ?></td>
                                        <td><?= $infoP->materia ?></td>
                                        <td><?= $infoP->grupo ?></td>
                                        <td> <!-- Nueva columna para las acciones -->
                                            <div class="btn-group" role="group">
                                                <form class="display-none">
                                                    <a href="<?= base_url('boletas/editkardex/' . $infoP->grupo) ?>" class="btn btn-sm btn-success" title="Editar">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4">
                                        <h6 class="text-danger text-center">No se encontraron Cursos</h6>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php elseif ($user['rol_id'] == 0):  ?>

    <div class="container">
        <div class="row py-4">
            <div class="col-xl-12">
                <h3>Seleccione su unidad académica para generar la boleta</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ESCUELA</th>
                            <th>CARRERA</th>
                            <th>PLAN EST.</th>
                            <th>PERIODO</th>
                            <th>GRUPO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="<?= base_url('boletas/visualkardex') ?>"><?= $user['unidad_academica_id'] ?></td>
                            <td><?= $user['carrera_id'] ?></td>
                            <td><?= $user['plan_estudio_id'] ?></td>
                            <td><?= $user['semestre_id'] ?></td>
                            <td><?= $user['grupo_id'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Cursos Disponibles</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Semestre</th>
                                <th>Materia</th>
                                <th>Grupo</th>
                                <th>Acciones</th> <!-- Nueva columna para las acciones -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($informacionProfesor) > 0) : ?>
                                <?php foreach ($informacionProfesor as $infoP) : ?>
                                    <tr>
                                        <td><?= $infoP->semestre_id ?></td>
                                        <td><?= $infoP->materia ?></td>
                                        <td><?= $infoP->grupo ?></td>
                                        <td> <!-- Nueva columna para las acciones -->
                                            <div class="btn-group" role="group">
                                                <form class="display-none">
                                                    <a href="<?= base_url('boletas/editkardex/' . $infoP->grupo) ?>" class="btn btn-sm btn-success" title="Editar">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4">
                                        <h6 class="text-danger text-center">No se encontraron Cursos</h6>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>

<?php endif ?>

<?= $this->endSection(); ?>
