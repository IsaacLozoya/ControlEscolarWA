<?= $this->extend('layouts/base'); ?>

<?php $this->section('title'); ?> Editar Usuario <?php $this->endSection(); ?>

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
            <a href="<?= base_url('admin') ?>" class="btn btn-primary" style="color: white;">
                <i class="bi bi-arrow-left-circle-fill"  style="color: white;"></i> <strong style="color: white;">Volver atrás</strong>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 m-auto">
            <form action="<?= base_url('admin/' . $usuario['no_cuenta']) ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title text-center">Editar Usuario</h5>

                                <div class="form-group mb-3">
                                    <label class="form-label">Numero de Cuenta</label>
                                    <input type="text" class="form-control" name="no_cuenta" disabled placeholder="ID" value="<?php echo trim($usuario['no_cuenta'])?>" />
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Nombre Completo</label>
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre Completo" value="<?php if($usuario['nombre']):echo $usuario['nombre'];else: set_value('nombre'); endif ?>"/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Sexo</label>
                                    <select class="form-control" name="sexo">
                                        <option value="M" <?php if($usuario['sexo'] === 'M'): echo 'selected'; endif; ?>>Masculino</option>
                                        <option value="F" <?php if($usuario['sexo'] === 'F'): echo 'selected'; endif; ?>>Femenino</option>
                                        <option value="N" <?php if($usuario['sexo'] === 'N'): echo 'selected'; endif; ?>>Neutro</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Fecha Nacimiento</label>
                                    <input type="text" class="form-control datepicker" name="fecha_nacimiento" placeholder="Fecha Nacimiento" value="<?php if($usuario['fecha_nacimiento']):echo $usuario['fecha_nacimiento'];else: set_value('fecha_nacimiento'); endif ?>"/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Fecha Ingreso</label>
                                    <input type="text" class="form-control datepicker" name="fecha_ingreso" placeholder="Fecha de Ingreso" value="<?php if($usuario['fecha_ingreso']):echo $usuario['fecha_ingreso'];else: set_value('fecha_ingreso'); endif ?>"/>
                                </div>
                                <div>
                                    <h5 class="card-title text-center">Direccion</h5>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Calle</label>
                                    <input type="text" class="form-control" name="calle" placeholder="Calle" value="<?php if($usuario['calle']):echo $usuario['calle'];else: set_value('calle'); endif ?>"/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Colonia</label>
                                    <input type="text" class="form-control" name="colonia" placeholder="Colonia" value="<?php if($usuario['colonia']):echo $usuario['colonia'];else: set_value('colonia'); endif ?>"/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Codigo Postal</label>
                                    <input type="text" class="form-control" name="codigo_postal" placeholder="Codigo Postal" value="<?php if($usuario['codigo_postal']):echo $usuario['codigo_postal'];else: set_value('codigo_postal'); endif ?>"/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Población</label>
                                    <input type="text" class="form-control" name="poblacion" placeholder="Poblacion" value="<?php if($usuario['poblacion']):echo $usuario['poblacion'];else: set_value('poblacion'); endif ?>"/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Localidad</label>
                                    <input type="text" class="form-control" name="localidad" placeholder="Localidad" value="<?php if($usuario['localidad']):echo $usuario['localidad'];else: set_value('localidad'); endif ?>"/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Telefono</label>
                                    <input type="text" class="form-control" name="telefono" placeholder="Telefono" value="<?php if($usuario['telefono']):echo $usuario['telefono'];else: set_value('telefono'); endif ?>"/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">CURP</label>
                                    <input type="text" class="form-control" name="curp" placeholder="CURP" value="<?php if($usuario['curp']):echo $usuario['curp'];else: set_value('curp'); endif ?>"/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">NSS</label>
                                    <input type="text" class="form-control" name="afiliacion_imss" placeholder="NSS" value="<?php if($usuario['afiliacion_imss']):echo $usuario['afiliacion_imss'];else: set_value('afiliacion_imss'); endif ?>"/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Rol</label>
                                    <select class="form-control" name="rol_id" id ="rolSelect" required>
                                        <?php if ($usuario['rol_id'] == 1): ?>
                                            <option value="1" selected>Alumno</option>
                                            <option value="2">Profesor</option>
                                        <?php elseif ($usuario['rol_id'] == 2): ?>
                                            <option value="1">Alumno</option>
                                            <option value="2" selected>Profesor</option>
                                        <?php else: ?>
                                            <option value="1">Alumno</option>
                                            <option value="2">Profesor</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Modificar Usuario</button>
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

        // Controla la visibilidad de las opciones de dirección según el rol seleccionado
        $('#rolSelect').change(function () {
            var selectedRol = $(this).val();
            if (selectedRol == 2) {
                // Mostrar opciones de dirección para alumnos
                $('#DetallesAlumno').hide();
            } else {
                // Ocultar opciones de dirección para profesores
                $('#DetallesAlumno').show();
            }
        });
    });
</script>
<?= $this->endSection(); ?>
