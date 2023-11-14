<?= $this->extend('layouts/base'); ?>

<?php $this->section('title'); ?> Control Escolar <?php $this->endSection(); ?>

<?= $this->section('content'); ?>
<?php
// Obtener los datos del usuario desde la sesión
$user = session('user');
$nombre = session('nombre');
?>
    <body>
        <header>
            <div class ="container__header">
                <div class="logo">
                    <a href="#">
                    <img src="<?= base_url('assets/imgs/LogoPrincipal.png'); ?>" alt="Logo">
                    </a>
                </div>

                <div class="menu">
                    <nav>
                        <ul>
                            <li><a href="#">Constancia de Kardex</a></li>
                            <li><a href="#">Constancia de Estudio</a></li>
                            <li><a href="#">Credencial de Estudio</a></li>
                            <li><a href="https://www.uas.edu.mx/servicios/calendario/">Calendario Escolar</a></li>
                            <li><a href="<?= base_url('login'); ?>">Salir</a></li>
                        </ul>
                    </nav>
                </div>
                
            </div>
        </header>

        <main>
            <div class="container__cover div__offset">
                <div class="cover">
                    <section class="text__cover">
                        <h1>Bienvenido Alumno: <?= $nombre; ?></h1>
                        <p>
                            Estimado Alumno, no te dejes engañar por falsos gestores, ninguna persona de la Universidad te llama para ofrecer cambios de calificaciones, esto es ilegal y es un delito, puedes ser expulsado de la Universidad por incurrir en dichas acciones, dado que incurres en los Artículos 18, 54 y 55 del Reglamento Escolar.</p>
                    </section>
                    <section class="image__cover">
                    <img src="<?= base_url('assets/imgs/Portada.png'); ?>" alt="Portada">
                    </section>
                </div>
            </div> 



            <div class="container__trust container__card-primary">
                <div class="trust card__primary">
                    <div class="text__trust text__card-primary">
                        <p>Sistema Automatizado de Control Escolar</p>
                        <h1>Universidad Autónoma de Sinaloa</h1>
                    </div>

                    <div class="container__trust container__box-cardPrimary">
                        <div class="card__trust box__card-primary">
                            <img src="<?= base_url('assets/imgs/Constancia_Estudio.png'); ?>" alt="ConstanciaE">
                            <h2>Constancia de Estudio</h2>
                            <p>Constancia de estudio, generalmente debes seguir un proceso específico que puede variar según la institución educativa.</p>
                        </div>

                        <div class="card__trust box__card-primary">
                            <img src="<?= base_url('assets/imgs/Kardex.png'); ?>" alt="Kardex">
                            <h2>Constancia de Kardex</h2>
                            <p>Solicitar un kardex académico es un proceso similar a solicitar una constancia de estudio. </p>
                        </div>

                        <div class="card__trust box__card-primary">
                            <img src="<?= base_url('assets/imgs/credencial.png'); ?>" alt="Credencial">
                            <h2>Credencial de Estudio</h2>
                            <p>Solicitar una credencial de estudio generalmente sigue un proceso distinto, ya que implica la creación de una identificación estudiantil.</p>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="container_derecho derecho_autor">
                <p><small>Desarrollado por Estudiantes de la UAS ® 2023 <br>
                    todos los derechos reservados ©</small></p>
                    <?php if (session()->has('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session('success') ?>
    </div>
<?php endif; ?>
            </div>
        </main>
    </body>

<?= $this->endSection(); ?>