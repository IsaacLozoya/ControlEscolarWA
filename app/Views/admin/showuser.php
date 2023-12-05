<?= $this->extend('layouts/base'); ?>

<?php $this->section('title'); ?> Control Escolar <?php $this->endSection(); ?>

<?= $this->section('content'); ?>

<head> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
        <div class="container">
            <div class="row py-4">
                    <div class="col-xl-6">
                    <a href="<?= base_url('admin') ?>" class="btn btn-primary" style="color: white;">
                        <i class="bi bi-arrow-left-circle-fill"  style="color: white;"></i> <strong style="color: white;">Volver atrás</strong>
                    </a>
                    </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 m-auto">
                  <div class="row">
                     <div class="col-sm-12">
                          <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title text-center">Detalles del Usuario </h5>
                                <div class="form-group mb-3">
                                    <label class="form-label">Numero De Cuenta</label>
                                    <input type="text" class="form-control" name="No_cuenta" disabled placeholder="ID" value="<?php echo trim($usuario['no_cuenta'])?>" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Nombre Completo</label>
                                    <input type="text" class="form-control" name="Nombre" disabled placeholder="Nombre Completo" value="<?php echo trim($usuario['nombre'])?>" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Sexo</label>
                                    <input type="text" class="form-control" name="Sexo" disabled placeholder="Genero" value="<?php echo trim($usuario['sexo'])?>" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Fecha De Nacimiento</label>
                                    <input type="text" class="form-control" name="FechaN" disabled placeholder="Fecha de Nacimiento" value="<?php echo trim($usuario['fecha_nacimiento'])?>" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Fecha De Ingreso</label>
                                    <input type="text" class="form-control" name="FechaI" disabled placeholder="Fecha de Ingreso" value="<?php echo trim($usuario['fecha_ingreso'])?>" />
                                </div>
                                <div>
                                    <h5 class="card-title text-center">Direccion</h5>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Calle</label>
                                    <input type="text" class="form-control" name="Calle" disabled placeholder="Calle" value="<?php echo trim($usuario['calle'])?>" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Colonia</label>
                                    <input type="text" class="form-control" name="Colonia" disabled placeholder="Colonia" value="<?php echo trim($usuario['colonia'])?>" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Codigo Postal</label>
                                    <input type="text" class="form-control" name="CodigoPostal" disabled placeholder="Codigo Postal" value="<?php echo trim($usuario['codigo_postal'])?>" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Localidad</label>
                                    <input type="text" class="form-control" name="Localidad" disabled placeholder="Localidad" value="<?php echo trim($usuario['localidad'])?>" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Telefono</label>
                                    <input type="text" class="form-control" name="Telefono" disabled placeholder="Telefono" value="<?php echo trim($usuario['telefono'])?>" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">CURP</label>
                                    <input type="text" class="form-control" name="Curp" disabled placeholder="CURP" value="<?php echo trim($usuario['curp'])?>" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">NSS</label>
                                    <input type="text" class="form-control" name="AfiliacionIMSS" disabled placeholder="Numero Seguro Social" value="<?php echo trim($usuario['afiliacion_imss'])?>" />
                                </div>
                                <div class="form-group mb-3">
                                <label class="form-label">Rol</label>
                                <?php
                                $rolId = trim($usuario['rol_id']);
                                switch ($rolId) {
                                    case 1:
                                        $rolTexto = 'Alumno';
                                        break;
                                    case 2:
                                        $rolTexto = 'Profesor';
                                        break;
                                    case 0:
                                        $rolTexto = 'Administrador';
                                        break;
                                    default:
                                        $rolTexto = 'Desconocido';
                                        break;
                                }
                                ?>
                                <input type="text" class="form-control" name="rol_id" disabled placeholder="Rol" value="<?php echo $rolTexto; ?>" />
                            </div>
                            <div class="form-group mb-3">
                                    <label class="form-label">Unidad Academica</label>
                                    <input type="text" class="form-control" name="Unidad academica" disabled placeholder="Unidad Academica" value="<?php echo trim($usuario['unidad_academica_id'])?>" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">ID Carrera</label>
                                    <input type="text" class="form-control" name="carrera_id" disabled placeholder="Carrera" value="<?php echo trim($usuario['carrera_id'])?>" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Plan De Estudio</label>
                                    <input type="text" class="form-control" name="plan_estudio_id" disabled placeholder="Plan De Estudio" value="<?php echo trim($usuario['plan_estudio_id'])?>" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Grupo</label>
                                    <input type="text" class="form-control" name="Grupo" disabled placeholder="Grupo" value="<?php echo trim($usuario['grupo_id'])?>" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Semestre</label>
                                    <input type="text" class="form-control" name="Semestre" disabled placeholder="Semestre" value="<?php echo trim($usuario['semestre_id'])?>" />
                                </div>
                                <div class="form-group mb-3">
                                <label class="form-label">Vigencia</label>
                                <?php
                                $rolId = trim($usuario['vigencia']);
                                switch ($rolId) {
                                    case 'A':
                                        $rolTexto = 'Activo';
                                        break;
                                    case 'I':
                                        $rolTexto = 'Inactivo';
                                        break;
                                    default:
                                        $rolTexto = 'Desconocido';
                                        break;
                                }
                                ?>
                                <input type="text" class="form-control" name="vigencia" disabled placeholder="Vigencia" value="<?php echo $rolTexto; ?>" />
                            </div>
                            </div>
                           </div>
                      </div>
                 </div>
            </div>
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