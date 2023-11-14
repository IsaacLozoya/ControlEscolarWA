<?= $this->extend('layouts/base'); ?>

<?php $this->section('title'); ?> Control Escolar <?php $this->endSection(); ?>

<?= $this->section('content'); ?>
<?php
// Obtener los datos del usuario desde la sesión
$user = session('user');
$nombre = session('nombre');
?>











<?= $this->endSection(); ?>