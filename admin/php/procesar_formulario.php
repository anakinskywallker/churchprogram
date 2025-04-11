<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_FILES['documentos'])) {
    $files = $_FILES['documentos'];

    // Recorrer los archivos recibidos
    foreach ($files['tmp_name'] as $index => $tmpName) {
      if ($files['error'][$index] === UPLOAD_ERR_OK) {
        $name = basename($files['name'][$index]);
        $path = '../archivospdf/' . $name;

        if (move_uploaded_file($tmpName, $path)) {
          // Archivo subido exitosamente
          // Aquí puedes realizar otras acciones, como almacenar información en la base de datos o procesar el archivo
          echo 'Archivo subido con éxito.';
        } else {
          // Error al subir el archivo
          echo 'Error al subir archivo.';
        }
      } else {
        // Error al subir el archivo
        echo 'Error al subir archivo.';
      }
    }
  } else {
    echo 'Por favor, selecciona al menos un archivo.';
  }
}
?>
