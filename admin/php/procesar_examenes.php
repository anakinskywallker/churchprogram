<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_FILES['pdf-file'])) {
    $file = $_FILES['pdf-file'];
    $folderPath = '../examenespdf/';

    if (!file_exists($folderPath)) {
      mkdir($folderPath, 0777, true);}

    if ($file['error'] === UPLOAD_ERR_OK) {
      $name = basename($file['name']);
      $path = '../examenespdf/' . $name;

      if (move_uploaded_file($file['tmp_name'], $path)) {
        echo 'Archivo subido con éxito.';
      } else {
        echo 'Error al subir archivo.';
      }
    } else {
      echo 'Error al subir archivo.';
    }
  } else {
    echo 'Por favor, selecciona un archivo PDF.';
  }
}
?>
