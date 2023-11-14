<?= $this->extend('layouts/base'); ?>

<?php $this->section('title'); ?> Login <?php $this->endSection(); ?>

<?= $this->section('content'); ?>
<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;"> </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;"> </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;"> </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;"> </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;"> </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;"> </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;"> </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;"> </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a rel="dofollow">Control Escolar</h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Introduce tus datos</span>
              <form id="stripe-login" action="<?= base_url('authenticate'); ?>" method="post" >
                <div class="field padding-bottom--24">
                  <label for="no_cuenta">Nº Cuenta</label>
                  <input type="number" name="no_cuenta" required>
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">Contraseña</label>
                    
                  </div>
                  <input type="password" name="password" required>
                </div>
               
                <div class="field padding-bottom--24">
                    <button type="submit" class="button">Iniciar Sesión</button>
                </div>

              </form>
              <?php if (session()->has('error')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session('error') ?>
    </div>
<?php endif; ?>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</body>

<?= $this->endSection(); ?>