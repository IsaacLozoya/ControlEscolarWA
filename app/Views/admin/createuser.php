<?= $this->extend('layouts/base'); ?>

<?php $this->section('title'); ?> Crear Usuario <?php $this->endSection(); ?>

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
        <form action="<?= base_url('admin') ?>" method="post">
                <?= csrf_field() ?>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title text-center">Agregar Usuario</h5>

                                <div class="form-group mb-3">
                                    <label class="form-label">Numero de Cuenta</label>
                                    <input type="text" class="form-control" name="no_cuenta" placeholder="Numero De Cuenta" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Rol</label>
                                    <select class="form-control" name="rol_id" id="rolSelect" required>
                                        <option value="1">Alumno</option>
                                        <option value="2">Profesor</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Nombre Completo</label>
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre Completo"required/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Sexo</label>
                                    <select class="form-control" name="sexo" required>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                        <option value="N">Neutro</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Fecha Nacimiento</label>
                                    <input type="text" class="form-control datepicker" name="fecha_nacimiento" placeholder="Fecha Nacimiento" required/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Fecha Ingreso</label>
                                    <input type="text" class="form-control datepicker" name="fecha_ingreso" placeholder="Fecha de Ingreso" required/>

                                </div>

                                <div>
                                    <h5 class="card-title text-center">Direccion</h5>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Calle</label>
                                    <input type="text" class="form-control" name="calle" placeholder="Calle" required/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Colonia</label>
                                    <input type="text" class="form-control" name="colonia" placeholder="Colonia" required/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Codigo Postal</label>
                                    <input type="text" class="form-control" name="codigo_postal" placeholder="Codigo Postal" required/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Población</label>
                                    <input type="text" class="form-control" name="poblacion" placeholder="Poblacion" required/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Localidad</label>
                                    <input type="text" class="form-control" name="localidad" placeholder="Localidad" required/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Telefono</label>
                                    <input type="text" class="form-control" name="telefono" placeholder="Telefono" required/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">CURP</label>
                                    <input type="text" class="form-control" name="curp" placeholder="CURP" required/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">NSS</label>
                                    <input type="text" class="form-control" name="afiliacion_imss" placeholder="NSS" required/>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Contraseña</label>
                                    <input type="text" class="form-control" name="password" placeholder="Contraseña" required/>
                                </div>
                                <div id="DetallesAlumno">
                                <div class="form-group mb-3" >
                                    <label class="form-label">Unidad Academica</label>
                                    <select class="form-control" name="unidad_academica_id"  required>
                                        <option value="2700">Facultad De Informatica Culiacan</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">ID Carrera</label>
                                    <select class="form-control" name="carrera_id"  required>
                                        <option value="1">Licenciatura en Informatica</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Plan De Estudio</label>
                                    <select class="form-control" name="plan_estudio_id" required>
                                        <option value="4">2020-2025</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Grupo</label>
                                    <select class="form-control" name="grupo_id" required>
                                        <option value="1">Grupo 1</option>
                                        <option value="2">Grupo 2</option>
                                        <option value="3">Grupo 3</option>
                                        <option value="4">Grupo 4</option>
                                        <option value="5">Grupo 5</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Semestre</label>
                                    <select class="form-control" name="semestre_id"  required>
                                        <option value="1">Semestre 1</option>
                                        <option value="2">Semestre 2</option>
                                        <option value="3">Semestre 3</option>
                                        <option value="4">Semestre 4</option>
                                        <option value="5">Semestre 5</option>
                                        <option value="6">Semestre 6</option>
                                        <option value="7">Semestre 7</option>
                                        <option value="8">Semestre 8</option>
                                        <option value="9">Semestre 9</option>
                                        <option value="10">Semestre 10</option>
                                    </select>
                                </div>
                                </div>


                                <button type="submit" class="btn btn-success">Agregar Usuario</button>
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
