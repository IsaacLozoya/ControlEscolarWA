<?= $this->extend('layouts/base'); ?>

<?php $this->section('title'); ?> Control Escolar <?php $this->endSection(); ?>

<?= $this->section('content'); ?>

<head> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<div class="container">
    <div class="row py-4">
            <div class="col-xl-6">
            <a href="<?= base_url('menuprincipal') ?>" class="btn btn-primary" style="color: white;">
                <i class="bi bi-arrow-left-circle-fill"  style="color: white;"></i> <strong style="color: white;">Volver atrás</strong>
            </a>
            </div> 
                <div class="col-xl-6 text-end">
            <a href="<?= base_url('admin/createuser') ?>" class="btn btn-primary custom-btn-color" style="color: white;">
                <strong style="color: white;">Agregar Usuario</strong>
            </a>
        </div>
    </div>
</div>



<div class="row py-2">
    <div class="col-xl-12">
        <?php 
        if(session()->getFlashdata('success')):?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
                <?php echo session()->getFlashdata('success')?>
            </div>
        <?php elseif(session()->getFlashdata('failed')):?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
                <?php echo session()->getFlashdata('failed')?>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Maestros</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nº Cuenta</th>
                                <th>Nombre Completo</th>
                                <th>Sexo</th>
                                <th>Fecha Nacimiento</th>
                                <th>Población</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>  
                            <?php foreach ($activeUsers as $usuario) : ?>
                                <?php if ($usuario['rol_id'] == 2): ?>
                                    <tr>
                                        <td><?= $usuario['no_cuenta'] ?></td>
                                        <td class="desbordes"><?= $usuario['nombre'] ?></td>
                                        <td><?= $usuario['sexo'] ?></td>
                                        <td><?= $usuario['fecha_nacimiento'] ?></td>
                                        <td class="desbordes"><?= $usuario['poblacion'] ?></td>
                                        <td><?= $usuario['telefono'] ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <form class="display-none">
                                                <a href="<?= base_url('admin/edituserprofesor/' . $usuario['no_cuenta']) ?>" class="btn btn-sm btn-success" title="Editar">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                </form>
                                                <form class="display-none">
                                                <a href="<?= base_url('admin/showuser/' . $usuario['no_cuenta']) ?>" class="btn btn-sm btn-info" title="Mostrar Detalles">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                </form>
                                                <a>
                                                <form class="display-none" method="post" action="<?= base_url('admin/' . $usuario['no_cuenta']) ?>" id="deleteUser<?= $usuario['no_cuenta'] ?>">
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <button type="button" class="btn btn-sm btn-danger" title="Eliminar" onclick="deleteUser('deleteUser<?= $usuario['no_cuenta'] ?>')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endif; ?>                                 
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title">Alumnos</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nº Cuenta</th>
                                <th>Nombre Completo</th>
                                <th>Sexo</th>
                                <th>Fecha Nacimiento</th>
                                <th>Población</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>  
                            <?php foreach ($activeUsers as $usuario) : ?>
                                <?php if ($usuario['rol_id'] == 1): ?>
                                    <tr>
                                        <td><?= $usuario['no_cuenta'] ?></td>
                                        <td class="desbordes"><?= $usuario['nombre'] ?></td>
                                        <td><?= $usuario['sexo'] ?></td>
                                        <td><?= $usuario['fecha_nacimiento'] ?></td>
                                        <td class="desbordes"><?= $usuario['poblacion'] ?></td>
                                        <td><?= $usuario['telefono'] ?></td>
                                        <td>
                                        <div class="btn-group" role="group">
                                                <form class="display-none">
                                                <a href="<?= base_url('admin/edituseralumno/' . $usuario['no_cuenta']) ?>" class="btn btn-sm btn-success" title="Editar">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                </form>
                                                <form class="display-none">
                                                <a href="<?= base_url('admin/showuser/' . $usuario['no_cuenta']) ?>" class="btn btn-sm btn-info" title="Mostrar Detalles">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                </form>
                                                <a>
                                                <form class="display-none" method="post" action="<?= base_url('admin/' . $usuario['no_cuenta']) ?>" id="deleteUser<?= $usuario['no_cuenta'] ?>">
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <button type="button" class="btn btn-sm btn-danger" title="Eliminar" onclick="deleteUser('deleteUser<?= $usuario['no_cuenta'] ?>')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                                </a>
                                            </div>
                                        </td>
                                        </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card text-center" >
    <div class="card-header">
        <h5 class="card-title">Usuarios Inactivos</h5>
        <button type="button" class="btn btn-primary" onclick="toggleInactiveUsers()">Mostrar/Esconder Usuarios Inactivos</button>
    </div>
</div>

<div class="row py-2" id="usuariosInactivos">
    <div class="col-xl-12">
        <?php 
        if(session()->getFlashdata('success')):?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
                <?php echo session()->getFlashdata('success')?>
            </div>
        <?php elseif(session()->getFlashdata('failed')):?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
                <?php echo session()->getFlashdata('failed')?>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Maestros</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nº Cuenta</th>
                                <th>Nombre Completo</th>
                                <th>Sexo</th>
                                <th>Fecha Nacimiento</th>
                                <th>Población</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>  
                            <?php foreach ($inactiveUsers as $usuario) : ?>
                                <?php if ($usuario['rol_id'] == 2): ?>
                                    <tr>
                                        <td><?= $usuario['no_cuenta'] ?></td>
                                        <td class="desbordes"><?= $usuario['nombre'] ?></td>
                                        <td><?= $usuario['sexo'] ?></td>
                                        <td><?= $usuario['fecha_nacimiento'] ?></td>
                                        <td class="desbordes"><?= $usuario['poblacion'] ?></td>
                                        <td><?= $usuario['telefono'] ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <form class="display-none">
                                                <a href="<?= base_url('admin/edituserprofesor/' . $usuario['no_cuenta']) ?>" class="btn btn-sm btn-success" title="Editar">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                </form>
                                                <form class="display-none">
                                                <a href="<?= base_url('admin/showuser/' . $usuario['no_cuenta']) ?>" class="btn btn-sm btn-info" title="Mostrar Detalles">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                </form>
                                                <a>
                                                <form class="display-none" method="post" action="<?= base_url('admin/' . $usuario['no_cuenta']) ?>" id="deleteUser<?= $usuario['no_cuenta'] ?>">
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <button type="button" class="btn btn-sm btn-danger" title="Eliminar" onclick="deleteUser('deleteUser<?= $usuario['no_cuenta'] ?>')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endif; ?>                                 
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




<div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title">Alumnos</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nº Cuenta</th>
                                <th>Nombre Completo</th>
                                <th>Sexo</th>
                                <th>Fecha Nacimiento</th>
                                <th>Población</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>  
                            <?php foreach ($inactiveUsers as $usuario) : ?>
                                <?php if ($usuario['rol_id'] == 1): ?>
                                    <tr>
                                        <td><?= $usuario['no_cuenta'] ?></td>
                                        <td class="desbordes"><?= $usuario['nombre'] ?></td>
                                        <td><?= $usuario['sexo'] ?></td>
                                        <td><?= $usuario['fecha_nacimiento'] ?></td>
                                        <td class="desbordes"><?= $usuario['poblacion'] ?></td>
                                        <td><?= $usuario['telefono'] ?></td>
                                        <td>
                                        <div class="btn-group" role="group">
                                                <form class="display-none">
                                                <a href="<?= base_url('admin/edituseralumno/' . $usuario['no_cuenta']) ?>" class="btn btn-sm btn-success" title="Editar">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                </form>
                                                <form class="display-none">
                                                <a href="<?= base_url('admin/showuser/' . $usuario['no_cuenta']) ?>" class="btn btn-sm btn-info" title="Mostrar Detalles">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                </form>
                                                <a>
                                                <form class="display-none" method="post" action="<?= base_url('admin/' . $usuario['no_cuenta']) ?>" id="deleteUser<?= $usuario['no_cuenta'] ?>">
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <button type="button" class="btn btn-sm btn-danger" title="Eliminar" onclick="deleteUser('deleteUser<?= $usuario['no_cuenta'] ?>')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                                </a>
                                            </div>
                                        </td>
                                        </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

                                            
<script>
    function toggleInactiveUsers() {
        $('#usuariosInactivos').toggle();
    }

    // Agrega el siguiente código si deseas ocultar inicialmente los usuarios inactivos al cargar la página
     $(document).ready(function () {
         toggleInactiveUsers();
     });

    function deleteUser(formId) {
        let confirm = window.confirm('¿Seguro que quiere eliminar este usuario?');
        if (confirm) {
            document.getElementById(formId).submit();
        }
    }
</script>

<style>
    .desbordes {
        max-width: 200px;
        overflow: auto;
        text-overflow: clip;
        white-space: nowrap;
    }
</style>

<?= $this->endSection(); ?>