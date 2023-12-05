<!DOCTYPE html>
<html lang="es">
    
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE-edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
            <title>Control Escolar</title>
        </head> 
        <body>
            <div class="container-fluid py-4">
                <?= $this->renderSection('content')?>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </body>

        
<!--
        -- Agrega esto al final de tu vista menuprincipal.php 
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Evento de clic en el enlace de Administrador
        $('#loadAdmin').on('click', function(e) {
            e.preventDefault();

            // Realizar una solicitud AJAX para cargar la vista admin.php
            $.ajax({
                url: '<?= base_url('admin'); ?>',
                type: 'GET',
                success: function(response) {
                    // Colocar la respuesta en el contenedor
                    $('#adminContainer').html(response);
                },
                error: function(error) {
                    console.log(error);
                    alert('Error al cargar la vista de administrador');
                }
            });
        });
    });
</script>
-->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const dropArea = document.getElementById('drop-area');
  const fileInput = document.getElementById('file-input');
  const fileList = document.getElementById('file-list');

  ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false);
    document.body.addEventListener(eventName, preventDefaults, false);
  });

  function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
  }

  ['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, highlight, false);
  });

  ['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, unhighlight, false);
  });

  function highlight() {
    dropArea.classList.add('highlight');
  }

  function unhighlight() {
    dropArea.classList.remove('highlight');
  }

  dropArea.addEventListener('drop', handleDrop, false);
  dropArea.addEventListener('click', triggerFileInput, false);

  function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;

    updateFileList(files);
  }

  function triggerFileInput() {
    fileInput.click();
  }

  fileInput.addEventListener('change', handleFile);

  function handleFile() {
    const files = this.files;
    updateFileList(files);
  }

  function updateFileList(files) {
    Array.from(files).forEach(file => {
      const listItem = document.createElement('li');
      listItem.textContent = file.name;
      fileList.appendChild(listItem);
    });
  }
});

</script>


</html>
